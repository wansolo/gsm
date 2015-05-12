<?php

class CycleTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('cycles')->delete();
		Cycle::create(array(
			'uid'     => 1,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 2,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 3,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 4,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 5,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 6,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 7,
			'date_completed' => '',
		));
		Cycle::create(array(
			'uid'     => 8,
			'date_completed' => '',
		));
	}

}