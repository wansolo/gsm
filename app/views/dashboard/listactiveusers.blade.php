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
  		
  		<div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Personal Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                                       
                                        </tr>
                                    @endforeach

                                    <center>{{$users->links()}}</center>

                                </tbody>        
                                
                                    
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











