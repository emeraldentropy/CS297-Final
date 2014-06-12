<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::model('user', 'User');
Route::model('post', 'Post');

Route::get('home', 'HomeController@showWelcome');
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('register', 'RegisterController@showRegister');
Route::post('register', 'RegisterController@postRegister');
Route::get('logout', 'LoginController@logout');


Route::get('friends', 'ProfileController@listProfiles');
Route::get('users/{id}', 'ProfileController@viewProfile');
Route::post('users/{id}', 'ProfileController@commentProfile');


Route::post('admin', 'PostController@addPost');
Route::get('admin', 'PostController@newPost');
Route::get('post/{id}', 'PostController@showPosts');
Route::put('post/{id}', 'PostController@putPosts');
Route::delete('post/{id}', 'PostControler@deletePosts');


//secure
// Route::group(array('before' => 'auth'), function()
// {
	Route::get('secret', 'HomeController@showSecret');
	// Route::get('users/profile', 'UserController@showUser');
//});

//This is for the get event of the index page
Route::get('/',array('as'=>'index_page','uses'=>'ImageController@getIndex'));
//This is for the post event of the index.page
Route::post('/',array('as'=>'index_page_post','uses'=>'ImageController@postIndex'));

//This is to show the image's permalink on our website
Route::get('snatch/{id}', array('as'=>'get_image_information','uses'=>'ImageController@getSnatch'))
	->where('id', '[0-9]+');
