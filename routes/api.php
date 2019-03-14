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

//Route::middleware('auth:api')->get('/user/{user}', function (Request $request) {
//    echo json_encode(\App\User::find($user));
//    return $request->user();
//});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'ApiController@login');
    Route::post('signup', 'ApiController@init_signup');
    Route::post('signup/finalize', 'ApiController@final_signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'ApiController@logout');
        Route::get('user/{user}', 'ApiController@detailofuser');
        Route::get('posts/{post}','ApiController@showpost');
        Route::get('posts','ApiController@getposts');
        Route::get('posts/{post}/comments','ApiController@getallcomments');
        Route::post('posts/sendcomment','ApiController@sendcomment');
        Route::post('posts/sendrate','ApiController@sendrate');
        Route::post('posts/uploadvideo','ApiController@uploadvideo');
    });
});
