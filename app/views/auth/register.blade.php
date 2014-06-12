@extends('layouts.master')

@section('title')
@parent
-- Register
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h2>Register your account</h2>
</div>
{{ Form::open(array('url' => 'register', 'class' => 'form-horizontal')) }}
	<!--First Name-->
	<div class="control-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
		{{ Form::label('first_name', 'First Name', array('class' => 'control-label')) }}
	
		<div class="controls">
			{{ Form::text('first_name', Input::old('first_name')) }}
			{{ $errors->first('first_name') }}
		</div>
	</div>
	<!-- Last Name -->
	<div class="control-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
		{{ Form::label('last_name', 'Last Name', array('class' => 'control-label')) }}
	
		<div class="controls">
			{{ Form::text('last_name', Input::old('last_name')) }}
			{{ $errors->first('last_name') }}
		</div>
	</div>

	<!-- Email -->
	<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
		{{ Form::label('email', 'E-Mail', array('class' => 'control-label')) }}
	
		<div class="controls">
			{{ Form::text('email', Input::old('email')) }}
			{{ $errors->first('email') }}
		</div>
	</div>

	<!-- Password -->
	<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
		{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
		
		<div class="controls">
			{{ Form::password('password') }}
			{{ $errors->first('password') }}
		</div>
	</div>
	<!-- Password Confirmation-->
	<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
		{{ Form::label('password_confirm', 'Password', array('class' => 'control-label')) }}
		
		<div class="controls">
			{{ Form::password('password_confirmation') }}
			{{ $errors->first('password_confirmation') }}
		</div>
	</div>

	<!-- Login button -->
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Register', array('class' => 'btn')) }}
		</div>
	</div>
	
{{ Form::close() }}
@stop
