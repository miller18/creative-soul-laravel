<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->boolean('is_admin');
			$table->timestamps();
		});

		Schema::table('schedules', function($table)
		{
			$table->integer('user_id')->nullable()->references('id')->on('users');
			$table->string('location');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedules', function($table)
		{
			$table->dropForeign('schedules_user_id_foreign');
			$table->dropColumn('user_id');
		});

		Schema::drop('users');
	}

}
