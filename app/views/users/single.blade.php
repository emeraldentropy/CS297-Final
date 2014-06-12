@extends('layouts.master')

@section('title')
@parent
-- Profile
@stop

@section('content')

@if (Auth::user()->id == $profile->id)
<h1>Hello {{{$profile->first_name . " " . $profile->last_name}}}!</h1>
@if ($profile->image == 'kumvton9default.jpg')
<a href="{{{ URL::to('upload/users/'. $profile->id) }}}" class="badge badge-success">Add Image</a>
@endif
<a href="{{{ URL::to('edit/users/'. $profile->id) }}}" class="badge badge-success">Edit Profile</a>
<br>

@else
<h1>{{{$profile->first_name . " " . $profile->last_name}}}</h1>
@endif


<div class="row">
  <div class="col-sm-12 col-md-5 col-lg-4">

    {{HTML::image(Config::get('image.thumb_folder').'/'.$image, 
    'profile_image', array('class'=>'profile_image'))}}

    <div>
      @if($profile->phone !== NULL)
      {{{'Phone Number: '. $profile->phone}}}
      @endif
    </div>
    <div>
      @if($profile->city !== NULL && $profile->state !== NULL)
      {{{$profile->city.", " . $profile->state}}}
      @elseif($profile->city !== NULL)
      {{{$profile->city}}}
      @elseif($profile->state !== NULL)
      {{{$profile->state}}}
      @endif
    </div>
  </div>

  @if($profile->about !== NULL)
  <div class="col-sm-12 col-md-7 col-lg-8 about">
    <h3>About Me</h3>
    <hr>
    {{{$profile->about}}}
  </div>
  @endif
</div>

<a href="{{{ URL::to('comment/users/'. $profile->id) }}}">Add Comment</a>


<div class="row">
  <h3 class="col-sm-12 col-md-6 col-lg-6 row">Comments</h3>
  @foreach($comments as $comment)
  <?php
  $user = $comment->user_id;
  $commenter = User::find($user);
  ?>

  <div class="col-lg-12 col-md-12 col-sm-12 row">
    <div>
      <a href="{{ URL::to('users/'. $user) }}"><h4>{{{$commenter->first_name ." ".$commenter->last_name }}}</h4>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        {{HTML::image(Config::get('image.thumb_folder').'/'.$commenter->image, 
        'profile-img', array('class'=>'col-sm-12 col-md-3 col-lg-3 xsmall-img'))}}</a>
        <p class="col-sm-12 col-md-6 col-lg-6 comment-text">{{{$comment->text}}}</p>
        <br>         

      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 row comment-btns">
        <p class="badge badge-success">Posted 
          {{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}}</p>
          @if(Auth::check() and Auth::user()->canEditComment($comment))

          <!-- Edit Comment -->

          {{Form::model($comment, array('method' => 'get', 'url'=>'comment/' . $comment->id))}}
          {{Form::submit('Edit Comment', array('class' => 'btn'))}}
          {{Form::close()}}

          @endif
          @if (Auth::user()->id == $profile->id)
          <!-- Delete Comment -->
          {{Form::model($comment, array('method' => 'delete', 'url'=>'comment/' . $comment->id))}}
          {{Form::submit('Delete Comment', array('class' => 'btn'))}}
          {{Form::close()}}
          @endif
        </div>
        <hr>
      </div>

      @endforeach
    </div>
    <br>
    @stop


