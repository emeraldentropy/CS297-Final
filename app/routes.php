<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('register', 'RegisterController@showRegister');
Route::post('register', 'RegisterController@postRegister');
Route::get('logout', 'LoginController@logout');

Route::group(array('before'=>'auth'), function(){
Route::get('userHome', 'HomeController@showUserHome');

Route::get('friends', 'ProfileController@listProfiles');

Route::get('comment/users/{id}', 'ProfileController@newComment');
Route::post('comment/users/{id}', array('before'=>'csrf', 'uses' => 'ProfileController@addComment'));
Route::get('comment/{id}', 'ProfileController@showComment');
Route::put('comment/{id}', array('before'=>'csrf', 'uses' => 'ProfileController@putComment'));
Route::delete('comment/{id}', array('before'=>'csrf', 'uses' => 'ProfileController@deleteComment'));

Route::get('edit/users/{id}', 'ProfileController@editProfile'); 
Route::post('edit/users/{id}', array('before'=>'csrf', 'uses' => 'ProfileController@updateProfile'));

Route::get('users/{id}', 'ProfileController@viewProfile');
// Route::post('users/{id}', 'ProfileController@commentProfile');
//Route::get('upload/users/{id}', 'ImageController@profileImage');
Route::get('upload/users/{id}',array('as'=>'index_page','uses'=>'ImageController@getprofileImage'));
//This is for the post event of the index.page
Route::post('upload/users/{id}', array('before'=>'csrf', 'as'=>'index_page_post','uses'=>'ImageController@profileImage'));


Route::post('new', array('before'=>'csrf', 'uses' => 'PostController@addPost'));
Route::get('new', 'PostController@newPost');
Route::get('post/{id}', 'PostController@showPosts');
Route::put('post/{id}', array('before'=>'csrf', 'uses' => 'PostController@putPosts'));
Route::delete('post/{id}', array('before'=>'csrf', 'uses' => 'PostController@deletePosts'));

});