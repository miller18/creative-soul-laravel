@extends('layouts/master')

@section('header')
<a href="{{'/students'}}">&larr; Cancel</a>
<h2>
    @if($method == 'post')
    Add a new student
    @elseif($method == 'delete')
    Delete {{ $student->first_name }} {{ $student->last_name }}?
    @else
    Edit {{ $student->first_name }} {{ $student->last_name }}
    @endif
</h2>
@stop

@section('content')

{{ Form::model($student, array('method' => $method, 'url' => 'students/'.$student->id, 'class' => 'form-horizontal')) }}

@unless($method == 'delete')

<div class="form-group">
    {{ Form::label('First Name', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('first_name', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('Last Name', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('Email', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('Phone Number', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
</div>


{{ Form::submit("Save", array("class"=>"btn btn-default")) }}

@else

{{ Form::submit("Delete", array("class"=>"btn btn-default")) }}

@endif

{{ Form::close() }}

@stop