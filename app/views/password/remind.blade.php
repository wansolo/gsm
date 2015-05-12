@extends('masterlayouts.master')
@section('content')
	<div class='container'>
		<div class="row">
	 	<div class="col-md-8 col-md-offset-2">
      <h3>Reset User Password</h3>
      @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
        
	 

    {{Form::open(array('url' => 'password/forgotpassword', 'method' => 'Post'))}}
      <div class="form-group {{$errors->has('firstname')?'has-error':''}}">
        {{form::label('email', 'Please type in your registered email address')}}
        {{form::email('email', Input::old('firstname'), array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('firstname')}}</span>
      </div>
     
    {{Form::submit('Submit', array('class' => 'btn btn-primary'))}}
    
    {{Form::close()}}
    	</div>
@stop