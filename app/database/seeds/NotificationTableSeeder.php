<?php

class NotificationTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('notifications')->delete();
		Notification::create(array(
			'uid'     	=> 			1,
			'detail' 		=> 			'You Have 150 cedi due you',
			'status'    		=> 			'Pending',
			
		));
		Notification::create(array(
			'uid'     	=> 			2,
			'detail' 		=> 			'You Have 150 cedi due you',
			'status'    		=> 			'Pending',
			
		));
		
		
	}

}



