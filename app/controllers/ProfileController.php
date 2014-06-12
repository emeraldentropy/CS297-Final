<?php

class ProfileController extends BaseController {

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
	public function listProfiles()
	{
	$users = User::all();
	return View::make('users/index')->with('users', $users);
	}

	public function newComment($id){
		$user = Auth::user();
		$profile = User::find($id);
		return View::make('users/'.'new_comment')
		->with('user', $user)
		->with('profile', $profile);
	}

	public function addComment($id){
		$profile = User::find($id);
		$user = Auth::user();

		$new_comment = array(
			'text' => Input::get('text'),
			'user_id' => Input::get('user_id'),
			'profile_id' => $profile->id
		);
		
		$comment = Comment::create($new_comment);

		$comment->save();

		return Redirect::to('users/'.$id)->with('success', 'Posted Review!!');
	}

	public function showComment($id){
		$user = Auth::user();
		$comment = Comment::find($id);
		return View::make('users/edit_comment')->with('user', $user)->with('comment', $comment);
	}
	public function putComment($id){
		$edit_comment = array(
			'text' => Input::get('text')
			);
		$rules = array(
			'text' => 'required|min:1'
		);
		$validation = Validator::make($edit_comment, $rules);
		if ( $validation -> fails() ) {
        
        	return Redirect::to('comment/'.$id)
                ->with('user', Auth::user())
                ->withErrors($validation)
                ->withInput();
    	}
    // save the post after passing validation
    $comment = Comment::find($id);
    $comment->update(Input::all());
    $profile = $comment->profile_id;
    // redirect to viewing all posts
    return Redirect::to('users/'. $profile)->with('success', "message Edited");
	}
	
	public function deleteComment($id){
		$comment = Comment::with('user')->find($id);
		$comment -> delete();
		$profile = $comment->profile_id;
		return Redirect::to('users/'. $profile)
		->with('success', 'Success! Comment deleted');
	}

	public function viewProfile($id){
		 $profile = User::find($id);

 		 // $comments = $profile->comments()->with('user')
 		 // ->orderBy('created_at','desc')->paginate(100);
 		 $comments = Comment::where('profile_id', '=', $id)
 		 ->orderBy('created_at','desc')->paginate(100);
 		 $image = $profile->image;
 		 return View::make('users.single', array(
 		 	'profile'=>$profile, 'comments'=>$comments, 'image'=>$image));
	}
	public function editProfile($id){
		$user = User::find($id);
		return View::make('users.edituser')->with('user', $user);
	}

	public function updateProfile($id){
		$user = User::find($id);
		$user->update(Input::all());
		return Redirect::to('users/' . $id)->with('success', 'profile updated!');
	}
}
