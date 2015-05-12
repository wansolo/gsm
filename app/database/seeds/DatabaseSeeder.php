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

		$this->call('UserTableSeeder');
		$this->call('CycledetailTableSeeder');
		$this->call('CycleTableSeeder');
		//$this->call('NotificationTableSeeder');
		//$this->call('AccountdetailTableSeeder');
		$this->call('UnderTableSeeder');


	}

}
