<?php

class LoginController extends BaseController {

public function showLogin(){
	if(Auth::check())
		return Redirect::to('userHome')->with("success","you are already logged in");

	return View::make('auth.login');
}

public function postLogin(){
$userdata = array(
	'email'		=>	Input::get('email'),
	'password'	=>	Input::get('password')
	);
$rules = array(
	'email'		=>	'Required',
	'password'	=>	'Required'
);
$name = Input::get('email');

$validator = Validator::make($userdata, $rules);

if ($validator->passes()){
	if(Auth::attempt($userdata)){
		return Redirect::intended('users/' . Auth::user()->id)->with('success', 'You are now loggedin');
	}
	else{
	return Redirect::to('login')->withInput(Input::except('password'))->with(
		'error', 'The username or password is incorrect');
	}
}
else{
		return Redirect::to('login')->withErrors($validator)->withInput(
			Input::except('password'))->with('error', 'All fields are required');
	}
}

public function logout(){
	Auth::logout();
	return Redirect::to('/')->with('success', 'You have successfully logged out');
}
}
