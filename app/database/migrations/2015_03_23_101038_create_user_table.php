<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('uid');
			$table->string('first_name',25);
			$table->string('last_name', 25);
			$table->string('username', 25);
			$table->date('dob')->nullable();
			$table->string('gender');
			$table->string('password', 64);
			$table->integer('legend');
			$table->integer('admin');
			$table->integer('brought_by')->nullable();
			$table->string('profile_image')->nullable();
			$table->string('email')->nullable();
			$table->integer('active')->default(0);
			$table->string('password_temp')->nullable();
			$table->string('resetcode')->nullable();
			$table->string('link')->nullable();
			$table->string('status')->default(0);
			// required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
