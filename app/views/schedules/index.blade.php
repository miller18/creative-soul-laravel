@extends('layouts/master')

@section('header')
	
	@if(isset($instructor))
		{{ link_to('/', 'Back to the overview') }}
	@endif
	
	<h2>
		All @if(isset($instructor)) of {{$instructor->first_name}} {{$instructor->last_name}}'s @endif Schedules
		<a href="{{ url('schedules/create') }}" class="btn btn-primary pull-right">Add a new schedule</a>
	</h2>	

@stop

@section('content')
	
	<div class="schedule">
		<table>
			<thead>
				<tr>
					<th>Instructor</th>
					<th>Class Date</th>
					<th>Class Time</th>
					<th>Student</th>
					<th>Class Type</th>
					<th>Class Duration</th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>

			@foreach($schedules as $schedule)

				<tr>
					<td>
						<a href="{{ url('schedules/instructors/'.$schedule->instructor->id) }}">
							<strong>
								{{{ $schedule->instructor->first_name }}} {{{ $schedule->instructor->last_name }}}
							</strong>
						</a>
					</td>
					<td>{{{ $schedule->class_time }}}</td>
					<td>{{{ $schedule->class_time }}}</td>
					<td>{{{ $schedule->student->first_name }}} {{{ $schedule->student->last_name }}}</td>
					<td>{{{ $schedule->class_type }}}</td>
					<td>{{{ $schedule->class_duration }}}</td>
					@if(Auth::check() and Auth::user()->canEdit($schedule))
					<td>
						<a href="{{url('schedules/'.$schedule->id.'/edit')}}">
						<span class="glyphicon glyphicon-edit"></span> Edit</a>
					</td>
					<td>
						<a href="{{url('schedules/'.$schedule->id.'/delete')}}">
						<span class="glyphicon glyphicon-trash"></span> Delete</a>
					</td>
					@else
					<td></td>
					<td></td>
					@endif
				</tr>

			@endforeach

			</tbody>

		</table>

	</div>	
	@if(isset($instructor))
	<div class="totals">
		<table>
			<thead>
				<tr>
					<th>Total Hours</th>
					<th>Payable Hours</th>
					<th>Private</th>
					<th>Band</th>
					<th>Demo</th>
					<th>Substitutions</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{{ $schedule
							->where('instructor_id', '=', $schedule->instructor->id)
							->sum('class_duration') }}}</td>
					<td>{{{ $schedule
							->where('instructor_id', '=', $schedule->instructor->id)
							->where('class_type', '<>', 'demo')
							->sum('class_duration') }}}</td>
					<td>{{{ $schedule
							->where('instructor_id', '=', $schedule->instructor->id)
							->where('class_type', '=', 'private')
							->sum('class_duration') }}}</td>
					<td>{{{ $schedule
							->where('instructor_id', '=', $schedule->instructor->id)
							->where('class_type', '=', 'band')
							->sum('class_duration') }}}</td>
					<td>{{{ $schedule
							->where('instructor_id', '=', $schedule->instructor->id)
							->where('class_type', '=', 'demo')
							->sum('class_duration') }}}</td>
					<td>{{{ $schedule
							->where('instructor_id', '=', $schedule->instructor->id)
							->where('class_type', '=', 'sub')
							->sum('class_duration') }}}</td>							
				</tr>
			</tbody>
		</table>
	</div>
	@endif

@stop
