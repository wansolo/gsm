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
                            Tree Growth of Referal list
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                 @if(is_object($level1))
                                <tr>
                             @foreach($level1 as $value)
                            
                                  <td> <img src="{{asset($value->profile_image)}}" class="img img-responsive" width="80" height="80" style="margin-left:10px; display:inline;">
                                        <p style="margin-left:50px;">{{$value->last_name}} {{$value->first_name}}</p>
                                        <p style="margin-left:50px; font-size:10px">{{$value->username}}</p>  
                                  </td>
                             
                            @endforeach
                             </tr>
                             @endif
                              @if(is_object ($level2))
                             <tr >
                             @foreach($level2 as $key => $value)
                                @foreach($value as $key => $value1)
                                
                                  <td> <img src="{{asset($value1->profile_image)}}" class="img img-responsive" width="40" height="40" style="margin-left:10px; display:inline;">
                                        <p style="margin-left:50px;">{{$value1->last_name}} {{$value1->first_name}}</p>
                                        <p style="margin-left:50px; font-size:10px">{{$value1->username}}</p>  
                                  </td>
                                @endforeach
                             
                            @endforeach
                             </tr>
                             @endif
                              @if(is_object($level3))
                             <tr >
                             @foreach($level3 as  $key => $value)
                               @foreach($value as $key =>  $value1)
                                   <td> <img src="{{asset($value1->profile_image)}}" class="img img-responsive" width="40" height="40" style="margin-left:10px; display:inline;">
                                        <p style="margin-left:50px;">{{$value1->last_name}} {{$value1->first_name}}</p>
                                        <p style="margin-left:50px; font-size:10px">{{$value1->username}}</p>  
                                  </td>
                                @endforeach
                            @endforeach
                             </tr>
                             @endif
                              @if(is_object($level4))
                             <tr >
                             @foreach($level4 as $key => $value)
                              @foreach($value as $key =>  $value1)
                                   <td> <img src="{{asset($value1->profile_image)}}" class="img img-responsive" width="40" height="40" style="margin-left:10px; display:inline;">
                                        <p style="margin-left:50px;">{{$value1->last_name}} {{$value1->first_name}}</p>
                                        <p style="margin-left:50px; font-size:10px">{{$value1->username}}</p>  
                                  </td>
                                @endforeach
                            @endforeach
                             </tr>
                              @endif 
                              
                           
                                </table>
                                
                            </div>
                       
                            <!-- /.table-responsive -->
                        </div>
  	

@stop











