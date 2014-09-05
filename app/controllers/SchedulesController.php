<?php

class SchedulesController extends \BaseController {

	/**
	 * Display a listing of schedules
	 *
	 * @return Response
	 */
	public function index()
	{
		$schedules = Schedule::all();
        return View::make('schedules.index', compact('schedules'));
	}

	/**
	 * Show the form for creating a new schedule
	 *
	 * @return Response
	 */
	public function create()
	{
        $schedule = new Schedule;
        return View::make('schedules.edit')->with('schedule', $schedule)->with('method', 'post');
	}

	/**
	 * Store a newly created schedule in storage.
	 *
	 * @return Response
	 */
	public function store()
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
                    ->with('error', 'Could not create schedule');
            }
        }
	}

	/**
	 * Display the specified schedule.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $instructor = Instructor::whereId($id)->with('schedules')->first();
        return View::make('schedules.index')->with('instructor', $instructor)->with('schedules', $instructor->schedules);
	}

	/**
	 * Show the form for editing the specified schedule.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('schedules.edit')
            ->with('schedule', $schedule)
            ->with('method', 'put');
	}

	/**
	 * Update the specified schedule in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$schedule = Schedule::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Schedule::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$schedule->update($data);

		return Redirect::route('schedules.index');
	}

	/**
	 * Remove the specified schedule from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($schedule)
	{
        $schedule->delete();
        return Redirect::to('schedules')->with('message', 'Successfully deleted schedule!');
	}

    public function upload() {
        return View::make('schedules.upload');
    }

    public function loadCSV() {

        $csvFile = '/home/vagrant/Sites/creative-soul/public/test_upload.csv';

        // Validations

        // Student is in database
        // Instructor is in the database
        // Class type fits in the list
        // Date is valid
        // Class time is valid


        $csv = $this->readCSV($csvFile);

        foreach ($csv as $listings) {

            $new_schedule = new Schedule;

            $new_schedule->class_date = $listings[0];
            $new_schedule->class_time = $listings[1];
            $new_schedule->class_type = $listings[2];
            $new_schedule->student_id = $listings[3];
            $new_schedule->instructor_id = $listings[4];
            $new_schedule->class_duration = $listings[5];
            $new_schedule->class_notes = $listings[6];

            $new_schedule->save();
            echo $listings[0] . 'recorded added <br />';
        }
        echo 'done';
        return Redirect::to('schedules');
    }

    public function readCSV($csvFile) {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }

}
