<?php

class Photo extends Eloquent
{
	protected $table = "pics";
	protected $fillable = array('user_id','location', 'image');

	// public function user(){
	// 	return $this->belongsTo('User');
	// }
	//rules of the image upload form
	public static $upload_rules = array(
	'image'=> 'required',
	);
}