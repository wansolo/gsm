<?php

class DashboardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){
		
		$search = Auth::user()->uid;
		notify($search);
		//dd();
		$newmessage = Notification::where('uid','=',$search)->where('status','=','Pending')->get();

		$count = count($newmessage);
	
		if ($count == 0) {
			$count = 0;
			return View::make('dashboard.users')->with('newmessage',$newmessage)->with('count',$count);

		}
		else{
			return View::make('dashboard.users')->with('newmessage',$newmessage)->with('count',$count);

		}
		
		//

	}

	public function dismiss($id){
		$update = $id;
		//dd();
		$updatemessage = Notification::where('nid','=',$update)->first();

		$updatemessage->status = 'Read';
		$updatemessage->save();
		return Redirect::to('dashboard/');


	}
	public function viewmessages(){
		$search = Auth::user()->uid;
		//dd();
		$message = Notification::where('uid','=',$search)->orderBy('created_at','desc')->paginate(10);
		//dd($message);
		return View::make('dashboard.viewmessages')->with('message',$message);



	}
	public function viewaccounts(){
		$search = Auth::user()->uid;
		//dd();
		$message = Accountdetail::where('uid','=',$search)->orderBy('created_at','desc')->paginate(10);
		//dd($message);
		return View::make('dashboard.viewaccounts')->with('message',$message);



	}

	public function viewrefferals(){
		$search = Auth::user()->uid;
		//dd();
		$level1 = User::where('brought_by','=',$search)->get();
		if (count($level1) > 0) {
			$level2=new \Illuminate\Database\Eloquent\Collection();

			foreach ($level1 as $value) {
				$dummy = User::where('brought_by','=',$value->uid)->get();
				$level2->add($dummy);
				
			}
			if (count($level2) > 0) {
					$level3=new \Illuminate\Database\Eloquent\Collection();

					foreach ($level2 as $key => $value) {
						foreach ($value as $key => $value1) {
							$dummy = User::where('brought_by','=',$value1->uid)->get();
							$level3->add($dummy);
						}
						
						
					}
					if (count($level3) > 0) {
						$level4=new \Illuminate\Database\Eloquent\Collection();

						foreach ($level3 as $key => $value) {
							foreach ($value as $key => $value1) {
								$dummy = User::where('brought_by','=',$value1->uid)->get();
								$level4->add($dummy);
							}
							
							
						}

						if (count($level4) > 0) {
							return View::make('dashboard.viewrefferals')->with('level1',$level1)->with('level2',$level2)->with('level3',$level3)->with('level4',$level4);

							
						}else{

							return View::make('dashboard.viewrefferals')->with('level1',$level1)->with('level2',$level2)->with('level3',$level3)->with('level4',0);

						}

					}else{

						return View::make('dashboard.viewrefferals')->with('level1',$level1)->with('level2',$level2)->with('level3',0)->with('level4',0);

					}



						
			}else{
				//dd(count($level2));
				return View::make('dashboard.viewrefferals')->with('level1',$level1);

			}
		}else{
			Session::flash('flash_notice', 'No Referrals available!');
			return Redirect::route('home');
		}//end of if level1 > 0

		//return View::make('dashboard.viewrefferals')->with('message',$message);



	}

	public function viewcycle($id){

			
			
			//$currentcycleid = Cycle::where('uid', $id)->get();//returns the current cycle number
			$maxcycle =Cycle::where('uid',$id)->max('cid');

			$unders =Under::with('users')->where('cid',$maxcycle)->get();

			$total = count($unders);
			//dd($total);
			if (count($unders) < 1) {
				//dd($total);
				Session::flash('flash_notice', 'No members In your  Cycle!');
				return Redirect::to('dashboard/');
			}else{
				$search = array();
			
			foreach ($unders as $key => $value) {
				$search[] = $value->uid; //returns an array of the uid of all users belonging to your cycle
				
			}

				if (count($search) < 2) {
						$child = Under::with('users')->where('cid', '=', $search[0])->get();
						$total = $total + count($child);
						return View::make('dashboard.viewcyclemember')->with('details',$unders)->with('child',$child)->with('total',$total);
				
				
				}else{
				
					$child=new \Illuminate\Database\Eloquent\Collection();

			        foreach($search as $key => $value)
			        {
			        	$test = Under::with('users')->where('cid', '=', $value)->get();
			   
			            $child->add($test);
			            $total = $total + count($test);

			        }
			        //dd($->toArray());
			        
			       
					
					return View::make('dashboard.viewcyclemember')->with('details',$unders)->with('child',$child)->with('total',$total);
				
					

				}
			
				
			
			}
		}
			

	public function addtocycleform($id){
			notify($id);
			$maxcycle =Cycle::where('uid',$id)->max('cid');

			//$underlist = Under::with('users')->where('cid', '=', $maxcycle)->get();

			$underlist = DB::table('users')
            ->join('unders', 'unders.uid', '=', 'users.uid')
            ->select('users.username', 'users.uid')
            ->where('unders.cid', '=', $maxcycle)
            ->lists('username', 'uid');

			
            $underlist_count = count($underlist);

            if ($underlist_count == 0) {
            	$myName = Auth::user()->username;
				$underlist = array( $id=> $myName);
            }
            else if ($underlist_count < 2 AND !empty($underlist)) {
            	$myName = Auth::user()->username;
            	$underlist = array_add($underlist, $id, $myName);	
            } 
            //dd($underlist);
			return View::make('dashboard.addtocycle')->with('underlist', $underlist);
		}




	public function addtocycle(){
		$myId = Auth::user()->uid;
		
		$rules = array(
		
			'username' => 'required',
			'underlist' => 'required'
			
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('dashboard/addtocycle/'.$myId)->withErrors($validator)->withInput();
		}
		else{
			$referredUser = User::whereUsername(Input::get('username'))->first();

			if (empty($referredUser)) {
				Session::flash('flash_notice', 'User Does Not Exist !');
				return Redirect::to('dashboard/addtocycle/'.$myId);
			}
			elseif ($referredUser->active == 0) {
				Session::flash('flash_notice', 'User Account not activated yet !!');
				return Redirect::to('dashboard/addtocycle/'.$myId);
			}elseif ($referredUser->status == 1) {
				Session::flash('flash_notice', 'User Already belongs to a cycle !!');
				return Redirect::to('dashboard/addtocycle/'.$myId);
			}
			else{
				
				$under_id = Input::get('underlist');
				//dd($under_id);
				$maxcycle =Cycle::where('uid',$under_id)->max('cid');

				$underlist = DB::table('users')
				            ->join('unders', 'unders.uid', '=', 'users.uid')
				            ->select('users.username', 'users.uid')
				            ->where('unders.cid', '=', $maxcycle)
				            ->lists('username', 'uid');


				if (count($underlist) < 2) {

						$username = Input::get('username');
						$usernamefromdb = User::whereUsername($username )->first();
						$userid = $usernamefromdb->uid;
			            $usernamefromdb->status = 1;
			            $usernamefromdb->save();

						$cidfromdb = Cycle::where('uid',$maxcycle)->first();
						$cid = $cidfromdb->cid;

						$under = new Under;
						$under->uid = $userid;
						$under->cid = $cid;
						$under->save();

						//redirect
						Session::flash('flash_notice', 'Successfully Added '.$username. ' to Cycle!');
						return Redirect::to('dashboard/');
					
				}else{
					Session::flash('flash_notice', 'First Level Of Selected User Complete !!');
					return Redirect::to('dashboard/addtocycle/'.$myId);
				}

			
			}


		}

		}

		 




}//end of class