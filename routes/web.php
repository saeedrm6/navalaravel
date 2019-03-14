<?php

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',function (){
   return 'hi';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile','ProfileController@index')->name('profile.index');
Route::get('/profile/setting','ProfileController@getsetting')->name('profile.getsetting');
Route::post('/profile/setting','ProfileController@setsetting')->name('profile.setsetting');
Route::get('/profile/uploadvideo','ProfileController@uploadvideo')->name('profile.uploadvideo');
Route::post('/profile/uploadvideo','ProfileController@uploadvideopost');
Route::get('/profile/myvideos','ProfileController@myvideos')->name('profile.myvideos');

Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
Route::get('/dashboard/videos','DashboardController@videos')->name('dashboard.videos');
Route::get('/dashboard/videos/edit/{post}','DashboardController@videoedit')->name('dashboard.video.edit');
Route::put('/dashboard/videos/edit/{post}/update','DashboardController@videoupdate')->name('dashboard.video.update');