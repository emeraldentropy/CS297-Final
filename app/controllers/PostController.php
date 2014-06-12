<?php

class PostController extends BaseController {

	public function newPost(){
		$user = Auth::user();
		return View::make('new')
		->with('user', $user);
	}

	public function addPost(){
		$validation = Post::validate(Input::all());

		if ($validation -> fails()){
			return Redirect::to('new')
			->with('user', Auth::user())
			->withErrors($validation)
			->withInput();
		}
// create the new post after passing validation
		$post = Post::create(Input::all());
		$post->save();
		return Redirect::to('userHome');
	}

	public function showPosts($id){
		$user = Auth::user();
		$view_post = Post::find($id);
		return View::make('edit')
		->with('user', $user)
		->with('post', $view_post);
	}


	public function putPosts($id){

		$validation = Post::validate(Input::all());
		if($validation->fails()){

			return Redirect::to('post/'.$id)
			->with('user', Auth::user())
			->withErrors($validation)
			->withInput();
		}
// save the post after passing validation
		$post = Post::find($id);
		$post->update(Input::all());
// redirect to viewing all posts
		return Redirect::to('userHome')->with('success', "message Edited");
	}

	public function deletePosts($id){
		$delete_post = Post::with('user')->find($id);
		$delete_post -> delete();
		return Redirect::to('userHome')
		->with('success', 'Success! Post deleted');
	}
}
