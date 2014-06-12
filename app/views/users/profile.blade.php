@extends('layouts.master')

@section('title')
@parent
:: User
@stop

@section('content')
<h1>Welcome {{Auth::User()->first_name}}</h1>

<p>First Name: {{Auth::User()->first_name}}</p>
<p>Email: {{{Auth::User()->email}}}</p>
@stop