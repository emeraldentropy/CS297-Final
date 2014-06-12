<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = array('first_name', 'last_name', 'email',
		'password', 'image', 'about', 'phone', 'city', 'state');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function posts(){
		return $this->hasMany('Post');
	}
	public function comments(){//was reviews()
		return $this->hasMany('Comment');
	}
	public function ownsPost(Post $post){
		return $this->id == $post->post_author;
	}
	public function canEditPost(Post $post){
		return $this->is_admin or $this->ownsPost($post);
	}

	public function ownsComment(Comment $comment){
		return $this->id == $comment->user_id;
	}
	public function canEditComment(Comment $comment){
		return $this->is_admin or $this->ownsComment($comment);
	}
	public function photo(){
		return $this->hasMany('Photo');
	}
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
