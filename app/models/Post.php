<?php
 
class Post extends Eloquent
{
  protected $table = "posts";
  protected $fillable = array('post_title', 'post_body', 'post_author');
  public function user()
  {
    //user that created it
    return $this->belongsTo('User', 'post_author');
  }
 public static function validate($input) {
    $rules = array(
		'post_title' => 'required|min:3|max:255',
		'post_body' => 'required|min:10'
	);
     return Validator::make($input, $rules);
  }


}