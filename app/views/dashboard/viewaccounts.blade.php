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
                            Summary of Account
                        </div>
                        @if(count($message))
                          <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Amount</th>
                                    <th>Date</th>
                                     <th>Status</th>
                                      <th>Purpose</th>
                                  </tr>
                                </thead>
                             @foreach($message as $value)
                             @if($value->status == 'Pending')
                              <tr class="danger">
                                  <td>{{$value->amount}} </td>
                                  <td>{{$value->created_at}} </td>
                                   <td>{{$value->status}} </td>
                                    <td>{{$value->type}} </td>
                                 
                              </tr>
                              @else
                              <tr class="info">
                                  <td>{{$value->amount}} </td>
                                  <td>{{$value->created_at}} </td>
                                   <td>{{$value->status}} </td>
                                    <td>{{$value->type}} </td>
                              </tr>
                              @endif
                            @endforeach
                                    
                                </table>
                                 <center>{{$message->links()}}</center>       
                            </div>
                        @else
                            <div class="panel-body">
                            <center>
                               <h1 class="label label-info label-lg" style="font-size: 30px; margin:10px auto;">
                                No Activity on Account Currently
                              </h1>
                            </center>
                             
                            </div>
                        @endif
                        
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











