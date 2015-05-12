<?php

class AdminController extends \BaseController {

	public function listactiveusers(){
		$users = User::where('active','=',1)->paginate(5);
		return View::make('dashboard.listactiveusers')->with('users',$users);
	}
	public function listpendingusers(){
		$users = User::where('active','=',0)->get();
		return View::make('dashboard.listpendingusers')->with('users',$users);
	}

	public function activateuser($id){
		$users = User::find($id);
		$users->active = 1;
		$users->save();



		$refferedUser = User::where('uid','=',$users->brought_by)->first();

		$accounts = new Accountdetail;
		$accounts->uid = $refferedUser->uid;
		$accounts->type = 'commision';
		$accounts->amount = 10;
		$accounts->status = 'Pending';
		$accounts->save();
		

		$message =new Notification;
		$message->uid = $refferedUser->uid;
		$message->detail = $users->username." was referred by you. You may now add ".$users->username." to your cycle";
		$message->status="Pending";
		$message->save();


		$message =new Notification;
		$message->uid = $accounts->uid;
		$message->detail = "You Have been Paid  &#x20B5;".$accounts->amount." as commision for referring ".$users->username;
		$message->status="Pending";
		$message->save();
		return Redirect::route('listpendingusers');
	}

	public function pendingpayments(){
		$message = Accountdetail::with('users')->where('status','=','Pending')->orderBy('created_at','desc')->paginate(10);
		return View::make('dashboard.pendingpayment')->with('message',$message);

	}
	public function allpayments(){
			$message = Accountdetail::with('users')->where('status','=','Paid')->orderBy('created_at','desc')->paginate(10);
			return View::make('dashboard.allpayment')->with('message',$message);

		}
	public function confirmpayment($id){
		$accounts = Accountdetail::where('status','=','Pending')->where('aid',$id)->first();
		$accounts->status = 'Paid';
		$accounts->save();

		$message =new Notification;
		$message->uid = $accounts->uid;
		$message->detail = "You Have been Paid  &#x20B5;".$accounts->amount." as commision.";
		$message->status="Pending";
		$message->save();
		return Redirect::route('payment');
	}


}
