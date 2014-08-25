<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSchedulesAndInstructorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function($table){
			$table->increments('id');
			$table->date('class_date');
			$table->time('class_time');
			$table->string('class_type');
			$table->integer('student_id');
			$table->integer('instructor_id');
			$table->decimal('class_duration', 2, 1);
			$table->text('class_notes');
			$table->timestamps();
		});

		Schema::create('instructors', function($table){
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('phone');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schedules');
		Schema::drop('instructors');
	}

}
