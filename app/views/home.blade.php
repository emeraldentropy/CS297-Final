@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<h1>Welcome to Family Connection!</h1>
<p>Please log in or register.</p>
<button class="btn">{{ HTML::link('login', 'Login') }}</button>
<button class="btn">{{ HTML::link('register', 'Register') }}</button>
@stop