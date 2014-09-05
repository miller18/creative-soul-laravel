<?php

Route::model('schedule', 'Schedule');

View::composer('schedules.edit', function($view)
{
	$instructors = Instructor::all();
    $students = Student::all();

	if(count($instructors) > 0){
		$instructor_options = array_combine($instructors->lists('id'), $instructors->lists('first_name'));
	} else {
		$instructor_options = array(null, 'Unspecified');
	}

    if(count($students) > 0){
        $student_options = array_combine($students->lists('id'), $students->lists('first_name'));
    } else {
        $student_options = array(null, 'Unspecified');
    }

    $view->with('instructor_options', $instructor_options)
         ->with('student_options', $student_options);
});

Route::get('/', function()
{
	return Redirect::to('schedules');
	// return app()->env;
});

//Route::resource('schedules', 'SchedulesController');
Route::resource('students', 'StudentsController');
Route::resource('instructors', 'InstructorsController');


Route::get('schedules', 'SchedulesController@index');

Route::group(array('before' => 'auth'), function()
{

	Route::get('schedules/create', 'SchedulesController@create');
    Route::post('schedules', 'SchedulesController@store');
    Route::get('schedules/upload', 'SchedulesController@upload');

});

Route::get('schedules/{schedule}/edit', function(Schedule $schedule)
{
	return View::make('schedules.edit')
		->with('schedule', $schedule)
		->with('method', 'put');
});

//Route::get('schedules/{schedule}/delete', 'SchedulesController@destroy');

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

Route::delete('schedules/{schedule}', 'SchedulesController@destroy');
Route::get('schedules/instructors/{id}', 'SchedulesController@show');

Route::get('schedules/test_upload', 'SchedulesController@loadCSV');

// Login and logout routes

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

