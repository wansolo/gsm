<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'first_name'     	=> 			'Michael',
			'last_name' 		=> 			'Okorie',
			'username'    		=> 			'onyekam',
			'dob'    			=> 			'1989/05/25',
			'gender'    		=> 			'male',
			'email'    			=> 			'michaelo_@hotmail.com',
			'password' 			=> 			Hash::make('ish213'),
			'brought_by'    	=> 			8,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'Solomon',
			'last_name' 		=> 			'Sunu',
			'username'    		=> 			'wansolo',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'solomon_sunu@gmail.com',
			'password' 			=> 			Hash::make('leverage'),
			'brought_by'    	=> 			1,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'Steve',
			'last_name' 		=> 			'Andoh',
			'username'    		=> 			'steveandoh',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('steve'),
			'brought_by'    	=> 			1,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'kk',
			'last_name' 		=> 			'karikari',
			'username'    		=> 			'kk',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('kk'),
			'brought_by'    	=> 			1,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'nancy',
			'last_name' 		=> 			'karikari',
			'username'    		=> 			'nancy',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('nancy'),
			'brought_by'    	=> 			1,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'dan',
			'last_name' 		=> 			'karikari',
			'username'    		=> 			'dan',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('dan'),
			'brought_by'    	=> 			3,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'sedinam',
			'last_name' 		=> 			'sunu',
			'username'    		=> 			'sedinam',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('sedinam'),
			'brought_by'    	=> 			2,
			'legend'    		=> 			0,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
		));
		User::create(array(
			'first_name'     	=> 			'max',
			'last_name' 		=> 			'karikari',
			'username'    		=> 			'max',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('max'),
			'brought_by'    	=> 			'',
			'legend'    		=> 			1,
			'admin'    			=> 			0,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		1,
			
			
		));
		User::create(array(
			'first_name'     	=> 			'Admin',
			'last_name' 		=> 			'Admin',
			'username'    		=> 			'Admin',
			'dob'    			=> 			'1992/01/01',
			'gender'    		=> 			'male',
			'email'    			=> 			'xxx@gmail.com',
			'password' 			=> 			Hash::make('admin'),
			'brought_by'    	=> 			'',
			'legend'    		=> 			0,
			'admin'    			=> 			1,
			'active'    			=> 		1,
			'profile_image'    	=> 			'Uploads/no-image.png',
			'status'    			=> 		2,
			
		));
	}

}



