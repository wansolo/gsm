<!doctype html>
<html lang="en">
    <head>
        @include('includes.jqueryandbootstrap')
    </head>
    <body class="loginandregistrationbackground">
  <div class='container'>
    <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">

      <img class="img-responsive logo" src="{{ asset('img/logo.png')}}">
                   
                    <div class="account-wall registration">
                     <h3 class="text-center login-title">Registration</h3>

      @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      @if (Session::has('error'))
    <div class="alert alert-info">{{Session::get('error')}}</div>
      @endif
      
   

    {{Form::open(array('url' => 'register', 'method' => 'Post','files' => true ))}}
      <div class="form-group {{$errors->has('firstname')?'has-error':''}}">
        {{form::text('firstname', Input::old('firstname'), array('class'=> 'form-control', 'placeholder' => 'First Name'))}}
        <span class="help-block">{{$errors->first('firstname')}}</span>
      </div>
      <div class="form-group {{$errors->has('lastname')?'has-error':''}}">
        
        {{form::text('lastname', Input::old('lastname'), array('class'=> 'form-control', 'placeholder' => 'Last Name'))}}
        <span class="help-block">{{$errors->first('lastname')}}</span>
      </div>  
      <div class="form-group {{$errors->has('username')?'has-error':''}}">
        
        {{form::text('username', Input::old('username'), array('class'=> 'form-control', 'placeholder' => 'Username'))}}
        <span class="help-block">{{$errors->first('username')}}</span>
      </div>
      <div class="form-group {{$errors->has('password')?'has-error':''}}">
        
        {{form::password('password', array('class'=>'form-control', 'placeholder' => 'Password'))}}
        <span class="help-block">{{$errors->first('password')}}</span>
      </div>
      <div class="form-group {{$errors->has('repeatpassword')?'has-error':''}}">
        
        {{form::password('repeatpassword',  array('class'=>'form-control', 'placeholder' => 'Password'))}}
        <span class="help-block">{{$errors->first('repeatpassword')}}</span>
      </div>
      <div class="form-group {{$errors->has('email')?'has-error':''}}">
        
        {{form::email('email', Input::old('email'), array('class'=>'form-control', 'placeholder' => 'example@example.com'))}}
        <span class="help-block">{{$errors->first('email')}}</span>
      </div>
      <div class="form-group {{$errors->has('dob')?'has-error':''}}">
        
          <input type="date" name="dob" class="form-control" >
        <span class="help-block">{{$errors->first('dob')}}</span>
      </div>
      <div>
        {{form::label('gender', 'Gender: ')}}
        {{form::label('gender', 'Male')}}
        {{form::radio('gender', 'Male', true)}}
        {{form::label('gender', 'Female')}}
        {{form::radio('gender', 'Female')}}
      </div>
       <div class="form-group {{$errors->has('brought_by')?'has-error':''}}">
        {{form::label('brought_by', 'Referred By(Provide Username eg. wansolo)')}}
        {{form::text('brought_by', Input::old('brought_by'), array('class'=> 'form-control', 'placeholder' => 'wansolo'))}}
        <span class="help-block">{{$errors->first('brought_by')}}</span>
      </div>
     <div class="form-group {{$errors->has('image')?'has-error':''}}">
         {{form::label('image', '*Upload Your Picture')}}
        {{form::file('image', array('class'=> 'form-control'))}}
        
      </div>
    {{Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block'))}} <br/>
     <span class="pull-right"><a href="{{URL::to('login')}}"> <-- Go Back</a></span>

    {{Form::close()}}
     <small>*Not required</small>
   
  </div>
                    
                </div>
      </div>
      </div>
    </body>
</html>
