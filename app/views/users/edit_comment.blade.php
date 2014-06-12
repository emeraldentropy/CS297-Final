@extends('layouts.master')

@section('title')
@parent
:: User
@stop

@section('content')

<div>
<h2>Edit Comment</h2>
<hr>
<!-- Delete Comment -->
{{Form::model($comment, array('method' => 'delete', 'url'=>'comment/' . $comment->id))}}
<p>{{Form::submit('Delete Comment', array('class' => 'btn'))}}</p>
{{Form::close()}}

{{Form::open(array('url' => 'comment/'.$comment->id,'method'=>'put', 'class'=>'form-horizontal'))}}

{{ Form::hidden('user_id', $user->id) }}

<!-- Post Body -->
<div class="control-group {{{ $errors->has('post_body') ? 'error' : '' }}}">
    {{ Form::label('text', 'Text', array('class' => 'control-label')) }}</p>
    <div class="controls">
        {{Form::textarea('text', (Input::old('text') ? Input::old('text') : $comment->text))}}
        {{ $errors->first('text') }}
    </div>
</div>

<!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Save', array('class' => 'btn')) }}
        </div>
    </div>
{{ Form::close() }}
</div>
@stop