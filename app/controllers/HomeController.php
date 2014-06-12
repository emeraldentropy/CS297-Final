<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	*/

	public function showWelcome()
	{
		return View::make('home');
	}
	public function showUserHome(){
		$posts = Post::with('user')->
		orderBy('updated_at', 'desc')->paginate(12);
		return View::make('userHome')
		->with('posts',$posts)
		->with('i', 1);
	}

}
