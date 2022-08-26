<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\ListTruyenfull;
use App\Type;
use Carbon\Carbon;
use Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        Cache::flush();
        Cache::rememberForever('cache_types', function () {
            return Type::get();
        });
        \View::share('cache_types', Cache::get('cache_types'));

        Cache::put('story_full', ListTruyenfull::where('full',1)->orderBy('view','DESC')->take(10)->get(), Carbon::now()->endOfDay());
        \View::share('story_full', Cache::get('story_full'));

        if (!isset($_COOKIE["dark"]) || $_COOKIE["dark"] % 2 == 0){
            $this->a ="light";
        }else{
            $this->a ="dark";
        }

        // Cache::put('data_hots', ListTruyenfull::orderBy('view', 'DESC')->take(12)->get(), Carbon::now()->endOfDay());
        // \View::share('data_hots', Cache::get('data_hots'));

        // Cache::put('data_weeks', ListTruyenfull::orderBy('view_week','DESC')->take(5)->get(), Carbon::now()->endOfDay());
        // \View::share('data_weeks', Cache::get('data_weeks'));

        // Cache::put('data_months', ListTruyenfull::orderBy('view_month','DESC')->take(5)->get(), Carbon::now()->endOfDay());
        // \View::share('data_months', Cache::get('data_months'));

        // Cache::put('data_news', ListTruyenfull::orderBy('id', 'DESC')->take(5)->get(), Carbon::now()->addMinutes(20));
        // \View::share('data_news', Cache::get('data_news'));

        // Cache::put('data_updates', ListTruyenfull::orderBy('chapter_update_time', 'DESC')->orderBy('view', 'DESC')->take(11)->get(), Carbon::now()->addMinutes(20));
        // \View::share('data_updates', Cache::get('data_updates'));
    }
    public $a;

}
