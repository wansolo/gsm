@extends('masterlayouts.dashboardmaster')
@section('headerusername')
	 {{ Auth::user()->username }}
@stop
@section('content')
	   
  	<div class="row">
     @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      

  
            <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Cycle Members
                                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                      <tr>
                                      @foreach ($details as $key => $value)
                                      <td>
                                        <img src="{{asset($value->users->profile_image)}}" class="img img-responsive" width="80" height="80" style="margin-left:150px; display:inline;">
                                        <p style="margin-left:50px;">{{$value->users->last_name}} {{$value->users->first_name}}</p>
                                        <p style="margin-left:50px; font-size:10px">{{$value->users->username}}</p>  
                                      </td>
                                      
                                      @endforeach
                                      </tr>
                                        <tr>

                                          
                                    @foreach ($child as $key =>  $value) 
                                         <td >
                                        @foreach ($value as $key => $value1) 
                                           <img src="{{asset($value1->users->profile_image)}}" class="img img-responsive" width="80" height="80" style="display:inline; margin-right:30px; margin-left:50px;">
                                           
                                           <div style="display:inline;">
                                             <span style="margin-left:10px;">{{$value1->users->last_name}} {{$value1->users->first_name}}</span>
                                            <span style="margin-left:10px; font-size:10px;">{{$value1->users->username}}</span>  
                                           </div>
                                           
                                          @endforeach
                                        </td>
                                        @endforeach
                                         
                                            </tr>
                          


                                </tbody>
                                    
                                </table>
                        </div>
                            
  

                        </div>
             </div>
             </div>
    
    
        
  	
        <div class="col-lg-6">
          @if($total % 6 == 0)
            You Have successfully completed your cycle <br/>
            <a href="{{URL::to('dashboard/addnewcycle/'.Auth::user()->uid)}}" class="btn btn-warning">Create New Cycle</a>
          @endif 
        </div>
</div>

@stop











