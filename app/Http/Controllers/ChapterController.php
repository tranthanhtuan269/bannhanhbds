<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use App\ListTruyenfull;
use App\Chapter;
use App\Type;
use App\Helpers\Helper;
use App\Report;

class ChapterController extends Controller
{
    public function showChapter($story, $slug){
        $dark_light = $this->a;
        $story = ListTruyenfull::where('slug', $story)->first();
        Helper::countVisited($story->id);
        $chapter = Chapter::where('story_id', $story->id)->where('slug', $slug)->first();
        if($chapter->dropbox){
            $chapter_news = Chapter::where('story_id', $story->id)->where('slug', $chapter->next_chap)->first();
            return view('readNovel',compact('chapter','story','chapter_news','dark_light'));
        }else{
            $tokens = \DB::table('setting')->where('id', 2)->first();
            $token = $tokens->token;
            $url = preg_replace('(truyenfull)', '', $chapter->content);
            $chapter->dropbox = Helper::getLinkFile($url, $token);
            $chapter->save();
            $chapter_news = Chapter::where('story_id', $story->id)->where('slug', $chapter->next_chap)->first();
            return view('readNovel',compact('chapter','story','chapter_news','dark_light'));
        }
    }

    public function reportAjax(Request $request) {
        $item = new Report;
        $item->id_story = $request->id_story;
        $item->id_chap = $request->id_chap;
        $item->content = $request->content;
        $item->save();
        return response()->json(['status' => 200, "message"=>"Thank you"]);
    }

    public function getListChapter(Request $request) {
        $list_chapter = Chapter::where('story_id', $request->id_story)->orderBy('number_chap', 'ASC')->orderBy('id', 'ASC')->get();
        return response()->json(['status' => 200, "list_chapter"=>$list_chapter]);
    }
}