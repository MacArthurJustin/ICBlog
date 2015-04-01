<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->tinyInteger('level');
			$table->rememberToken();
			$table->timestamps();
		});

		// Insert some stuff
		DB::table('users')->insert(
			array(
				'name' => 'testUser',
				'email' => 'testuser@tuser.com',
				'password' => '$2y$10$xcFgoCrfc12.tFBayyJFlenE6vhzszTFn9/0gDhx14A49fW6hIUQW',
				'level' => 1
			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
