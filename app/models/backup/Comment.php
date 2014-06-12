<?php


class Comment extends Eloquent
{
  protected $table = "comments";
  protected $fillable = array('text', 'profile_id', 'user_id');

  public function user()
  {
    //user that created it
    return $this->belongsTo('User', 'user_id');
  }
  public function profile() {
 	return $this->belongsTo('User', 'profile_id');
  }

public function storeCommentForUser($profileID, $text)
{
  $profile = User::find($profileID);
 
  // this will be added when we add user's login functionality
  $this->user_id = Auth::user()->id;
 $this->profile_id = User::find($profileID);
  $this->text = $text;
  $profile->comments()->save($this);

}
}