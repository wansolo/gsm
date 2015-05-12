<!doctype html>
<html lang="en">
    <head>
        @include('includes.jqueryandbootstrap')
    </head>
    <body class="loginandregistrationbackground">
	<div class='container'>
		<div class="row">
	 	<div class="col-sm-6 col-md-4 col-md-offset-4">

      <img class="img-responsive" src="{{ asset('img/logo.png')}}">
                   
                    <div class="account-wall">
                     <h3 class="text-center login-title">Sign in</h3>
      
      @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      @if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message')}}</div>
      @endif
        
	 

    {{Form::open(array('url' => 'login', 'method' => 'Post'))}}
      <div class="form-group {{$errors->has('firstname')?'has-error':''}}">
        
        {{form::text('username', Input::old('firstname'), array('class'=> 'form-control',  'placeholder'=>'Username'))}}
        <span class="help-block">{{$errors->first('username')}}</span>
      </div>
      <div class="form-group {{$errors->has('lastname')?'has-error':''}}">
        
        {{form::password('password',  array('class'=> 'form-control',  'placeholder'=>'Password'))}}
        <span class="help-block">{{$errors->first('password')}}</span>
      </div>  
     
    {{Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block'))}}<br/>
     <span class="pull-right">or <a href="{{URL::to('register')}}">Register Here</a></span>
     <br/><span class="pull-right">if you don't have an account</span> 
     <br>
     <span class="pull-right">or <a href="{{URL::to('password/forgotpassword')}}">Forget password?</a></span>
     
    {{Form::close()}}
    </div>
                    
                </div>
    	</div>
      </div>
    </body>
</html>
