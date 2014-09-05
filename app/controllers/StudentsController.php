<?php

class StudentsController extends \BaseController {

	/**
	 * Display a listing of students
	 *
	 * @return Response
	 */
	public function index()
	{
		$students = Student::all();

		return View::make('students.index', compact('students'));
	}

	/**
	 * Show the form for creating a new student
	 *
	 * @return Response
	 */
	public function create()
	{
        $student = new Student;
        return View::make('students.edit')->with('student', $student)->with('method', 'post');
	}

	/**
	 * Store a newly created student in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        );

        $validation_result = Validator::make(Input::all(), $rules);

        if($validation_result->fails()){

            // echo "help";
            // print_r($validation_result->messages());
            return Redirect::back()
                ->with('messages', $validation_result->messages());

        } else {

            $student = Student::create(Input::all());
            $student->user_id = Auth::user()->id;
            if($student->save()) {
                return Redirect::to('students')->with('message', 'Successfully create new student!');
            } else {
                return Redirect::back()
                    ->with('error', 'Could not create new student');
            }
        }
	}

	/**
	 * Display the specified student.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$student = Student::findOrFail($id);

		return View::make('students.show', compact('student'));
	}

	/**
	 * Show the form for editing the specified student.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = Student::find($id);

		return View::make('students.edit', compact('student'));
	}

	/**
	 * Update the specified student in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$student = Student::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Student::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$student->update($data);

		return Redirect::route('students.index');
	}

	/**
	 * Remove the specified student from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Student::destroy($id);

		return Redirect::route('students.index');
	}

}
