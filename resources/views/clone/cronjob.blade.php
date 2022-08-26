<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clone website</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <?php 
            ini_set('MAX_EXECUTION_TIME', '-1');
            set_time_limit(0);
            include_once("clone/simple_html_dom.php");
            libxml_use_internal_errors(true);
            
            function curl_image($url,$saveto){
                $ch = curl_init ($url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
                $raw=curl_exec($ch);
                curl_close ($ch);
                if(file_exists($saveto)){
                    unlink($saveto);
                }
                $fp = fopen($saveto,'x');
                fwrite($fp, $raw);
                fclose($fp);
            }

            function checkFolder($name){
                $return = false;
                if (!file_exists($name)) {
                    mkdir($name, 0777);
                } else {
                    $return = true;
                }
                return $return;
            }

            function curl_get_file_contents($URL)
            {
                $userAgent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
                $c = curl_init();
                curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($c, CURLOPT_URL, $URL);
                curl_setopt($c, CURLOPT_USERAGENT, $userAgent );
                $contents = curl_exec($c);
                curl_close($c);
                $c = null;

                if ($contents) return $contents;
                else return FALSE;
            }

            function uploadFile ($file, $token){
                $fp = fopen($file, 'rb');
                $size = filesize($file);
                $file = preg_replace('(truyenfull/)', '', $file);
                $cheaders = array('Authorization: Bearer '.$token.'',
                                'Content-Type: application/octet-stream',
                                'Dropbox-API-Arg: {"path":"/'.$file.'", "mode":"add"}');

                $ch = curl_init('https://content.dropboxapi.com/2/files/upload');
                curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
                curl_setopt($ch, CURLOPT_PUT, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_INFILE, $fp);
                curl_setopt($ch, CURLOPT_INFILESIZE, $size);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                curl_close($ch);
                fclose($fp);
                // dd($response);
                $a = json_decode($response);
                if(isset($a->path_display)){
                    $path_display = $a->path_display;
                    return $path_display;
                }else{
                    dd($a);
                }
            }

            function getLinkFile ($file, $token){
                $url = "https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings";

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $headers = array(
                    "Authorization: Bearer ".$token."",
                    "Content-Type: application/json",
                );
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                $data = '{"path":"'.$file.'"}';
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $resp = curl_exec($curl);
                curl_close($curl);
                $a = json_decode($resp);
                if(isset($a->error)){
                    if(isset($a->error->shared_link_already_exists)){
                        $img = $a->error->shared_link_already_exists->metadata->url;
                        $img = preg_replace('(dl=0)','raw=1', $img);
                        return $img;
                    }else{
                        dd($a);
                    }
                }else{
                    $img = $a->url;
                    $img = preg_replace('(dl=0)','raw=1', $img);
                    return $img;
                }
            }

            // curl https:
        //     api.dropbox.com/oauth2/token \
        //     -d grant_type=refresh_token \
        //    -d refresh_token=LEIoQppcWZEAAAAAAAAAAUfaqlrOD0zqubu-G9Kkz0UhRezSkbC5ljlKlbW9KP4- \
        //    -u 5jhxuvfzqzvdwi3:gs277omix25f7jb

            

            function addTruyen($name, $slug, $full, $slug_chapter){
                $HTML['response'] = curl_get_file_contents("https://truyenfull.vn/".$slug."/");
                $HTML['html'] = new simple_html_dom();
                $HTML['html']->load($HTML['response']);
                if($HTML['html']){
                    $image = $HTML['html']->find('.books img', 0)->src;
                    curl_image($image, 'image-avatars/' . basename($image));
                    if($HTML['html']->find('.rate .small', 0)->plaintext === 'Chưa có đánh giá nào, bạn hãy là người đầu tiên đánh giá truyện này!'){
                        $rate = 0;
                        $number_of_votes = 0;
                    }else{
                        $rate = $HTML['html']->find('[itemprop="ratingValue"]', 0)->plaintext;
                        $number_of_votes = $HTML['html']->find('[itemprop="ratingCount"]', 0)->plaintext;
                    }
                    $author_slug = $HTML['html']->find('[itemprop="author"]', 0)->href;
                    $author_slug = preg_replace('(https://truyenfull.vn/tac-gia/)', '', $author_slug);
                    $author_slug = preg_replace('(/)', '', $author_slug);
                    $author = \DB::table('authors')->where('slug',$author_slug)->first();
                    if($author){
                        $author_id = $author->id;
                    }else{
                        $author_name = $HTML['html']->find('[itemprop="author"]', 0)->plaintext;
                        \DB::table('authors')->insert([
                            'name' => $author_name,
                            'slug' => $author_slug,
                        ]);
                        $author = \DB::table('authors')->where('slug',$author_slug)->first();
                        $author_id = $author->id;
                    }
                    $content = $HTML['html']->find('.desc-text', 0)->innertext;
                    $content = preg_replace('(<div.*?class=.*?>.*?</div>)','', $content);
                    $content = preg_replace('(<a.*?class=.*?>.*?</a>)','', $content);
                    $source = $HTML['html']->find('.source', 0)->plaintext;
                    $total_chapter = 0;
                    if($HTML['html']->find('.list-chapter li',0)){
                        $link = $HTML['html']->find('.list-chapter li',0)->find('a',0)->href ;
                        $link_chapter_first = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $link);
                        $link_chapter_first = preg_replace('(/)','', $link_chapter_first);
                        \DB::table('list_truyenfull')->insert([
                            'name' => $name,
                            'image' => basename($image),
                            'slug' => $slug,
                            'rate' => $rate,
                            'author_id' => $author_id,
                            'full' => $full,
                            'content' => $content,
                            'source' => $source,
                            'type' => 1,
                            'number_of_votes' => $number_of_votes,
                            'url_last_chapter' => $link_chapter_first,
                            'total_chapter' => $total_chapter,
                        ]);
                        $truyen = \DB::table('list_truyenfull')->where('slug',$slug)->first();
                        $types = $HTML['html']->find('.info [itemprop="genre"]');
                        foreach($types as $key=>$val){
                            $name_type = $val->plaintext;
                            $type = \DB::table('types')->where('name',$name_type)->first();
                            \DB::table('type_story')->insert([
                                'type_id' => $type->id,
                                'story_id' => $truyen->id,
                            ]);
                        }
                        $check = 0;
                        addChapter2($link, $truyen->id, $truyen->slug, $check);
                    }
                }
            }

            function addChapter2($URL, $id, $slug, $check){
                $id = $id;
                $slug = preg_replace('(/)','', $slug);
                $GLOBALS['response'] = curl_get_file_contents($URL);
                $GLOBALS['html'] = new simple_html_dom();
                $GLOBALS['html']->load($GLOBALS['response']);
                if($GLOBALS['html']){
                    if($GLOBALS['html']->find('.chapter-title',0)){
                        $name = html_entity_decode($GLOBALS['html']->find('.chapter-title',0)->plaintext);
                        $url = $GLOBALS['html']->find('.chapter-title',0)->href ;
                        $url = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $url);
                        $url = preg_replace('(/)','', $url);
                        $prev_chap = $GLOBALS['html']->find('#prev_chap',0)->href ;
                        $prev_chap = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $prev_chap);
                        $prev_chap = preg_replace('(/)','', $prev_chap);
    
                        if($check == 1){
                            \DB::table('chapters')->where('story_id',$id)->where('slug', $prev_chap)->update([
                                'next_chap' => $url,
                            ]);
                        }
    
                        $next_chap_cv = $GLOBALS['html']->find('#next_chap',0)->href ;
                        $next_chap = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $next_chap_cv);
                        $next_chap = preg_replace('(/)','', $next_chap);
                        
                        $count_check_chapter = \DB::table('chapters')->where('slug', $url)->where('story_id', $id)->count();
                        if ($count_check_chapter == 0) {
                            $content = $GLOBALS['html']->find('#chapter-c',0)->innertext ;
                            $content = preg_replace('(<div.*?class=.*?>.*?</div>)','', $content);
                            $content = preg_replace('(<a.*?class=.*?>.*?</a>)','', $content);
    
                            checkFolder('truyenfull/' . $slug);
                            $file = 'truyenfull/' . $slug . '/' . $url . '.txt';
                            $fp = fopen($file,"w");
                            fwrite($fp,$content);
                            fclose($fp);
        
                            $token_one = \DB::table('setting')->where('id', 1)->first();
                            // $token_two = \DB::table('setting')->where('id', 2)->first();
                            $file_path = uploadFile('truyenfull/' . $slug . '/' . $url . '.txt', $token_one->token);
                            $file_dropbox = getLinkFile($file_path, $token_one->token);
        
                            unlink('truyenfull/'.$slug.'/'.$url . '.txt');
                            $files = glob('truyenfull/'.$slug.'/*');
                            foreach($files as $file){
                                if(is_file($file)) {
                                    unlink($file);
                                }
                            }
                            rmdir('truyenfull/'.$slug);
                            //them number_chap
                            $arr_name_chap = explode('-', $url);
                            if($arr_name_chap[0] !== "quyen"){
                                $number = preg_replace('(chuong-)','', $url);
                                $arrayTwoNumber = explode('-', $number);
                                $number_chap = $arrayTwoNumber[0];
                            }else{
                                $number_chap = 0;
                            }
                            //
                            \DB::table('chapters')->insert([
                                'name' => $name,
                                'slug' => $url,
                                'story_id' => $id,
                                'content' => 'truyenfull/' . $slug . '/' . $url . '.txt',
                                'dropbox' => $file_dropbox,
                                'prev_chap' => $prev_chap,
                                'next_chap' => $next_chap,
                                'number_chap' => $number_chap,
                            ]);
                        }
                        if($next_chap_cv !== $URL){
                            if($next_chap_cv !=='javascript:void(0)'){
                                addChapter2($next_chap_cv, $id, $slug, 1);
                            }else{
                                $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
                                $time_created = $date->format('Y-m-d H:i:s');
                                $chapter = \DB::table('chapters')->where('story_id',$id)->orderBy('id','DESC')->get();
                                $total_chapter = count($chapter);
                                $url_last_chapter = $chapter[0]->slug;
                                $name_chap_last = $chapter[0]->name;
                                //them number_last
                                $arr_name_last = explode(':', $name_chap_last);
                                $number_last =  $arr_name_last[0];
                                //
                                \DB::table('list_truyenfull')->where('id',$id)->update([
                                    'chapter_update_time' => $time_created,
                                    'url_last_chapter' => $url_last_chapter,
                                    'name_chap_last' => $name_chap_last,
                                    'total_chapter' => $total_chapter,
                                    'number_last' => $number_last,
                                    'type' => 0,
                                ]);
                            }
                        }else{
                            $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
                            $time_created = $date->format('Y-m-d H:i:s');
                            $chapter = \DB::table('chapters')->where('story_id',$id)->orderBy('id','DESC')->get();
                            $total_chapter = count($chapter);
                            $url_last_chapter = $chapter[0]->slug;
                            $name_chap_last = $chapter[0]->name;
                            //them number_last
                            $arr_name_last = explode(':', $name_chap_last);
                            $number_last =  $arr_name_last[0];
                            //
                            \DB::table('list_truyenfull')->where('id',$id)->update([
                                'chapter_update_time' => $time_created,
                                'url_last_chapter' => $url_last_chapter,
                                'name_chap_last' => $name_chap_last,
                                'total_chapter' => $total_chapter,
                                'number_last' => $number_last,
                                'type' => 0,
                            ]);
                        }
                    }
                }
            }
            // cào ngược
            function addChapter1($URL, $id, $slug, $check){
                $id = $id;
                $slug = preg_replace('(/)','', $slug);
                $GLOBALS['response'] = curl_get_file_contents($URL);
                $GLOBALS['html'] = new simple_html_dom();
                $GLOBALS['html']->load($GLOBALS['response']);
                if($GLOBALS['html']){
                    if($GLOBALS['html']->find('.chapter-title',0)){
                        $name = html_entity_decode($GLOBALS['html']->find('.chapter-title',0)->plaintext);
                        $url = $GLOBALS['html']->find('.chapter-title',0)->href ;
                        $url = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $url);
                        $url = preg_replace('(/)','', $url);
                        $prev_chap_cv = $GLOBALS['html']->find('#prev_chap',0)->href ;
                        $prev_chap = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $prev_chap_cv);
                        $prev_chap = preg_replace('(/)','', $prev_chap);
                        //them number_last
                        $arr_name_last = explode(':', $name);
                        $number_last =  $arr_name_last[0];
                        //
                        if($check == 1){
                            \DB::table('chapters')->where('story_id',$id)->where('slug', $prev_chap)->update([
                                'next_chap' => $url,
                            ]);
                        }
                        
                        if($check == 2){
                            \DB::table('list_truyenfull')->where('id',$id)->update([
                                'url_last_chapter' => $url,
                                'name_chap_last' => $name,
                                'number_last' => $number_last,
                            ]);
                        }
    
                        $next_chap_cv = $GLOBALS['html']->find('#next_chap',0)->href ;
                        $next_chap = preg_replace('(https://truyenfull.vn/' . $slug .  ')','', $next_chap_cv);
                        $next_chap = preg_replace('(/)','', $next_chap);
                        
                        $count_check_chapter = \DB::table('chapters')->where('slug', $url)->where('story_id', $id)->count();
                        if ($count_check_chapter == 0) {
                            $content = $GLOBALS['html']->find('#chapter-c',0)->innertext ;
                            $content = preg_replace('(<div.*?class=.*?>.*?</div>)','', $content);
                            $content = preg_replace('(<a.*?class=.*?>.*?</a>)','', $content);

                            checkFolder('truyenfull/' . $slug);
                            $file = 'truyenfull/' . $slug . '/' . $url . '.txt';
                            $fp = fopen($file,"w");
                            fwrite($fp,$content);
                            fclose($fp);
        
                            $token_one = \DB::table('setting')->where('id', 1)->first();
                            // $token_two = \DB::table('setting')->where('id', 2)->first();
                            $file_path = uploadFile('truyenfull/' . $slug . '/' . $url . '.txt', $token_one->token);
                            $file_dropbox = getLinkFile($file_path, $token_one->token);
        
                            unlink('truyenfull/'.$slug.'/'.$url . '.txt');
                            $files = glob('truyenfull/'.$slug.'/*');
                            foreach($files as $file){
                                if(is_file($file)) {
                                    unlink($file);
                                }
                            }
                            rmdir('truyenfull/'.$slug);
                            //them number_chap
                            $arr_name_chap = explode('-', $url);
                            if($arr_name_chap[0] !== "quyen"){
                                $number = preg_replace('(chuong-)','', $url);
                                $arrayTwoNumber = explode('-', $number);
                                $number_chap = $arrayTwoNumber[0];
                            }else{
                                $number_chap = 0;
                            }
                            //
                            \DB::table('chapters')->insert([
                                'name' => $name,
                                'slug' => $url,
                                'story_id' => $id,
                                'content' => 'truyenfull/' . $slug . '/' . $url . '.txt',
                                'dropbox' => $file_dropbox,
                                'prev_chap' => $prev_chap,
                                'next_chap' => $next_chap,
                                'number_chap' => $number_chap,
                            ]);
                        }
                        $count_check_chapter = \DB::table('chapters')->where('slug', $prev_chap)->where('story_id', $id)->count();
                        if ($count_check_chapter == 0) {
                            addChapter1($prev_chap_cv, $id, $slug, 1);
                        }else{
                            $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
                            $time_created = $date->format('Y-m-d H:i:s');
                            $chapter = \DB::table('chapters')->where('story_id',$id)->orderBy('id','DESC')->get();
                            $total_chapter = count($chapter);
                            $url_last_chapter = $chapter[0]->slug;
                            $name_chap_last = $chapter[0]->name;
                            \DB::table('list_truyenfull')->where('id',$id)->update([
                                'chapter_update_time' => $time_created,
                                'total_chapter' => $total_chapter,
                            ]);
                        }
                    }
                }
            }
            // addChapter2('https://truyenfull.vn/he-thong-xuyen-khong-cong-luoc-nam-than/chuong-4/', 32589, 'he-thong-xuyen-khong-cong-luoc-nam-than', 1);dd(1);
            $GLOBALS['response'] = curl_get_file_contents("https://truyenfull.vn/");
            $GLOBALS['html'] = new simple_html_dom();
            $GLOBALS['html']->load($GLOBALS['response']);
            if($GLOBALS['html']){
                $ebooks = $GLOBALS['html']->find('.list-new', 0)->find('.row');
                foreach($ebooks as $key=>$book){
                    if($book->find('.text-info', 0)->plaintext !== "Chưa có"){
                        $full = 0;
                        $name = html_entity_decode($book->find('h3 a', 0)->plaintext);
                        $slug_truyen = $book->find('h3 a', 0)->href;
                        $slug_truyen = preg_replace('(https://truyenfull.vn/)', '', $slug_truyen);
                        $slug_truyen = preg_replace('(/)', '', $slug_truyen);

                        $slug_chapter = $book->find('.text-info a', 0)->href;
                        $slug_chapter = preg_replace('(https://truyenfull.vn/'.$slug_truyen.')', '', $slug_chapter);
                        $slug_chapter = preg_replace('(/)', '', $slug_chapter);
                        // echo $slug_chapter;die;
                        if($book->find('.label-full', 0)){
                            $full = 1;
                        }
    
                        $truyen_name = \DB::table('list_truyenfull')->where('name',$name)->first();
                        if($truyen_name){
                            $id_truyen = $truyen_name->id;
                            $slug_truyen = $truyen_name->slug;
                            if($full == 1){
                                \DB::table('list_truyenfull')->where('id',$id_truyen)->update([
                                    'full' => $full,
                                ]);
                            }
                            $chapter = \DB::table('chapters')->where('story_id',$id_truyen)->where('slug',$slug_chapter)->first();
                            if(!$chapter){
                                $check = 1;
                                $slug_old = 'https://truyenfull.vn/'.$slug_truyen.'/'.$truyen_name->url_last_chapter;
                                $HTML['response'] = curl_get_file_contents($slug_old);
                                $HTML['html'] = new simple_html_dom();
                                $HTML['html']->load($HTML['response']);
                                $next_chap = $HTML['html']->find('#next_chap',0)->href ;
                                if($next_chap !=='javascript:void(0)'){
                                    // $slug = preg_replace('(/)','', $slug);
                                    $GLOBALS['response'] = curl_get_file_contents($next_chap);
                                    $GLOBALS['html'] = new simple_html_dom();
                                    $GLOBALS['html']->load($GLOBALS['response']);
                                    if($GLOBALS['html']->find('.chapter-title',0)){
                                        addChapter2($slug_old, $id_truyen, $slug_truyen, $check);
                                    }else{
                                        $slug_new = 'https://truyenfull.vn/'.$slug_truyen.'/'.$slug_chapter;
                                        $check = 2;
                                        addChapter1($slug_new, $id_truyen, $slug_truyen, $check);
                                    }
                                }else{
                                    $slug_new = 'https://truyenfull.vn/'.$slug_truyen.'/'.$slug_chapter;
                                    $check = 2;
                                    addChapter1($slug_new, $id_truyen, $slug_truyen, $check);
                                }
                            }
                        }else{
                            $truyen = \DB::table('list_truyenfull')->where('slug',$slug_truyen)->first();
                            if($truyen){
                                $id_truyen = $truyen->id;
                                if($full == 1){
                                    \DB::table('list_truyenfull')->where('id',$id_truyen)->update([
                                        'full' => $full,
                                    ]);
                                }
                                $chapter = \DB::table('chapters')->where('story_id',$id_truyen)->where('slug',$slug_chapter)->first();
                                if(!$chapter){
                                    $check = 1;
                                    // $flag = 0;
                                    // $total_flag = 0;
                                    // addChapter($id_truyen, $slug_truyen, $slug_chapter, $full, $check, $truyen->total_chapter, $flag);
                                    $slug_old = 'https://truyenfull.vn/'.$slug_truyen.'/'.$truyen->url_last_chapter;
                                    $HTML['response'] = curl_get_file_contents($slug_old);
                                    $HTML['html'] = new simple_html_dom();
                                    $HTML['html']->load($HTML['response']);
                                    $next_chap = $HTML['html']->find('#next_chap',0)->href ;
                                    if($next_chap !=='javascript:void(0)'){
                                        // $slug = preg_replace('(/)','', $slug);
                                        $GLOBALS['response'] = curl_get_file_contents($next_chap);
                                        $GLOBALS['html'] = new simple_html_dom();
                                        $GLOBALS['html']->load($GLOBALS['response']);
                                        if($GLOBALS['html']->find('.chapter-title',0)){
                                            addChapter2($slug_old, $id_truyen, $slug_truyen, $check);
                                        }else{
                                            $slug_new = 'https://truyenfull.vn/'.$slug_truyen.'/'.$slug_chapter;
                                            $check = 2;
                                            addChapter1($slug_new, $id_truyen, $slug_truyen, $check);
                                        }
                                    }else{
                                        $slug_new = 'https://truyenfull.vn/'.$slug_truyen.'/'.$slug_chapter;
                                        $check = 2;
                                        addChapter1($slug_new, $id_truyen, $slug_truyen, $check);
                                    }

                                }
                            }else{
                                addTruyen($name, $slug_truyen, $full, $slug_chapter);
                            }
                        }
                    }
                }
            }
            Cache::forget('novel_home_dark');
            Cache::forget('novel_home_light');
            Cache::forget('data_new_updateds_dark');
            Cache::forget('data_new_updateds_light');
            Cache::forget('data_finished_storys_dark');
            Cache::forget('data_finished_storys_light');
            Cache::forget('novel_story_hot_dark');
            Cache::forget('novel_story_hot_light');
        ?>
    </body>
</html>
