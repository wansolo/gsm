<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login');	
	}

	/**
	 * Login to acceess user dashboard.
	 *
	 * @return Response
	 */

	public function login()
	{
		 $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'active' => 1
        );
        
        if (Auth::attempt($user)) {
            return Redirect::route('home')->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')->with('flash_notice', 'Your username/password combination was incorrect.')->withInput();


		//return View::make('login');	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		
		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'username' => 'required|unique:users,username',
			'brought_by' => 'required',
			'password' => 'required',
			'repeatpassword' => 'required|same:password',
			'email' => 'required|email',
			'dob' => 'required'

		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('register')->withErrors($validator)->withInput();
		}
		else{

			$referredUser = User::whereUsername(Input::get('brought_by'))->first();

			if (empty($referredUser)) {
				Session::flash('error', 'Referred User Does Not Exist !');
				return Redirect::to('register');
			}else{
				if (Input::file('image')) {
					$image = Input::file('image');
					$ext = $image->getClientOriginalExtension();
					$filename = Input::get('username').'.'.$ext;
					$imagePath = 'Uploads/';
					if (file_exists($imagePath.$filename)) {
						$filename = $filename.uniqid().'.'.$ext;
					}else{
						$image->move($imagePath,$filename);
					}

				}
				$users = new User;
				$users->first_name = Input::get('firstname');
				$users->last_name = Input::get('lastname');	
				$users->username = Input::get('username');	
				$users->brought_by = $referredUser->uid;
				$users->gender = Input::get('gender');
				$users->password = Hash::make(Input::get('password'));
				$users->email = Input::get('email');
				$users->dob = Input::get('dob');
				if (Input::file('image')) {
					$users->profile_image = $imagePath.$filename;
				}else{
					$users->profile_image = 'Uploads/'.'no-image.png';
				}
				
				$users->save();

				
				
				$userid = $users->uid;

				$cycles = new Cycle;
				$cycles->uid = $userid;
				$cycles->save();


				$cidfromdb = Cycle::where('uid',$userid)->first();
				$cid = $cidfromdb->cid;

				$cycledetail = new Cycledetail;
				$cycledetail->uid = $userid;
				$cycledetail->cid = $cid;
				$cycledetail->save();
				//redirect
				Session::flash('message', 'Successfully Created New Account!');
				return Redirect::to('login');

			}

			
		}

		
	}


public function resetpassword(){
	return View::make('password.remind');
}
		


public function forgotpassword()
{
	
	$userdata = array(
		'email' => Input::get('email')
	);
 
	
	$rules = array(
		'email' => 'required|email', 
		);

	$validator = Validator::make($userdata, $rules);
 
	if($validator->fails())
	{
		return Redirect::back()->withInput()->withErrors($validator);
	}
	
	else
	{
		
		$user = User::where('email', '=', Input::get('email'));
 
		
		if($user->count())
		{
			$user = $user->first();
 
			// Generate a reset code and the temp password 
			$resetcode = str_random(60);
			$passwd = str_random(15);
 
			//Set the new values in the users db record to document the values
			$user->password_temp = Hash::make($passwd);
			$user->resetcode = $resetcode;
 
			// Save resetcode and temp password to user database record
			if($user->save())
			{
				// Set data array , this is the information that will be passed to the email form.
				$data = array(
					'email' => $user->email,
					'firstname' => $user->first_name,
					'lastname' => $user->last_name,
					'username' => $user->username,
					'link' => URL::to('password/resetpassword', $resetcode),
					'password' => $passwd
				);
 
				// Send a mail to the user. This will plug the datavalues into the reminder email template and mail the user. 
				Mail::send('emails.auth.reminder', $data, function($message) use($user, $data)
				{
					$message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Network Marketing Password Recovery Request');
				}); // End Mail
 
				// Return to the login screen with a message informing the user to check their email
				Session::flash('flash_notice', 'User password reset link has been sent to your email');
				return Redirect::to('login');
					
			} //End If DB Save
		} // End If User Count
 
		// If the email address does not match an email address in the database the display feedback to the user
			Session::flash('flash_notice', 'Could not validate existing email address');
			return Redirect::to('password/forgotpassword');
				
	} // End Else
} // End FogotPassword FN

	public function changepassword($id){
		return View::make('password.newpassword')->with('resetcode',$id);
	}

	public function newpassword($id){

		$rules = array(
			'password' => 'required',
			'repeatpassword' => 'required|same:password',
			
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('newpassword')->withErrors($validator)->withInput();
		}
		else{
				$users = User::where('resetcode',$id)->first();
				$users->password = Hash::make(Input::get('password'));
				$users->save();

				
				Session::flash('message', 'Successfully Changed Password. Login with your username and new password!');
				return Redirect::to('login');

			

			
		}

		
	}

			/**
	 * Receives Id of brought by field on form to return a dropdown of people under that ID on keyup
	 *
	 * @return Response
	 */

		

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
