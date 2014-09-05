<?php

class InstructorsController extends \BaseController {

	/**
	 * Display a listing of instructors
	 *
	 * @return Response
	 */
	public function index()
	{
		$instructors = Instructor::all();

		return View::make('instructors.index', compact('instructors'));
	}

	/**
	 * Show the form for creating a new instructor
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('instructors.create');
	}

	/**
	 * Store a newly created instructor in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Instructor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Instructor::create($data);

		return Redirect::route('instructors.index');
	}

	/**
	 * Display the specified instructor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$instructor = Instructor::findOrFail($id);

		return View::make('instructors.show', compact('instructor'));
	}

	/**
	 * Show the form for editing the specified instructor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$instructor = Instructor::find($id);

		return View::make('instructors.edit', compact('instructor'));
	}

	/**
	 * Update the specified instructor in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$instructor = Instructor::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Instructor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$instructor->update($data);

		return Redirect::route('instructors.index');
	}

	/**
	 * Remove the specified instructor from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Instructor::destroy($id);

		return Redirect::route('instructors.index');
	}

}
