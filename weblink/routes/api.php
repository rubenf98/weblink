<?php

use Illuminate\Http\Request;

Route::get('/tags', 'TagController@indexAPI');
Route::post('/tag', 'TagController@storeAPI');
Route::get('/tag/{tag}', 'TagController@show');
Route::delete('/tag/{tag}', 'TagController@destroy');
Route::put('/tag/{tag}', 'TagController@updateAPI');

Route::get('/users', 'UserController@index');
Route::get('/user/{user}', 'UserController@showAPI');

Route::get('/posts', 'PostController@indexAPI');
Route::get('/post/{post}', 'PostController@showAPI');

Route::prefix('stats')->group(function () {
    Route::prefix('tags')->group(function () {
        Route::get('/', 'TagController@common');
        Route::post('update-clicks/{tag}', 'TagController@updateClicks');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
