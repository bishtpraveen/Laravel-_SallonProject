@extends('layout.layout')

@section('main_content')

<!DOCTYPE html>
<html lang="en">
<head>
<style>
#amount{
  padding-left:20px;
}
</style>
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
        <li class="{{ 'all_appint'  == request()->path() ?  'active' : ''}} nav-link"><a href="{{url('all_appoint')}}"><i class="icon-bar-chart"></i><span>All Appointment</span> </a> </li>
        <!-- <li><a href="guidely.html"><i class="icon-facetime-video"></i><span></span> </a></li> -->
        <!-- <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li> -->
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>More Option</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('view_profile')}}" style='display: block;text-align: center;'>View Profile</a></li>
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
              {{Cookie::get('register_email')}}
              <h3>Your Latest Appointments </h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">
              <div class="pricing-plans plans-3">
                
              </div> <!-- /pricing-plans -->
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
<!-- payment_modal -->
<div class="modal fade in" id="payment_modal" role="dialog" style="display: none;margin-top:200px; padding-right: 17px;">
    <div class="modal-dialog modals-default ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
            <form action="{{url('make_payment')}}" method="post">
            @csrf()
                <label for="">Amount</label>
                <div class='position-relative'>
                <input type="text" class='form-control' name='amount' id='amount' readonly placeholder='Enter Booking Amount' required>
                <i class='fa fa-rupee' style='position: absolute;top: 31%;font-size: 20px;left:5px'></i>
                </div>
                <input type="hidden" class='form-control' name='user_email' id='user_email' readonly>
                <input type="hidden" class='form-control' name='shop_appoint_email' id='shop_appoint_email' readonly>
                <input type="hidden" class='form-control' name='shop_id' id='shop_id' readonly>
                <input type="hidden" class='form-control' name='appoint_date' id='appoint_date' readonly>
                <div class='text-center m-3'>
                <input type="submit" class='btn btn-warning'>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- payment_modal_end -->

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


<!-- custom script -->
<script>

// latest_appointment
      let global_data ='';
  function latest_appointment(){
      let table = '';
      let count = 0;
      $.ajax({
          url:"{{url('latest_appointment_user')}}",
          type:'get',
          success:function(data){
              // alert(data)
            if(data == 'noappointment'){
              table = '<strong>No Appointment</strong>';
            }else
            {
              for(i in data){
                global_data = data;
                  table += "<div class='plan-container'>";
                    table += "<div class='plan'>";

                      table += "<div class='plan-header'>";
                        table += "<div class='plan-title'>"+data[i].shop_appoint_name+"</div>";
                        table += "<div class='plan-price'><h2 class='text-white'>Amount</h2><i class='fa fa-rupee'></i>"+data[i].amount+"</div>";
                      table += "</div>";

                      table += "<div class='plan-features'>";
                        table += "<ul>";
                          table += "<li><strong>Appointment Date</strong></br>"+data[i].appoint_date+"</li>";
                          table += "<li><strong>Appointment Time</strong></br>"+data[i].appoint_time+"</li>";
                          table += "<li><strong>Name Registered</strong></br>"+data[i].appoint_user_name+"</li>";
                        table += "</ul>";
                      table += "</div>";
                      if(data[i].amount == 0)
                      {
                        table += "<div class='plan-actions'><button class='btn btn-block btn-dark'  style='width:83% !important' >Waiting for Response</button></div>";
                      }else
                      {
                        if(data[i].status == '0')
                        {
                          table += "<div class='plan-actions'><button class='btn btn-block btn-secondary' onclick='payment_fn("+data[i].id+")' style='width:83% !important' >Pay Amount</button></div>";
                        }else
                        {
                          table += "<div class='plan-actions'><button class='btn btn-block btn-success' onclick='appointment_data()' style='width:83% !important' >Appointment Done</button></div>";
                        }
                      }
                    table += "</div>";
                  table += "</div>";
                  count++;
              }
            }
              // $('.appointment_count').html(count);
              $('.pricing-plans').html(table);
          }
      })
  };
// latest_appointment_end

// payment fn
  function payment_fn(id)
  {
    for(dd in global_data)
    {
      if(global_data[dd].id == id)
        {
            // alert(global_data[dd].appoint_user_contact)
            $('#amount').val(global_data[dd].amount);
            $('#user_email').val(global_data[dd].appoint_user_email);
            $('#shop_appoint_email').val(global_data[dd].shop_appoint_email);
            $('#shop_id').val(global_data[dd].shop_appoint_id);
            $('#appoint_date').val(global_data[dd].appoint_date);
            $('#payment_modal').modal('show')
        }
    }
  }
// payment fn end

$(function(){
  latest_appointment();
    setInterval(latest_appointment,2000);
  })


</script>
<!-- custom script end -->

</body>
</html>



@section('footer')
@endsection



@endsection
