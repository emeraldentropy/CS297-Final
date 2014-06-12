@extends('layouts.master')

@section('title')
@parent
-- Create Post
@stop

@section('content')

<div class="row">
	<div class="col-sm-5 col-md-5 col-lg-5 controls">
		<h2>Create Post</h2>
	</div>
	<div class="col-sm-7 col-md-7 col-lg-7 instructions">
		<p>Share your thoughts, images, or post details about events.
			<ul>
				<li>Click {{ HTML::image('ckeditor/plugins/leaflet/icons/leaflet.png') }}
					to add a map.</li>
					<li>To upload an image click {{ HTML::image('ckeditor/plugins/image/icons/image.png') }}
						and select the upload tab.</li>
						<li>Need Help using the text editor? {{ HTML::link('http://docs.cksource.com/CKEditor_3.x/Users_Guide', 
							'View The text editor users guide', array('target' => '_blank')) }}.</li>
						</ul>  

					</div>
				</div>
				<hr>
				<!-- Add New Post Form-->
				{{Form::open(array('url' => 'new', 'method'=>'post', 'class'=>'form-horizontal'))}}

				{{ Form::hidden('post_author', $user->id) }}
				{{-- Post Title --}}
				<div class="control-group {{{ $errors->has('post_title') ? 'error' : '' }}}">
					{{ Form::label('post_title', 'Post Title', array('class' => 'control-label')) }}</p>
					<div class="controls">
						{{Form::text('post_title', Input::old('post_title'), array('class' => 'post-title'))}}
						{{ $errors->first('post_title') }}
					</div>
				</div>
				<div class="row post-body">
					{{-- Post Body --}}
					<div class="col-sm-12 col-md-10 col-lg-10 control-group {{{ $errors->has('post_body') ? 'error' : '' }}}">
						{{ Form::label('post_body', 'Post Body', array('class' => 'control-label')) }}</p>
						<div class="controls">
							{{ Form::textarea('post_body', Input::old('post_body'), array('id' => 'richtext'))}}
							{{ $errors->first('post_body') }}
							<script>CKEDITOR.replace('richtext');</script>
						</div>
					</div>

					<!-- Login button -->
					<div class="control-group">
						<div class="controls">
							{{ Form::submit('Post', array('class' => 'col-sm-12 col-md-2 col-lg-2 btn ')) }}
						</div>
					</div>

					{{ Form::close() }}
				</div>

				@stop