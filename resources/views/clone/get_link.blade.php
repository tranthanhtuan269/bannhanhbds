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


            // curl https://api.dropbox.com/oauth2/token \
            // -d grant_type=refresh_token \
            // -d refresh_token=LEIoQppcWZEAAAAAAAAAAUfaqlrOD0zqubu-G9Kkz0UhRezSkbC5ljlKlbW9KP4- \
            // -u 5jhxuvfzqzvdwi3:gs277omix25f7jb

            function getLinkImage ($img_path, $token){
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

                $data = '{"path":"'.$img_path.'"}';
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                //for debug only!
                // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                $resp = curl_exec($curl);
                curl_close($curl);
                // dd($resp);
                $a = json_decode($resp);
                if(isset($a->error)){
                    if(isset($a->error->shared_link_already_exists)) {
                        $img = $a->error->shared_link_already_exists->metadata->url;
                        $img = preg_replace('(dl=0)','raw=1', $img);
                        return $img;
                    }
                }else if(isset($a->url)){
                    $img = $a->url;
                    $img = preg_replace('(dl=0)','raw=1', $img);
                    return $img;
                }
            }
            
            $listchapters = \DB::table('chapters')->where('id', '>', 2773286)->where('dropbox','=',null)->get();
            foreach($listchapters as $key=>$chapter){
                $tokens = \DB::table('setting')->where('id', 2)->first();
                $token = $tokens->token;
                $url = preg_replace('(truyenfull)', '', $chapter->content);
                $new_url = getLinkImage($url, $token);
                \DB::table('chapters')->where('id',$chapter->id)->update([
                    'dropbox' => $new_url,
                ]);
            }
        ?>
    </body>
</html>
