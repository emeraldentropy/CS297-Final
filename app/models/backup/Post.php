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
 //possible removal


}