@extends('layouts.master')

@section('title')
@parent
:: Register
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h2>Update Profile</h2>
</div>
<a href="{{{ URL::to('upload/users/'. $user->id) }}}">Change Image</a>
{{ Form::open(array('url' => 'edit/users/'.$user->id, 
                    'class' => 'form-horizontal')) }}
<h3>Basic Information</h3>
    <!--First Name-->
    <div class="control-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
        {{ Form::label('first_name', 'First Name', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::text('first_name', (Input::old('first_name') ? Input::old('first_name') : $user->first_name)) }}
            {{ $errors->first('first_name') }}
        </div>
    </div>
    <!-- Last Name -->
    <div class="control-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
        {{ Form::label('last_name', 'Last Name', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::text('last_name', (Input::old('last_name') ? Input::old('last_name') : $user->last_name)) }}
            {{ $errors->first('last_name') }}
        </div>
    </div>

    <!-- Email -->
    <div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
        {{ Form::label('email', 'E-Mail', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::text('email', (Input::old('email') ? Input::old('email') : $user->email)) }}
            {{ $errors->first('email') }}
        </div>
    </div>

    <!-- About -->
    <div class="control-group {{{ $errors->has('about') ? 'error' : '' }}}">
        {{ Form::label('about', 'About You', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::textarea('about', (Input::old('about') ? Input::old('about') : $user->about)) }}
            {{ $errors->first('about') }}
        </div>
    </div>

    <h3>Address</h3>
    <!-- Phone Number -->
    <div class="control-group {{{ $errors->has('phone') ? 'error' : '' }}}">
        {{ Form::label('phone', 'Phone Number', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::text('phone', (Input::old('phone') ? Input::old('phone') : $user->phone)) }}
            {{ $errors->first('phone') }}
        </div>
    </div>

    <!-- city -->
    <div class="control-group {{{ $errors->has('city') ? 'error' : '' }}}">
        {{ Form::label('city', 'City', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::text('city', (Input::old('city') ? Input::old('city') : $user->city)) }}
            {{ $errors->first('city') }}
        </div>
    </div>

<!-- state -->
    <div class="control-group {{{ $errors->has('state') ? 'error' : '' }}}">
        {{ Form::label('state', 'State', array('class' => 'control-label')) }}
    
        <div class="controls">
            {{ Form::text('state', (Input::old('state') ? Input::old('state') : $user->state)) }}
            {{ $errors->first('state') }}
        </div>
    </div>
    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
    
{{ Form::close() }}
@stop
