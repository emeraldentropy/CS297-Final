@extends('layouts.master')

@section('title')
@parent
:: User
@stop

@section('content')

@if (Auth::user()->id == $profile->id)
	<h1>Hello {{$profile->first_name . " " . $profile->last_name}}!</h1>
	<a href="{{{ URL::to('edit_profile') }}}">Edit Profile</a>

@else
<h1>{{$profile->first_name . " " . $profile->last_name}}</h1>
@endif


<h2>Add New Post</h2>
{{Form::open(array('class'=>'form-horizontal'))}}

{{ Form::hidden($profile->profile_id, $profile->user_id) }}


<!-- Comment -->
<div class="control-group {{{ $errors->has('text') ? 'error' : '' }}}">
	{{ Form::label('text', 'Comment', array('class' => 'control-label')) }}</p>
	<div class="controls">
		{{Form::textarea('text', Input::old('text'))}}
		{{ $errors->first('text') }}
	</div>
</div>

<!-- Submit button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Comment', array('class' => 'btn')) }}
		</div>
	</div>

{{ Form::close() }}
@foreach($comments as $comment)
  <hr>
  <div class="row">
    <div class="col-md-12">
 
    {{$comment->user_id}}
 
    <p>{{{$comment->text}}}</p>
    </div>
  </div>
@endforeach
@stop