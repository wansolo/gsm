<!Doctype html>
<html>
	<head>
		<title>Network Marketing</title>
		@include('includes.jqueryandbootstrap')
	</head>
	<body>
		
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('dashboard/')}}" style="letter-spacing:5px"><img class="img-responsive brand" src="{{asset('img/logo.png')}}"></a>
                	
                 </div>

                 
                 <ul class="nav pull-right top-nav" >
                 	<li class="dropdown purple">
                 		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome: @yield('headerusername')</i><b class="caret"></b></a>
                 		<ul class="dropdown-menu">
                 			<li class="divider"></li>
                 			<li><a href="{{ URL::to('logout') }}"><i class="fa fa-fw fa-power-off"></i>Log Out</a></li>
                 		</ul>
                 	</li>
                	
                </ul>
            <!-- /.navbar-header -->

            
            <div id="purple" class="navbar-default sidebar purple" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        
                        <li>
                            <a href="{{URL::to('dashboard/')}}"><i class="fa fa-dashboard fa-fw "></i> Dashboard</a>
                        </li>
                        @if(Auth::user()->admin == 0)
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw "></i> User Account Manager<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/viewmessages')}}">View Notifications</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('dashboard/viewaccounts')}}">View Accounts </a>
                                </li>
                                <li>
                                    <a href="{{URL::to('dashboard/viewrefferals')}}">View Refferals </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw "></i> View Cycle<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/viewcycle/'.Auth::user()->uid)}}">View Cycle</a>
                                </li>
                                <li>
                                    <a href="#">?? </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw "></i> Add To Cycle<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/addtocycle/'.Auth::user()->uid)}}">Add To Cycle</a>
                                </li>
                                <li>
                                    <a href="#">??</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        @if(Auth::user()->admin == 1)
                            <li>
                            <a href="#"><i class="fa fa-plus fa-fw "></i>User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::to('dashboard/listpendingusers')}}">Activate New Users</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('dashboard/listactiveusers')}}">View All Active Users</a>
                                </li>
                                 <li>
                                    <a href="{{URL::to('dashboard/pending-payment')}}">Pending Payments List</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('dashboard/all-payment')}}"> List of paid payments</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="margin-top: 30px;">
        
            
       
            

            @yield('content')
  
           
        </div>
  
    </div>
  
  


	</body>
</html>