@extends('masterlayouts.dashboardmaster')
@section('headerusername')
   {{ Auth::user()->username }}
@stop
@section('content')
     @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      
      <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3>Add New Cycle</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
   

    {{Form::open(array('url' => 'dashboard/addtonewcycle', 'method' => 'post'))}}
     
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











