<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('comment/like/{id}', ['as' => 'comment.like', 'uses' => 'LikeController@likeComment'])->middleware('auth');
Route::post('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost'])->middleware('auth');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/post/{id}', 'PostController@show');
Route::post('/post', 'PostController@store')->middleware('auth');
Route::put('/post/{post}', 'PostController@update');
Route::delete('/post/{id}', 'PostController@destroy');

Route::middleware(['admin'])->prefix('dashboard')->group(function () {
    Route::get('/users', 'UserController@index');
    Route::get('/tags', 'TagController@dashboardIndex');
    Route::get('/suggestions', 'TagSuggestionController@index');
});

Route::delete('/tag/{tag}', 'TagController@destroy')->middleware('admin');
Route::get('/tags', 'TagController@index');
Route::post('/tag', 'TagController@store')->middleware('admin');
Route::put('/tag/{tag}', 'TagController@update')->middleware('admin');

Route::delete('/tag-suggestion/{tagSuggestion}', 'TagSuggestionController@destroy')->middleware('admin');
Route::post('/tag-suggestion', 'TagSuggestionController@store');
Route::post('/tag-suggestion/status/{tagSuggestion}', 'TagSuggestionController@status')->middleware('admin');

Route::post('/comment', 'CommentController@store')->middleware('auth');

Route::delete('/user/{user}', 'UserController@destroy')->middleware('admin');
Route::put('/user/{user}', 'UserController@updateDashboard')->middleware('admin');
Route::get('/users', 'UserController@index')->middleware('admin');
Route::post('/user', 'UserController@store')->middleware('admin');
Route::post('/user/status/{user}', 'UserController@status')->middleware('admin');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/update/{id}', 'UserController@update')->middleware('auth');

//Follow
Route::post('/user/follow/{id}', 'FollowController@follow')->middleware('auth');
Route::post('/user/unfollow/{id}', 'FollowController@unfollow')->middleware('auth');

Auth::routes(); //LOGIN AND REGISTER

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/documentation', function () {
    return view('docs.layout');
});

Route::get('/profile/{id}', 'UserController@index');


//Login with providers

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
//Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');