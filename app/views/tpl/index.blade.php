@extends('layouts.master')

@section('title')
@parent
:: Upload
@stop

@section('content')
{{Form::open(array('files' => true))}}

{{Form::file('image')}}
{{Form::submit('save!',array('name'=>'send'))}}
{{Form::close()}}

@stop