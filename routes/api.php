<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'ApiController@login');
    Route::post('signup', 'ApiController@init_signup');
    Route::post('signup/finalize', 'ApiController@final_signup');
    Route::post('forgetpassword/init','ApiController@init_forget');
    Route::post('forgetpassword/final','ApiController@final_forget');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'ApiController@logout');
        Route::get('user/{user}', 'ApiController@detailofuser');
        Route::get('user/details/auth', 'ApiController@detailofmine');
        Route::post('user/details/auth','ApiController@update_user_info');
        Route::get('posts/{post}','ApiController@showpost');
        Route::get('posts','ApiController@getposts');
        Route::get('posts/{post}/comments','ApiController@getallcomments');
        Route::get('posts/videos/get','ApiController@latestvideos');
        Route::post('posts/sendcomment','ApiController@sendcomment');
        Route::post('posts/sendrate','ApiController@sendrate');
        Route::post('posts/uploadvideo','ApiController@uploadvideo');
    });
});
