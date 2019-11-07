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

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/post/{id}', 'PostController@show');
Route::post('/post', 'PostController@store');

Route::put('/post/{id}', 'PostController@update');
Route::delete('/post/{id}', 'PostController@destroy');

Route::post('/comment', 'CommentController@store')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
