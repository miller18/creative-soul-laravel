<?php

class StudentsTableSeeder extends Seeder {

	public function run() 
	{
	
		DB::table('students')->truncate();

		$now = date('Y-m-d H:i:s');

		DB::table('students')->insert(array(
			array(
				'id'			=> 1, 
				'first_name'	=> 'Joe',
				'last_name'		=> 'Student',
				'email'			=> 'test@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 2, 
				'first_name'	=> 'Jim',
				'last_name'		=> 'Student',
				'email'			=> 'test2@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 3, 
				'first_name'	=> 'Phillip',
				'last_name'		=> 'Student',
				'email'			=> 'test3@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 4, 
				'first_name'	=> 'Moon',
				'last_name'		=> 'Student',
				'email'			=> 'test4@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			),
			array(
				'id'			=> 5, 
				'first_name'	=> 'Tim',
				'last_name'		=> 'Student',
				'email'			=> 'test9@test.com',
				'phone'			=> '817-888-5555',
				'created_at'	=> $now,
				'updated_at'	=> $now,
			)
			
		));
	}
}