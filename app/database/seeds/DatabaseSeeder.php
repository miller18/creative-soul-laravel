<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SchedulesTableSeeder');
		$this->call('InstructorsTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('UsersTableSeeder');
	}

}
