<?php

class UsersTableSeeder extends Seeder {

	public function run() 
	{
		User::create(array(
				'username' => 'admin',
				'password' => Hash::make('foobar'),
				'is_admin' => true
		));
		
		User::create(array(
				'username' => 'scott',
				'password' => Hash::make('tiger'),
				'is_admin' => false
		));
	}

}