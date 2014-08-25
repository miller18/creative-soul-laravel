<?php

class Student extends Eloquent {

	public function schedules() 
	{

		return $this->hasMany('Schedule');

	}

}