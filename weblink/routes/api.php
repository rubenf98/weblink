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
Route::get('/tags', 'TagController@indexAPI');
Route::get('/tag/{tag}', 'TagController@show');
Route::get('/users', 'UserController@index');

Route::prefix('stats')->group(function () {
    Route::prefix('tags')->group(function () {
        Route::get('/', 'TagController@common');
        Route::post('update-clicks/{tag}', 'TagController@updateClicks');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
