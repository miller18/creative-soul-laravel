<?php

class Student extends Eloquent {

    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    public function schedules()
	{

		return $this->hasMany('Schedule');

	}

}