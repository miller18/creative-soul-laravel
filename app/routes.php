<?php

Route::model('schedule', 'Schedule');

View::composer('schedules.edit', function($view)
{
	$instructors = Instructor::all();
	
	if(count($instructors) > 0){
		$instructor_options = array_combine($instructors->lists('id'), $instructors->lists('first_name'));
	} else {
		$instructor_options = array(null, 'Unspecified');
	}

	$view->with('instructor_options', $instructor_options);
});

View::composer('schedules.edit', function($view)
{
	$students = Student::all();
	
	if(count($students) > 0){
		$student_options = array_combine($students->lists('id'), $students->lists('first_name'));
	} else {
		$student_options = array(null, 'Unspecified');
	}

	$view->with('student_options', $student_options);
});

Route::get('/', function()
{
	return Redirect::to('schedules');
	// return app()->env;
});

Route::get('schedules', function()
{
	$schedules = Schedule::all();
	return View::make('schedules.index')->with('schedules', $schedules);
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('schedules/create', function()
	{
		$schedule = new Schedule;
		return View::make('schedules.edit')->with('schedule', $schedule)->with('method', 'post');
	});

	Route::post('schedules', function()
	{
		$rules = array(
			// 'class_date' => 'required',
			'class_time' => 'required',
			'class_type' => 'required',
			'student_id' => 'required',
			'instructor_id' => 'required',
			'class_duration' => 'required',
		);

		$validation_result = Validator::make(Input::all(), $rules);

		if($validation_result->fails()){

			// echo "help";
			// print_r($validation_result->messages());
			return Redirect::back()
				->with('messages', $validation_result->messages());

		} else {

			$schedule = Schedule::create(Input::all());
			$schedule->user_id = Auth::user()->id;
			if($schedule->save()) {
				return Redirect::to('schedules')->with('message', 'Successfully create schedule!');	
			} else {
				return Redirect::back()
					->with('error', 'Could not create scheudle');
			}
		}
		
	});

});	

Route::get('schedules/{schedule}/edit', function(Schedule $schedule) 
{
	return View::make('schedules.edit')
		->with('schedule', $schedule)
		->with('method', 'put');
});

Route::get('schedules/{schedule}/delete', function(Schedule $schedule) 
{
	return View::make('schedules.edit')
		->with('schedule', $schedule)
		->with('method', 'delete');

});

Route::put('schedules/{schedule}', function(Schedule $schedule)
{
	if(Auth::user()->canEdit($schedule)) {
		$schedule->update(Input::all());
		return Redirect::to('schedules')->with('message', 'Successfully updated schedule!');
	}
});

Route::delete('schedules/{schedule}', function(Schedule $schedule)
{
	$schedule->delete();
	return Redirect::to('schedules')->with('message', 'Successfully deleted schedule!');
});


Route::get('schedules/instructors/{id}', function($id)
{
	$instructor = Instructor::whereId($id)->with('schedules')->first();
	return View::make('schedules.index')->with('instructor', $instructor)->with('schedules', $instructor->schedules);
});

Route::get('instructors', function()
{
	$instructors = Instructor::all();
	return View::make('instructors.index')->with('instructors', $instructors);
});

Route::get('students', function()
{
	$students = Student::all();
	return View::make('students.index')->with('students', $students);
});

Route::get('login', function()
{
	return View::make('users.login');
});

Route::post('login', function()
{
	if(Auth::attempt(Input::only('username', 'password'))) {
		return Redirect::intended('/');
	} else {
		return Redirect::back()
			->withInput()
			->with('error', "Invalid credentials");
	}
});

Route::get('logout', array('before'=>'csrf', function()
{
	Auth::logout();
	return Redirect::to('/')
		->with('message', 'You are now logged out');
}));

