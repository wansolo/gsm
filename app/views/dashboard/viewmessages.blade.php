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
  		
  		<div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Summary of Notifications
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Message</th>
                                    <th>Date Sent</th>
                                  </tr>
                                </thead>
                             @foreach($message as $value)
                             @if($value->status == 'Pending')
                              <tr class="danger">
                                  <td>{{$value->detail}} </td>
                                  <td>{{$value->created_at}} </td>
                                 
                              </tr>
                              @else
                              <tr class="info">
                                  <td>{{$value->detail}} </td>
                                  <td>{{$value->created_at}} </td>
                                 
                              </tr>
                              @endif
                            @endforeach
                                    
                                </table>
                                 <center>{{$message->links()}}</center>      
                            </div>
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











