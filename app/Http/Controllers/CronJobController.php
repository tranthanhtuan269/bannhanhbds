<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListTruyenfull;
use App\View;
use Carbon\Carbon;
use Cache;

class CronJobController extends Controller
{
    public function saveVisited (){
		$time_created = strtotime(Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString());
		$cache_post_id = Cache::get('cache_post_id');
		if (Cache::has('cache_post_id')) {
			foreach ($cache_post_id as $post_id => $count_visited) {
				$item = ListTruyenfull::find($post_id);
				if ($item) {
					// $item->view_week = $item->view_week + $count_visited;
					// if (date('d') == '01') {
					// 	$item->view_month = $count_visited;
					// } else {
					// 	$item->view_month = $item->view_month + $count_visited;
					// }

					// $item->view = $item->view + $count_visited;
					// $item->save();
					$item->view = $item->view + $count_visited;
					$item->save();
					$item_view = new View();
					$item_view->story_id = $post_id;
					$item_view->view = $count_visited;
					$item_view->date = $time_created;
					$item_view->save();
				}
			}
			Cache::forget('cache_post_id');
		}
    }

	// public function setViewWeek (){
	// 	$datas = ListTruyenfull::where('view_week', '>', 0)->get();
	// 	foreach($datas as $data){
	// 		$data->view_week = 0;
	// 		$data->save();
	// 	}
    // }

	// public function setViewMonth (){
	// 	$datas = ListTruyenfull::where('view_month', '>', 0)->get();
	// 	foreach($datas as $data){
	// 		$data->view_month = 0;
	// 		$data->save();
	// 	}
    // }

	public function updateView(){
		$time_created = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
		$last_week = strtotime(date("Y-m-d", strtotime('-7 day',strtotime($time_created))));
		// $timestamp = strtotime("2022:02:21 23:00:00");
		$last_month = strtotime(date("Y-m-d", strtotime('-1 month',strtotime($time_created))));
		$view_weeks = View::select('story_id')->where('date', '>', $last_week)->groupBy('story_id')->get();
		$arr_weeks = [];
		if(count($view_weeks) > 0){
			foreach($view_weeks as $val){
				$arr_week[] = $val->story_id;
				$total_week = 0; 
				$view_storys = View::where('date', '>', $last_week)->where('story_id', $val->story_id)->get();
				foreach($view_storys as $v){
					$total_week = $total_week + $v->view;
				}
				$story = ListTruyenfull::find($val->story_id);
				$story->view_week = $total_week;
				$story->save();
			}
			// set lại view tuần = 0 với những truyện không có view trong 1 tuần qua
			$set_story_week = ListTruyenfull::whereNotIn('id', $arr_week)->where('view_week','>',0)->get();
			foreach($set_story_week as $data){
				$data->view_week = 0;
				$data->save();
			}
		}
		$view_months = View::select('story_id')->where('date', '>', $last_month)->groupBy('story_id')->get();
		$arr_month = [];
		if(count($view_months) > 0){
			foreach($view_months as $val){
				$arr_month[] = $val->story_id;
				$total_month = 0; 
				$view_storys = View::where('date', '>', $last_month)->where('story_id', $val->story_id)->get();
				foreach($view_storys as $v){
					$total_month = $total_month + $v->view;
				}
				$story = ListTruyenfull::find($val->story_id);
				$story->view_month = $total_month;
				$story->save();
			}
			$set_story_month = ListTruyenfull::whereNotIn('id', $arr_month)->where('view_month','>',0)->get();
			foreach($set_story_month as $data){
				$data->view_month = 0;
				$data->save();
			}
		}
		// xóa những bản ghi quá 1 tháng
		View::where('date', '<', $last_month)->delete();
	}

	public function getTruyenCronjob ( Request $request ){
		return view('clone.cronjob');
	}

	public function getLink ( Request $request ){
		return view('clone.get_link');
	}

	public function refreshToken ( Request $request ){
		return view('clone.refresh_token');
	}
}
