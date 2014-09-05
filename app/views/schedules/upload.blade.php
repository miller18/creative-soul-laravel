@extends('layouts/master')

@section('header')
    @if(isset($instructor))
    {{ link_to('/', 'Back to the overview') }}
    @endif
@stop

@section('content')

<h1>File Upload</h1>

<a href="{{ url('schedules/test_upload') }}" class="btn btn-primary pull-right">Upload File</a>

<?php
/**
 * Path to the 'app' folder
 */
echo app_path() . '<br>';
/**
 * Path to the project's root folder
 */
echo base_path() . '<br>';
/**
 * Path to the 'public' folder
 */
echo public_path() . '<br>';
/**
 * Path to the 'app/storage' folder
 */
echo storage_path() . '<br>';
?>

@stop
