@extends('layouts.master')

@section('title')
@parent
- Family Home
@stop

@section('content')
<div class="row">
	<div class="col-sm-6 col-md-6 col-lg-6">
		<h1>Welcome {{Auth::user()->first_name . " " .Auth::user()->last_name}}!</h1>
		<p>--Post Your Family News, Thoughts, and Events Here :)</p>
	</div>
	<div class="col-sm-6 col-md-6 col-lg-6 instructions">
		<p>Here are the latest family posts. Share latest news, pictures, maps, or just what's on 
			your mind. Click the block to view the whole post :) </p>
			<button class="btn"><a href="{{{ URL::to('new') }}}">New Post</a></button>
		</div>
	</div>



	<div class="col-sm-10 col-md-10 col-lg-10 show-big">
		<img src="img/button_cancel.png" class="cancel">
		<div class="show-post"></div>

	</div>
	<div class="gray"></div>

	<div class="row">
		{{-- Display Posts --}}
		@foreach ($posts as $post)

		<div class="col-sm-6 col-md-4 col-lg-3 post-frame" id="frame{{$i}}">
			<h1>{{ $post->post_title }}</h1>
			<div class='body'>{{ $post->post_body }}</div>
			<?php
			$id = $post->post_author;
			$poster = User::find($id);
			?>
			<div class="fixed-bottom">
				<span>Posted by <a href="{{ URL::to('users/'. $id) }}">
					{{$poster->first_name}} {{$poster->last_name}}</a> 
					{{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}}</span>
					<div class="buttons">
						@if(Auth::check() and Auth::user()->canEditPost($post))
						<!-- Edit Post -->
						{{Form::model($post, array('method' => 'get', 'url'=>'post/' . $post->id))}}
						{{Form::submit('Edit Post', array('class' => 'btn'))}}
						{{Form::close()}}
						@endif
					</div>
				</div>
			</div>
			{{-- Increase Increment For ID --}}
			<?php
			$i += 1;
			?>
			@endforeach
		</div>

		<div>
			<div>
				{{ $posts -> links(); }}
			</div>
		</div>

		@stop