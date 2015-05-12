@extends('masterlayouts.dashboardmaster')
@section('headerusername')
	 {{ Auth::user()->username }}
@stop
@section('message')
       
      
@stop
@section('content')
	   @if (Session::has('flash_notice'))
		<div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      @if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message')}}</div>
      @endif
       @if($count > 0)
            
            
                <div class="col-md-6 pull-right">
                    <div class=" notificationbox ">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      @if($count == 1)
                      <h4>{{$count}}  New Message</h4>
                     
                       @else
                      <h4>{{$count}}  New Messages</h4>
                      @endif
                      <table class="table table-responsive borderless notificationmessage">
                          <tbody>
                          @foreach($newmessage as $value)
                              <tr >
                                  <td class="" >
                                    {{$value->detail}}<br>
                                    <div class="notificationdate">{{$value->created_at}}</div>
                                    <a href="{{URL::to('/dashboard/dismiss/'.$value->nid)}}" class="closebutton pull-right" >&times;</a>
                                  </td>
                                 
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                      
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->
   
        @endif
  		
  		<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Personal Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
                                        <tr>
                                            <td class="bold">Profile Image</td>
                                            <td>
                                            <center>
                                              <img src="{{asset(Auth::user()->profile_image)}}" class="img img-responsive" width="70" height="70" >
                                           
                                            </center>
                                             </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">First Name</td>
                                            <td>{{ Auth::user()->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Last Name</td>
                                            <td>{{ Auth::user()->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Gender</td>
                                            <td>{{ Auth::user()->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Date of Birth</td>
                                            <td>{{ Auth::user()->dob}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">E-mail</td>
                                            <td>{{ Auth::user()->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Joined Since</td>
                                            <td>{{ Auth::user()->created_at}}</td>
                                        </tr>
                                            
                                    
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











