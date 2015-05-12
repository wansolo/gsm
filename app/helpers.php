<?php
function notify($id){
			
			$maxcycle =Cycle::where('uid',$id)->max('cid');
			$unders =Under::with('users')->where('cid',$maxcycle)->get();

			$total = count($unders);
			$search = array();
			
			foreach ($unders as $key => $value) {
				$search[] = $value->uid; //returns an array of the uid of all users belonging to your cycle
				
			}
			$child=new \Illuminate\Database\Eloquent\Collection();

			foreach($search as $key => $value)
			        {
			        	$test = Under::with('users')->where('cid', '=', $value)->get();
			            $total = $total + count($test);

			        }

			 if ($total == 6) {
			 	$message =new Notification;
				$message->uid = $id;
				$message->detail = " You have succesfully completed your cycle";
				$message->status="Pending";
				$message->save();

				$message1 =new Notification;
				$message1->uid = $id;
				$message1->detail = " You have &#x20B5; 150 due you for completing your cycle successfully";
				$message1->status="Pending";
				$message1->save();

				foreach($search as $key => $value)
			        {
			        	$status = User::where('uid', '=', $value)->first();
			            $status->status = 0;
			            $status->save();

			        }

				$cycles = new Cycle;
				$cycles->uid = $id;
				$cycles->save();



				$cycledetail = new Cycledetail;
				$cycledetail->uid = $id;
				$cycledetail->cid = $cycles->cid;
				$cycledetail->save();

				$account = new Accountdetail;
				$account->uid = $id;
				$account->type ='commision';
				$account->amount = 150;
				$account->status  = 	'Pending';
				$account->save();

				///will add the code to send to refferer

			 }

			 return true;

		}