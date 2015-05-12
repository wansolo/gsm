<?php

class AccountdetailTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('accountdetails')->delete();
		Accountdetail::create(array(
			'uid'     	=> 			1,
			'type'		=>	'commision',
			'amount' 		=> 		150,
			'status'    		=> 	'Pending',
			
			
		));
		Accountdetail::create(array(
			'uid'     	=> 			2,
			'type'		=>	'commision',
			'amount' 		=> 		150,
			'status'    		=> 	'Pending',
		));
		
		
	}

}



