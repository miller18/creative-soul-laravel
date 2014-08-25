<?php

class InstructorsTableSeeder extends Seeder {

	public function run() 
	{
	
		DB::table('instructors')->truncate();

		$now = date('Y-m-d H:i:s');

		DB::table('instructors')->insert(array(
			array(
				'id'			=> 1, 
				'first_name'	=> 'Joe',
				'last_name'		=> 'Blow',
				'email'			=> 'test@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 2, 
				'first_name'	=> 'Jim',
				'last_name'		=> 'Johnson',
				'email'			=> 'test2@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 3, 
				'first_name'	=> 'Phillip',
				'last_name'		=> 'Hamburger',
				'email'			=> 'test3@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 4, 
				'first_name'	=> 'Moon',
				'last_name'		=> 'Sun',
				'email'			=> 'test4@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 5, 
				'first_name'	=> 'Tim',
				'last_name'		=> 'Tooth',
				'email'			=> 'test9@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			)
			
		));
	}
}