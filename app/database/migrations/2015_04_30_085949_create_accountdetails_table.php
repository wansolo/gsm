<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accountdetails', function(Blueprint $table)
		{
			$table->increments('aid');
			$table->integer('uid');
			$table->string('type',25);
			$table->double('amount', 15, 8);
			$table->string('status',25);
		
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
		Schema::drop('accountdetails');
	}

}
