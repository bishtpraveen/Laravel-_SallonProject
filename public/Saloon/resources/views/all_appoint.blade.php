@extends('layout.layout')

@section('main_content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- <link href="{{asset('user_design/css/bootstrap.min.css')}}" rel="stylesheet"> -->
<link href="{{asset('user_design/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="{{asset('user_design/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('user_design/css/style.css')}}" rel="stylesheet">
<link href="{{asset('user_design/css/pages/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('user_design/css/pages/plans.css')}}" rel="stylesheet"> 

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<style>
.container{
    width:1320px !important;
    max-width: 1340px !important;
}
.span6{
    width:630px; 
}

</style>
<body>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container" style='display:grid'>
      <ul class="mainnav mx-auto">
      <li class="{{ 'my_account'  == request()->path() ?  'active' : ''}} nav-link"><a href="{{url('my_account')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li class="{{ 'user_comment'  == request()->path() ?  'active' : ''}} nav-link"><a href="{{url('user_comment')}}"><i class="icon-list-alt"></i><span>Comments</span> </a> </li>
        <li class="{{ 'all_appoint'  == request()->path() ?  'active' : ''}} nav-link"><a href="{{url('all_appoint')}}"><i class="icon-bar-chart"></i><span>All Appointment</span> </a> </li>
        <!-- <li><a href="guidely.html"><i class="icon-facetime-video"></i><span></span> </a></li> -->
        <!-- <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li> -->
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>More Option</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('view_profile')}}" style='display: block;text-align: center;' >View Profile</a></li>
            <!-- <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li> -->
          </ul>
        </li>
      </ul>
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
        <div class="span12">
          <div class="widget">
            <div class="widget-header">
              <i class="icon-th-large"></i>
              <h3>Your all Appointments </h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">
                    <!-- {{$all_appoint}} -->
                    @if(count($all_appoint) == '0')
                      <div><strong>No appointment</strong></div>
                    @else
                      @foreach($all_appoint as $appoint_data)
                        <div class="plan-container" style='width: 33.3%;'>
                            <div class="plan">
                                <div class="plan-header">
                                    
                                    <div class="plan-title">
                                        {{$appoint_data->shop_appoint_name}}	        		
                                    </div> <!-- /plan-title -->
                                    
                                    <div class="plan-price">
                                    <i class='fa fa-rupee'></i>{{$appoint_data->amount}}<span class="term"></span>
                                    </div> <!-- /plan-price -->
                                    
                                </div> <!-- /plan-header -->	        
                                
                                <div class="plan-features">
                                    <ul>
                                        <li><strong>Appointment Date</strong></br>{{$appoint_data->appoint_date}}</li>
                                        <li><strong>Appointment Time</strong></br>{{$appoint_data->appoint_time}}</li>
                                        <li><strong>Name Registered</strong></br>{{$appoint_data->appoint_user_name}}</li>
                                        <!-- <li>Chat support</li> -->
                                    </ul>
                                </div> <!-- /plan-features -->
                                
                                <!-- <div class="plan-actions">				
                                    <a href="javascript:;" class="btn">Signup Now</a>				
                                </div> /plan-actions -->
                    
                            </div> <!-- /plan -->
                        </div>
                      @endforeach
                    @endif
                </div> <!-- /widget-content -->
            </div> <!-- /widget-content -->
          
          </div> <!-- /widget -->					
        </div> <!-- /span12 -->     	
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{asset('user_design/js/jquery-1.7.2.min.js')}}"></script> 
<script src="{{asset('user_design/js/excanvas.min.js')}}"></script> 
<script src="{{asset('user_design/js/chart.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('user_design/js/bootstrap.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('user_design/js/full-calendar/fullcalendar.min.js')}}"></script>
 
<script src="{{asset('js/base.js')}}"></script> 
<script>     

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }    

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
</script><!-- /Calendar -->


</body>
</html>



@section('footer')
@endsection



@endsection
