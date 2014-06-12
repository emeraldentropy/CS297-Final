<?php


class Comment extends Eloquent{
  protected $table = "comments";
  protected $fillable = array('text', 'profile_id', 'user_id');

  public function user(){
  //user that created it
    return $this->belongsTo('User', 'user_id');
  }
  public function profile() {
   return $this->belongsTo('User', 'profile_id');
 }

  public function storeCommentForUser($profileID, $text, $userID){
    $profile = User::find($profileID);
    $this->user_id = $userID;
    $this->profile_id = $profileID;
    $this->text = $text;
    $profile->comments()->save($this);

  }
}