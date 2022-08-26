<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cronjob/save-visited', 'CronJobController@saveVisited');
Route::get('cronjob/update-view', 'CronJobController@updateView');
Route::get('cronjob/refresh_token', 'CronJobController@refreshToken');
Route::get('cronjob/get-truyen', 'CronJobController@getTruyenCronjob');
// Route::get('cronjob/get_link', 'CronJobController@getLink');

// Route::resource('/admincp/storys', 'AdminController'); 
// Route::post('/admincp/uploadImage', 'AdminController@uploadImage'); 

Route::get('/', 'HomeController@index');
Route::get('truyen-moi-cap-nhat', 'HomeController@storyNewUpdated');
Route::get('truyen-da-hoan-thanh', 'HomeController@finishedStory');
Route::get('truyen-noi-bat', 'HomeController@storyHotNew');
Route::get('truyen-hot', 'HomeController@storyHot');
Route::get('truyen-tuan', 'HomeController@storyWeek');
Route::get('truyen-thang', 'HomeController@storyMonth');
Route::get('chi-tiet/{slug}', 'HomeController@detailStory')->where('slug', '.*')->name('client.show-story');
Route::get('the-loai/{slug}', 'HomeController@detailType')->where('slug', '.*')->name('client.show-type');
Route::get('tac-gia/{slug}', 'HomeController@author')->where('slug', '.*')->name('client.show-author');
Route::get('ajax/search', 'HomeController@searchAjax')->name('searchAjax');
Route::post('ajax/report', 'ChapterController@reportAjax')->name('reportAjax');
Route::post('ajax/rate', 'HomeController@rateAjax')->name('rateAjax');
Route::post('ajax/list-story-author','HomeController@listStoryAuthor');
Route::get('ajax/get-list-chapter','ChapterController@getListChapter');
Route::get('ket-qua', 'HomeController@Search');
Route::get('{story}/{slug}', 'ChapterController@showChapter')->where('story', '.*')->where('slug', '.*')->name('client.show-chapter');

