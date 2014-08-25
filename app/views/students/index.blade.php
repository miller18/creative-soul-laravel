@extends('layouts/master')

@section('header')
	
	@if(isset($student))
		{{ link_to('/students', 'Back to the overview') }}
	@endif
	
	<h2>
		All students
		<a href="{{ url('students/create') }}" class="btn btn-primary pull-right">Add a new student</a>
	</h2>	

@stop

@section('content')
	
	<div class="students">
		<table>
			<thead>
				<tr>
					<th>Student</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>

			@foreach($students as $student)

				<tr>
					<td>
						<a href="#">
							<strong>
								{{{ $student->first_name }}} {{{ $student->last_name }}}
							</strong>
						</a>
					</td>
					<td>{{{ $student->email }}}</td>
					<td>{{{ $student->phone }}}</td>
					<td>
						<a href="#">Classes</a>
					</td>
					
					<td>
						<a href="{{url('students/'.$student->id.'/edit')}}">
						<span class="glyphicon glyphicon-edit"></span> Edit</a>
					</td>
					
				</tr>

			@endforeach

			</tbody>

		</table>

	</div>	

	

@stop
