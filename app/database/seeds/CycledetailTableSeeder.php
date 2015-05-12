<?php

class CycledetailTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('cycledetails')->delete();
		Cycledetail::create(array(
			'uid'     => 1,
			'cid'     => 1,
			'brought_by'     => 8,
			
		));
		Cycledetail::create(array(
			'uid'     => 2,
			'cid'     => 2,
			'brought_by'     => 1,
			
		));
		Cycledetail::create(array(
			'uid'     => 3,
			'cid'     => 3,
			'brought_by'     => 1,
			
		));
		Cycledetail::create(array(
			'uid'     => 4,
			'cid'     => 4,
			'brought_by'     => 1,
			
		));
		Cycledetail::create(array(
			'uid'     => 5,
			'cid'     => 5,
			'brought_by'     => 1,
			
		));
		Cycledetail::create(array(
			'uid'     => 6,
			'cid'     => 6,
			'brought_by'     => 3,
			
		));
		Cycledetail::create(array(
			'uid'     => 7,
			'cid'     => 7,
			'brought_by'     => 2,
			
		));
		Cycledetail::create(array(
			'uid'     => 8,
			'cid'     => 8,
			'brought_by'     => '',
			
		));
	}

}