<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{ URL::to('/') }}">
        <meta charset="utf-8">
        <title>Cost Estimation System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/pages/dashboard.css" rel="stylesheet">
        <!-- FAVICON -->
        <link rel="shortcut icon" href="/logo.ico" type="image/x-icon" >
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
            <!-- Le javascript
    ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script src="js/jquery-1.7.2.min.js"></script> 
    <script src="js/excanvas.min.js"></script> 
    <script src="js/chart.min.js" type="text/javascript"></script> 
    <script src="js/bootstrap.js"></script>
    <script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
    <script src="js/moment-with-locales.js"></script> 
    <script src="js/global.js"></script> 
    <script src="js/base.js"></script> 
    <script src="js/rupiah.js"></script> 
    <script type="text/javascript">
jQuery(document).ready(function() {
    (function update_time() {
        
        // Use moment.js to output the current time as a string
        // hh is for the hours in 12-hour format,
        // mm - minutes, ss-seconds (all with leading zeroes),
        // d is for day of week and A is for AM/PM
        //set locale
        moment.locale('id');
        var now = moment().format("HH:mm:ss");
        var tgl =moment().format('dddd, LL');

        jQuery('#jam').text(now);
        jQuery('#tgl').text(tgl);

        // Schedule this function to be run again in 1 sec
        setTimeout(update_time, 1000);

    })();
});
    </script>

    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"> 
                    
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span ="icon-bar"></span><span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </a>
                    <a class="brand" href="{{URL::to('home')}}">Ceos - Cost Estimation System</a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="icon-user"></i> Administrator <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:;">Profile</a></li>
                                    <li><a href="{{URL::to('home')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /navbar-inner --> 
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li class="active"><a href="{{URL::to('home')}}"><i class="icon-home"></i><span>Home</span> </a> </li>
                        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-table"></i><span>Master</span> <b class="caret"></b></a>
				          <ul class="dropdown-menu">
				            <li><a href="{{URL::to('master/variable')}}">Variable Cost</a></li>
				            <li><a href="{{URL::to('master/employee')}}">Employees</a></li>
				          </ul>
				        </li>
                        <li></li>
                    </ul>

                    <div class="pull-right" style="margin-top: 5px;text-align: right;"   >
                        <h3 id="jam" ></h3>
                        <i id="tgl"></i>
                    </div>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
        <!-- /subnavbar -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        @yield('main-content')
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <!-- /main -->

    </body>
    
</html>
