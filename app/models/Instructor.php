<?php

class Instructor extends Eloquent {

	public function schedules() 
	{

		return $this->hasMany('Schedule');

	}


}