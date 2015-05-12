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
  		
  		<div class="col-lg-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lists Of Pending Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           @if(count($users) == 0)
                                There are no pending request
                           
                           @else
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Date Registered</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <a href="{{route('activate',$user->uid)}}" class="btn btn-warning">activate user</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>        
                                
                                    
                                    
                                </table>
                            </div>
                            @endif
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











