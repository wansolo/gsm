@extends('masterlayouts.dashboardmaster')
@section('headerusername')
   {{ Auth::user()->username }}
@stop
@section('content')
     @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      
      <div class="col-md-8 col-md-offset-2" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3>Add a User to Your Cycle</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
   

    {{Form::open(array('url' => 'dashboard/additiontocycle', 'method' => 'post'))}}
     <div class="form-group ">
        {{form::label('underlist', 'Place Under')}}
        {{form::select('underlist', $underlist, '',array('class'=> 'form-control'))}}
      </div>
      <div class="form-group {{$errors->has('username')?'has-error':''}}">
        {{form::label('username', 'Username')}}
        {{form::text('username', '' , array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('username')}}</span>
      </div>
      
    {{Form::submit('Register', array('class' => 'btn btn-primary'))}}
    {{Form::close()}}
                            <!-- /.table-responsive -->
                        </div>
    

@stop











