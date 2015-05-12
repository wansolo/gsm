@extends('masterlayouts.master')
@section('content')
	<div class='container'>
		<div class="row">
	 	<div class="col-md-8 col-md-offset-2">
      <h3>Create New Password</h3>
      @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
        
	 

    {{Form::open(array('url' => 'password/newpassword/'.$resetcode, 'method' => 'Post'))}}
      <div class="form-group {{$errors->has('password')?'has-error':''}}">
        
        {{form::password('password', array('class'=>'form-control', 'placeholder' => 'Password'))}}
        <span class="help-block">{{$errors->first('password')}}</span>
      </div>
      <div class="form-group {{$errors->has('repeatpassword')?'has-error':''}}">
        
        {{form::password('repeatpassword',  array('class'=>'form-control', 'placeholder' => 'New Password'))}}
        <span class="help-block">{{$errors->first('repeatpassword')}}</span>
      </div>
     
    {{Form::submit('Submit', array('class' => 'btn btn-primary'))}}
    
    {{Form::close()}}
    	</div>
@stop