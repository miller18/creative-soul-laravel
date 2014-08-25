@extends('layouts/master')

@section('header')
<h2>Please log in</h2>
@stop

@section('content')
{{ Form::open() }}

<div class="form-group">
	{{ Form::label('Username') }}
	{{ Form::text('username') }}
</div>

<div class="form-group">
	{{ Form::label('Password') }}
	{{ Form::password('password') }}
</div>

{{ Form::submit() }}
{{ Form::close() }}

@stop