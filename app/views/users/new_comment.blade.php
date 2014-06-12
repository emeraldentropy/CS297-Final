@extends('layouts.master')

@section('title')
@parent
-- New Comment
@stop

@section('content')

<div>
<h2>Create new comment</h2>
<hr>
{{Form::open(array('class'=>'form-horizontal'))}}

{{ Form::hidden('user_id', $user->id) }}


<!-- Comment Body -->
<div class="control-group {{{ $errors->has('post_body') ? 'error' : '' }}}">
	{{ Form::label('text', 'Text', array('class' => 'control-label')) }}</p>
	<div class="controls">
		{{Form::textarea('text', Input::old('text'))}}
		{{ $errors->first('text') }}
	</div>
</div>

<!-- Comment button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Post Comment', array('class' => 'btn')) }}
		</div>
	</div>
{{ Form::close() }}
</div>
@stop