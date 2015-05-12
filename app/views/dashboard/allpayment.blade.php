@extends('masterlayouts.dashboardmaster')
@section('headerusername')
	 {{ Auth::user()->username }}
@stop
@section('content')
	   @if (Session::has('flash_notice'))
		<div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      @if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message')}}</div>
      @endif
  		
  		<div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             List of paid payments
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           @if(count($message) == 0)
                                There are no pending payment information
                           
                           @else
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Amount Due</th>
                                         <th>Payment Purpose</th>
                                         <th> Date Due</th>
                                                                                

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($message as $user)
                                        <tr>
                                            <td>{{$user->users->first_name}}</td>
                                            <td>{{$user->users->last_name}}</td>
                                            <td>{{$user->amount}}</td>
                                             <td>{{$user->type}}</td>
                                             <td>{{$user->created_at}}</td>
                                            
                                        </tr>
                                    @endforeach

                                </tbody>        
                                
                                    
                                    
                                </table>
                                 <center>{{$message->links()}}</center> 
                            </div>
                            @endif
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











