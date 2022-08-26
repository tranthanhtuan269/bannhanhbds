<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProvinceRequest;
use Auth;
use Cache;
use App\ListTruyenfull;
use App\Author;
use App\Type;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $story = ListTruyenfull::where('slug', 'LIKE', "%$keyword%")
				->orWhere('name', 'LIKE', "%$keyword%")
				->paginate(10);
        } else {
            $story = ListTruyenfull::paginate(10);
        }
        $authors = Author::get();
        return view('backends.story.index', compact('story','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $authors = Author::get();
        $types = Type::get();
        return view('backends.story.create', compact('authors','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $arr_type_id = [];
        
        $item = new ListTruyenfull();
        $item->name =  $request->name;
        $item->slug =  $request->slug;
        $item->image =  $request->image;
        $item->rate =  $request->rate;
        $item->number_of_votes =  $request->number_of_votes;
        $item->view =  $request->view;
        $item->view_week =  $request->view_week;
        $item->view_month =  $request->view_month;
        $item->full =  $request->full;
        $item->url_last_chapter =  $request->url_last_chapter;
        $item->name_chap_last =  $request->name_chap_last;
        $item->total_chapter =  $request->total_chapter;
        $item->content = $request->content;
        $item->author_id =  $request->id_author;
        $item->save();
        $item->chapter_update_time = \App\Helpers\Helper::formatDate('d/m/Y H:i', $request->updated_at, 'Y-m-d H:i:s');

        foreach($request->type_story as $value){
            $arr_type_id[] = ['story_id' => $item->id, 'type_id' => $value];
        }
        \App\TypeStory::insert($arr_type_id);

        $res=array('status'=>"200","Message"=>"The news has been successfully updated!");
        echo json_encode($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data = ListTruyenfull::where('id', $id)->first();
        $authors = Author::get();
        return view('backends.story.edit', compact('data','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $item = ListTruyenfull::find($id);
        $item->name =  $request->name;
        $item->rate =  $request->rate;
        $item->number_of_votes =  $request->number_of_votes;
        $item->view =  $request->view;
        $item->view_week =  $request->view_week;
        $item->view_month =  $request->view_month;
        $item->full =  $request->full;
        $item->url_last_chapter =  $request->url_last_chapter;
        $item->name_chap_last =  $request->name_chap_last;
        $item->total_chapter =  $request->total_chapter;
        $item->content = $request->content;
        $item->author_id =  $request->id_author;
        $item->chapter_update_time = \App\Helpers\Helper::formatDate('d/m/Y H:i', $request->updated_at, 'Y-m-d H:i:s');
        $item->save();

        $res=array('status'=>"200","Message"=>"The news has been successfully updated!");
        echo json_encode($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        
    }
    public function uploadImage(Request $request){
        $img_file = '';
        if (isset($request->base64)) {
            $data = $request->base64;

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $filename = time() . '.png';
            file_put_contents(base_path('public/image-avatars/') . $filename, $data);

            return \Response::json(array('code' => '200', 'message' => 'success', 'image_url' => $filename));
        }
        return \Response::json(array('code' => '404', 'message' => 'unsuccess', 'image_url' => ""));
    }

}
