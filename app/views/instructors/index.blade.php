@extends('layouts/master')

@section('header')
	
	@if(isset($instructor))
		{{ link_to('/instructors', 'Back to the overview') }}
	@endif
	
	<h2>
		All Instructors
		<a href="{{ url('instructors/create') }}" class="btn btn-primary pull-right">Add a new instructor</a>
	</h2>	

@stop

@section('content')
	
	<div class="instructors">
		<table>
			<thead>
				<tr>
					<th>Instructor</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>

			@foreach($instructors as $instructor)

				<tr>
					<td>
						<a href="#">
							<strong>
								{{{ $instructor->first_name }}} {{{ $instructor->last_name }}}
							</strong>
						</a>
					</td>
					<td>{{{ $instructor->email }}}</td>
					<td>{{{ $instructor->phone }}}</td>
					<td>
						<a href="#">Schedules</a>
					</td>
					<td>
						<a href="#">Students</a>
					</td>
					<td>
						<a href="{{url('instructors/'.$instructor->id.'/edit')}}">
						<span class="glyphicon glyphicon-edit"></span> Edit</a>
					</td>
					
				</tr>

			@endforeach

			</tbody>

		</table>

	</div>	

	

@stop
