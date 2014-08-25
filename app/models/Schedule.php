<?php

class Schedule extends Eloquent {

	protected $fillable = ['class_time', 'class_type', 'student_id', 'instructor_id', 'class_duration', 'class_notes'];

	public function instructor() 
	{
		return $this->belongsTo('instructor');
	}

	public function student()
	{
		return $this->belongsTo('student');
	}

}