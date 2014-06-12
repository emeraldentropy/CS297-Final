<?php

class RegisterController extends BaseController {
public function showRegister(){
	if(Auth::check()){
		return Redirect::to('secret')->with('success', 'you are currently logged in');
	} else
	return View::make('auth/register');
}
public function postRegister(){
	//get user input
	$userdata = array(
		'first_name' => Input::get('first_name'),
		'last_name' => Input::get('last_name'),
		'email'	=> Input::get('email'),
		'password' => Input::get('password'),
		'password_confimation' => Input::get('password_confimation')
		);
	//rules for validation
	$rules = array(
		'first_name' => 'Required',
		'last_name' => 'Required',
		'email'	=> 'Required',
		'password' => 'Required|Confirmed',
		'password' => 'Required'
		);
	$validator = Validator::make($userdata, $rules);

	if($validator->passes()){
		User::create(array(
		'first_name' => Input::get('first_name'),
		'last_name' => Input::get('last_name'),
		'email'	=> Input::get('email'),
		'password' => Hash::make(Input::get('password'))
			));
		if(Auth::attempt($userdata)){
		return Redirect::to('secret')->with('success', 'You have successfully registered');
		}
	}else{
		return Redirect::to('register')->withErrors($validator)->withInput(
			Input::except('password'))->with('error', 'please correct the 
			information below.');
	}

	}

}