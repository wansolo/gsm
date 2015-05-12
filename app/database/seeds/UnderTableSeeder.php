<?php

class UnderTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('unders')->delete();
		Under::create(array(
			'uid'     => 2,
			'cid'     => 1,
			
		));
		Under::create(array(
			'uid'     => 3,
			'cid'     => 1,
			
		));
		Under::create(array(
			'uid'     => 5,
			'cid'     => 2,
			
		));
		Under::create(array(
			'uid'     => 6,
			'cid'     => 3,
			
		));
		Under::create(array(
			'uid'     => 7,
			'cid'     => 2,
			
		));
		
	}

}