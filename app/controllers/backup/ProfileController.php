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

	public function viewProfile($id){
		 $profile = User::find($id);
		 
 		 $comments = $profile->comments()->with('profile')->orderBy('created_at','desc')->paginate(100); 
 		 return View::make('users.single', array('profile'=>$profile, 'comments'=>$comments));
	}

	public function commentProfile($id){
		   $input = array(
  'user_id' =>Input::get('user_id'),
  'profile_id'=>Input::get('profile_id'),
  'text' => Input::get('text')
  );
  // instantiate Rating model
  $comment = new Comment;

  $comment->storeCommentForUser($id, $input['text']);
  return Redirect::to('users/'.$id.'#reviews-anchor')->with('success', 'Posted Review!!');
	}

}
