@extends('layouts.master')

@section('title')
@parent
- Family
@stop

@section('content')
<h1>Family Profiles</h1>
@foreach($users as $user)
<div>
	<a href="{{url('users/' . $user->id)}}">
		{{HTML::image(Config::get('image.thumb_folder').'/'.$user->image, 
		'profile-image', array('class' => 'medium-img'))}}
		<strong> {{$user->first_name . " " . $user->last_name}}</strong>
	</a>
</div>
@endforeach
@stop