@extends('layouts/master')

@section('header')
	<a href="">&larr; Cancel</a>
	<h2>
		@if($method == 'post')
		  	Add a new schedule
		@elseif($method == 'delete')
			Delete {{ $schedule->class_time }} for {{{ $schedule->instructor->first_name }}}?
		@else
			Edit {{ $schedule->class_time }} for {{{ $schedule->instructor->first_name }}}
		@endif		  
	</h2>
@stop

@section('content')
	
	{{ Form::model($schedule, array('method' => $method, 'url' => 'schedules/'.$schedule->id, 'class' => 'form-horizontal')) }}

	@unless($method == 'delete')

		<div class="form-group">
			{{ Form::label('Class Time', null, array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('class_time', null, array('class' => 'form-control')) }}
			</div>	
		</div>


		<div class="form-group">
			{{ Form::label('Class Type', null, array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('class_type', null, array('class' => 'form-control')) }}
			</div>	
		</div>	

		<div class="form-group">
			{{ Form::label('Student', null, array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
			{{ Form::select('student_id', $student_options, null, array('class' => 'form-control')) }}
			</div>
		</div>	

		<div class="form-group">
			{{ Form::label('Class Duration', null, array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('class_duration', null, array('class' => 'form-control')) }}
			</div>	
		</div>	
		
		<div class="form-group">
			{{ Form::label('Instructor', null, array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
			{{ Form::select('instructor_id', $instructor_options, null, array('class' => 'form-control')) }}
			</div>
		</div>	
					
		
		{{ Form::submit("Save", array("class"=>"btn btn-default")) }}

	@else

		{{ Form::submit("Delete", array("class"=>"btn btn-default")) }}

	@endif

	{{ Form::close() }}

@stop
