<?php

class PostController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function newPost()
	{
	$user = Auth::user();
	return View::make('new')->with('user', $user);
	}

	public function addPost()
	{
		$new_post = array(
	'post_title' => Input::get('post_title'),
	'post_body' => Input::get('post_body'),
	'post_author' => Input::get('post_author')
	);

	$rules = array(
	'post_title' => 'required|min:3|max:255',
	'post_body' => 'required|min:10'
	);

	$validation = Validator::make($new_post, $rules);
	if ( $validation -> fails() )
	{

	return Redirect::to('admin')
	->with('user', Auth::user())
	->withErrors($validation)
	->withInput();
	}
	// create the new post after passing validation
	$post = Post::create($new_post);
	//$post->author_id = Auth::user()->id;
	$post->save();
	// redirect to viewing all posts
	return Redirect::to('secret');
	}

	public function showPosts($id)
	{

    $user = Auth::user();
    $view_post = Post::find($id);
    return View::make('edit')
            ->with('user', $user)
            ->with('post', $view_post);
	}


	public function putPosts($id)
	{
	$post_title = Input::get('post_title');
    $post_body = Input::get('post_body');
    $post_author = Input::get('post_author');
    $edit_post = array(
        'post_title'    => $post_title,
        'post_body'     => $post_body,
        'post_author'   => $post_author
    );
   
    $rules = array(
        'post_title'     => 'required|min:3|max:255',
        'post_body'      => 'required|min:10'
    );
    
    $validation = Validator::make($edit_post, $rules);
    if ( $validation -> fails() )
    {
        
        return Redirect::to('post/'.$id)
                ->with('user', Auth::user())
                ->withErrors($validation)
                ->withInput();
    }
    // save the post after passing validation
    $post = Post::find($id);
    $post->update(Input::all());
    // redirect to viewing all posts
    return Redirect::to('secret')->with('success', "message Edited");
	}
	
	public function deletePosts($id)
	{
		$delete_post = Post::with('user')->find($id);
	$delete_post -> delete();
	return Redirect::to('secret')
	->with('success', 'Success! Post deleted');
	}
}
