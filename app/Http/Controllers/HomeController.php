<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use App\ListTruyenfull;
use App\Chapter;
use App\Type;
use App\Author;
use App\Helpers\Helper;
use Carbon\Carbon;
use Cache;

class HomeController extends Controller
{
    
    public function index(Request $request){
        return Cache::rememberForever('novel_home_'.$this->a, function() {
            $data_hots = ListTruyenfull::where('type',0)->orderBy('view', 'DESC')->orderBy('id', 'DESC')->take(12)->get();
            $data_news = ListTruyenfull::where('type',0)->orderBy('id', 'DESC')->take(5)->get();
            $data_updates = ListTruyenfull::where('type',0)->orderBy('chapter_update_time', 'DESC')->orderBy('view', 'DESC')->take(11)->get();
            $data_weeks = ListTruyenfull::where('type',0)->orderBy('view_week','DESC')->orderBy('id', 'DESC')->take(5)->get();
            $data_months = ListTruyenfull::where('type',0)->orderBy('view_month','DESC')->orderBy('id', 'DESC')->take(5)->get();
            return view('home_'.$this->a,compact('data_hots','data_news','data_updates','data_weeks','data_months'))->render();
        });
        

        // $data_hots = Cache::remember('data_hots', Carbon::now()->endOfDay(), function(){
        //     return ListTruyenfull::orderBy('view', 'DESC')->take(12)->get();
        // });
        // $data_news = Cache::remember('data_news', Carbon::now()->addMinutes(20), function(){
        //     return ListTruyenfull::orderBy('id', 'DESC')->take(5)->get();
        // });
        // $data_updates = Cache::remember('data_updates', Carbon::now()->addMinutes(20), function(){
        //     return ListTruyenfull::orderBy('chapter_update_time', 'DESC')->orderBy('view', 'DESC')->take(11)->get();
        // });
        // $data_weeks = Cache::remember('data_weeks', Carbon::now()->endOfDay(), function(){
        //     return ListTruyenfull::orderBy('view_week','DESC')->take(5)->get();
        // });
        // $data_months = Cache::remember('data_months', Carbon::now()->endOfDay(), function(){
        //     return ListTruyenfull::orderBy('view_month','DESC')->take(5)->get();
        // });
        // return view('home', compact('data_hots','data_news','data_updates','data_weeks','data_months'));

        
    }
    public function storyNewUpdated(Request $request){
        $array_type = [];
        $status = -1;
        $chapter = -1;
        if(is_null($request->type) && is_null($request->status) && is_null($request->chapter) && is_null($request->page)){
            return Cache::rememberForever('data_new_updateds_'.$this->a, function() {
                $array_type = [];
                $status = -1;
                $chapter = -1;
                $datas = ListTruyenfull::selectRaw('list_truyenfull.*')->where('type',0)->orderBy('chapter_update_time', 'DESC')->orderBy('view', 'DESC')->paginate(10);
                return view('categorys.story_update_'.$this->a,compact('datas','status','chapter','array_type'))->render();
            });
        }elseif(is_null($request->type) && is_null($request->chapter) && $request->page == 1){
            return Cache::rememberForever('data_new_updateds_'.$this->a, function() {
                $array_type = [];
                $status = -1;
                $chapter = -1;
                $datas = ListTruyenfull::selectRaw('list_truyenfull.*')->where('type',0)->orderBy('chapter_update_time', 'DESC')->orderBy('view', 'DESC')->paginate(10);
                return view('categorys.story_update_'.$this->a,compact('datas','status','chapter','array_type'))->render();
            });
        }else{
            if(isset($request->type)){
                $datas = ListTruyenfull::join('type_story', 'type_story.story_id', '=', 'list_truyenfull.id')
                                        ->join('types', 'types.id', '=', 'type_story.type_id')
                                        ->selectRaw('list_truyenfull.*');
                $array_type = explode(",",$request->type);
                $datas = $datas->whereIn('type_story.type_id',$array_type);
                if(isset($request->status)){
                    $status = $request->status;
                    $datas = $datas->where("full", $request->status);
                }
                if(isset($request->chapter)){
                    $chapter = $request->chapter;
                    if($chapter == 1){
                        $datas = $datas->where("list_truyenfull.total_chapter", '<', 100);
                    }elseif($chapter == 2){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [100,500]);
                    }elseif($chapter == 3){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [500,1000]);
                    }else{
                        $datas = $datas->where("list_truyenfull.total_chapter", '>', 1000);
                    }
                }
            }else{
                $datas = ListTruyenfull::selectRaw('list_truyenfull.*');
                if(isset($request->status)){
                    $status = $request->status;
                    $datas = $datas->where("full", $request->status);
                }
                if(isset($request->chapter)){
                    $chapter = $request->chapter;
                    if($chapter == 1){
                        $datas = $datas->where("list_truyenfull.total_chapter", '<', 100);
                    }elseif($chapter == 2){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [100,500]);
                    }elseif($chapter == 3){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [500,1000]);
                    }else{
                        $datas = $datas->where("list_truyenfull.total_chapter", '>', 1000);
                    }
                }
            }
            $datas = $datas->where('type',0)->orderBy('chapter_update_time', 'DESC')->groupBy('list_truyenfull.id')->paginate(10);
            return view('categorys.story_update_'.$this->a,compact('datas','status','chapter','array_type'));
        }
    }
    public function finishedStory(Request $request){
        $array_type = [];
        $chapter = -1;
        if(is_null($request->type) && is_null($request->chapter) && is_null($request->page)){
            return Cache::rememberForever('data_finished_storys_'.$this->a, function() {
                $array_type = [];
                $chapter = -1;
                $datas = ListTruyenfull::selectRaw('list_truyenfull.*')->where('type',0)->where('full', 1)->orderBy('view', 'DESC')->paginate(10);
                return view('categorys.story_full_'.$this->a,compact('datas','chapter','array_type'))->render();
            });
        }elseif(is_null($request->type) && is_null($request->chapter) && $request->page == 1){
            return Cache::rememberForever('data_finished_storys_'.$this->a, function() {
                $array_type = [];
                $chapter = -1;
                $datas = ListTruyenfull::selectRaw('list_truyenfull.*')->where('type',0)->where('full', 1)->orderBy('view', 'DESC')->paginate(10);
                return view('categorys.story_full_'.$this->a,compact('datas','chapter','array_type'))->render();
            });
        }else{
            if(isset($request->type)){
                $datas = ListTruyenfull::join('type_story', 'type_story.story_id', '=', 'list_truyenfull.id')
                                        ->selectRaw('list_truyenfull.*');
                $array_type = explode(",",$request->type);
                $datas = $datas->whereIn('type_story.type_id',$array_type);
                if(isset($request->chapter)){
                    $chapter = $request->chapter;
                    if($chapter == 1){
                        $datas = $datas->where("list_truyenfull.total_chapter", '<', 100);
                    }elseif($chapter == 2){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [100,500]);
                    }elseif($chapter == 3){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [500,1000]);
                    }else{
                        $datas = $datas->where("list_truyenfull.total_chapter", '>', 1000);
                    }
                }
            }else{
                $datas = ListTruyenfull::selectRaw('list_truyenfull.*');
                if(isset($request->chapter)){
                    $chapter = $request->chapter;
                    if($chapter == 1){
                        $datas = $datas->where("list_truyenfull.total_chapter", '<', 100);
                    }elseif($chapter == 2){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [100,500]);
                    }elseif($chapter == 3){
                        $datas = $datas->whereBetween("list_truyenfull.total_chapter", [500,1000]);
                    }else{
                        $datas = $datas->where("list_truyenfull.total_chapter", '>', 1000);
                    }
                }
            }
            $datas = $datas->where('list_truyenfull.type',0)->where('list_truyenfull.full', 1)->groupBy('list_truyenfull.id')->paginate(10);
        }
        return view('categorys.story_full_'.$this->a,compact('datas','chapter','array_type'));
    }

    public function storyHotNew (request $request) {
        return Cache::rememberForever('novel_story_hot_'.$this->a, function() {
            $datas = ListTruyenfull::orderBy('view', 'DESC')->orderBy('id', 'DESC')->take(10)->get();
            $datas_week = ListTruyenfull::orderBy('view_week', 'DESC')->orderBy('id', 'DESC')->take(10)->get();
            $datas_month = ListTruyenfull::orderBy('view_month', 'DESC')->orderBy('id', 'DESC')->take(10)->get();
            return view('categorys.ranking_'.$this->a,compact('datas','datas_week','datas_month'))->render();
        });

        // $datas = Cache::rememberForever('all_story_hot', function(){
        //     return ListTruyenfull::where('type',0)->orderBy('view', 'DESC')->orderBy('id', 'DESC')->take(10)->get();
        // });
        // $datas_week = Cache::rememberForever('week_story_hot', function(){
        //     return ListTruyenfull::where('type',0)->orderBy('view_week', 'DESC')->orderBy('id', 'DESC')->take(10)->get();
        // });
        // $datas_month = Cache::rememberForever('month_story_hot', function(){
        //     return ListTruyenfull::where('type',0)->orderBy('view_month', 'DESC')->orderBy('id', 'DESC')->take(10)->get();
        // });
        // return view('categorys.ranking',compact('datas','datas_week','datas_month'));
    }

    public function author($slug){
        $dark_light = $this->a;
        $author = Author::where('slug', $slug)->first();
        return view('detailAuthor',compact('author','dark_light'));
    }
    public function listStoryAuthor(Request $request){
        $datas = ListTruyenfull::where('type',0)->where('author_id',$request->id_author);
        if($request->check % 2 ==0){
            $datas->where('full', 1);
        }else{
            $datas->where('full', 0);
        }
        if($request->nameStory == 1){
            $datas->orderBy('name', 'ASC');
        }else{
            $datas->orderBy('name', 'DESC');
        }
        if($request->updateDay == 1){
            $datas->orderBy('chapter_update_time', 'DESC');
        }else{
            $datas->orderBy('chapter_update_time', 'ASC');
        }
        if($request->numberOfReads == 1){
            $datas->orderBy('view', 'DESC');
        }else{
            $datas->orderBy('view', 'ASC');
        }
        if($request->chapterNumber == 1){
            $datas->orderBy('total_chapter', 'DESC');
        }else{
            $datas->orderBy('total_chapter', 'ASC');
        }
        $datas = $datas->get();
        return view('layouts.list_story_author', compact('datas') )->render();
    }
    public function searchAjax(Request $request) {
        $results = ListTruyenfull::where('type',0)->where('name', 'like', '%' . $request->search . '%')
                    ->orderBy('name', 'ASC')
                    ->get()->toArray();
        return response()->json(["Response"=>"Success","results"=> $results]);
    }
    public function Search(Request $request) {
        $dark_light = $this->a;
        $search = $request->tukhoa;
        $message = '';
        $d = 'sdclksnsdnvlsd';
        if(strlen($search)>=3) {
            $datas = ListTruyenfull::where('type',0)->where('name', 'like', '%' . $search . '%')->orderBy('name', 'ASC'); 
            $length = $datas->count();
            $datas = $datas->paginate(18);
            if ($length==0) {
                $message = 'Không tìm thấy kết quả nào phù hợp';
            }
        }else {
            $message = 'Từ khóa quá ngắn, vui lòng nhập từ khóa lớn hơn 3 kí tự';
            $length = 0;
            $datas = ListTruyenfull::where('type',0)->where('name', 'like', '%' . $d . '%')->orderBy('name', 'ASC')->paginate(18); 
        };
        return view('resultSearch',compact('datas','search','length','message','dark_light'));   
    }

    public function detailStory($slug) {
        $dark_light = $this->a;
        $data = ListTruyenfull::where('slug', $slug)->first();
        $data_author = ListTruyenfull::where('type',0)->where('author_id', $data->author_id)->where('id', '!=', $data->id)->orderBy('view', 'DESC')->take(8)->get();
        $chapter_first = Chapter::where('story_id', $data->id)->orderBy('id', 'asc')->first();
        $chapter_last_date = Chapter::where('story_id', $data->id)->orderBy('id', 'desc')->first();
        if($chapter_first) {
            $chapters = Chapter::where('story_id', $data->id)->orderBy('number_chap', 'ASC')->orderBy('id', 'ASC')->paginate(40);
            $d = Chapter::where('story_id', $data->id)->orderBy('number_chap', 'DESC')->orderBy('id', 'ASC')->first();
            $number = $d->number_chap;
            $types = Type::join('type_story', 'type_story.type_id', '=', 'types.id')
                            ->where('type_story.story_id', $data->id)->get();
            return view('detailNovel',compact('data','types','chapter_first','chapters','data_author','chapter_last_date','number','dark_light'));
        }else {
            return redirect('/');
        }
    }
    public function detailType(Request $request, $slug) {
        $dark_light = $this->a;
        $status = -1;
        $chapter = -1;
        $type = Type::where('slug', $slug)->first();
        $datas = ListTruyenfull::join('type_story', 'type_story.story_id', '=', 'list_truyenfull.id')
                                    ->selectRaw('list_truyenfull.*')
                                    ->where('type_story.type_id', $type->id);
        if(isset($request->status)){
            $status = $request->status;
            $datas = $datas->where("list_truyenfull.full", $status);
        }
        if(isset($request->chapter)){
            $chapter = $request->chapter;
            if($chapter == 1){
                $datas = $datas->where("list_truyenfull.total_chapter", '<', 100);
            }elseif($chapter == 2){
                $datas = $datas->whereBetween("list_truyenfull.total_chapter", [100,500]);
            }elseif($chapter == 3){
                $datas = $datas->whereBetween("list_truyenfull.total_chapter", [500,1000]);
            }else{
                $datas = $datas->where("list_truyenfull.total_chapter", '>', 1000);
            }
        }
        $datas = $datas->where('list_truyenfull.type',0)->groupBy('list_truyenfull.id')->paginate(10);
        return view('type',compact('datas','type','status','chapter','dark_light'));
    }

    public function detailType2(Request $request, $slug) {

        $status = -1;
        $chapter = -1;
        $type = Type::where('slug', $slug)->first();

        \DB::enableQueryLog();

        // $datas = ListTruyenfull::join('type_story', 'type_story.story_id', '=', 'list_truyenfull.id')
        //                             ->selectRaw('list_truyenfull.*')
        //                             ->where('type_story.type_id', $type->id);

        // if(isset($request->status)){
        //     $status = $request->status;
        //     $datas = $datas->where("list_truyenfull.full", $status);
        // }

        // if(isset($request->chapter)){
        //     $chapter = $request->chapter;
        //     if($chapter == 1){
        //         $datas = $datas->where("list_truyenfull.total_chapter", '<', 100);
        //     }elseif($chapter == 2){
        //         $datas = $datas->whereBetween("list_truyenfull.total_chapter", [100,500]);
        //     }elseif($chapter == 3){
        //         $datas = $datas->whereBetween("list_truyenfull.total_chapter", [500,1000]);
        //     }else{
        //         $datas = $datas->where("list_truyenfull.total_chapter", '>', 1000);
        //     }
        // }

        // $datas = $datas->where('list_truyenfull.type',0)->orderBy('list_truyenfull.view', 'DESC')->groupBy('list_truyenfull.id');

        $sql = "select * from (";

        $sql .= "select list_truyenfull.*, authors.name as author_name from `list_truyenfull` join `type_story` on `type_story`.`story_id` = `list_truyenfull`.`id` join `authors` on `authors`.`id` = `list_truyenfull`.`author_id` where `type_story`.`type_id` = 35 and `type` = 0";

        if(isset($request->status)){
             $sql .= " and list_truyenfull.full = $status";
        }

        if(isset($request->chapter)){
            $chapter = $request->chapter;
            if($chapter == 1){
                $sql .= "and list_truyenfull.total_chapter <= 100";
            }elseif($chapter == 2){
                $sql .= "and list_truyenfull.total_chapter > 100 and list_truyenfull.total_chapter <= 500";
            }elseif($chapter == 3){
                $sql .= "and list_truyenfull.total_chapter > 500 and list_truyenfull.total_chapter <= 1000";
            }else{
                $sql .= "and list_truyenfull.total_chapter > 1000";
            }
        }

        $sql .= " group by `id` order by `view` desc";
        if($_GET['page']){
            $sql .= ") As SandwichCount limit 10 offset ". (($_GET['page'] - 1) * 10);
        }

        // dd($sql);

        $datas = \DB::select($sql);
        // dd($datas);

        foreach($datas as $data){
            echo $data->id .' - ' . $data->name . '<br />';
        }
        die;
        // $datas = $datas->paginate(10);

        // dd(\DB::getQueryLog());
        return view('type',compact('datas','type','status','chapter'));
    }

    public function rateAjax(Request $request) {
        $data = ListTruyenfull::where('id', $request->id)->first();
        $rate = $data->rate;
        $vote = $data->number_of_votes;
        if($request->rate_before==0){
            if($vote===0||$vote===null) {
                $vote = 1;
                $rate = round(($request->rate)*2,1);
            }else {
                $rate = round((($rate*$vote) + ($request->rate)*2)/($vote+1),1);
                $vote +=1; 
            }
        }else {
            $rate = round((($rate*$vote - ($request->rate_before)*2 + ($request->rate)*2)/$vote),1);
        } 
        $data->rate = $rate;
        $data->number_of_votes = $vote;
        $rate_new = number_format($rate/2,1);
        $data->save();
        Cache::forget('novel_home_'.$this->a);
        Cache::forget('novel_story_hot_'.$this->a);
        return response()->json(['status' => 200, "message"=>"Cảm ơn bạn đã đánh giá truyện","rate"=>$rate_new,"vote"=>$vote]);
    }
}