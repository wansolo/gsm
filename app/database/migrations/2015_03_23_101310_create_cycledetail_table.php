<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCycledetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cycledetails', function(Blueprint $table)
		{
			$table->increments('cdid');
			//$table->integer('cid');
			$table->integer('uid');
			$table->integer('cid');
			$table->integer('brought_by')->nullable();
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
		Schema::drop('cycledetails');
	}

}
