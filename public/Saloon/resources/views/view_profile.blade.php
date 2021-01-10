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
        <div class="col-md-8 mx-auto">
            <div class="widget-content">
                <ul class="messages_layout">
                <li class="from_user left float-left w-50"> <a href="#" class="avatar"></a>
                    <div class="message_wrap"> <span class="arrow"></span>
                    <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                            <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#" style='display: block;text-align: center;'data-toggle='modal' data-target='#profile_image'><i class=" icon-share-alt icon-large"></i>Change Profile Image</button> </a></li>
                            <li><a href="#" style='display: block;text-align: center;' data-toggle='modal' data-target='#change_password'><i class=" icon-trash icon-large"></i>  Change Password</button></a></li>
                            </ul>
                        </div>
                        </div>
                    <div class="info" style='border-bottom:1px solid black;'> <a class="name text-uppercase">{{$user_data->name}}</a> <span class="time"></span>
                    <div class="text"> {{$user_data->contact}} </div>
                    <div class="text"> {{$user_data->email}} </div>

                    </div>
                    
                    
                    
                </li>
                <li class="by_myself right float-right w-50"> 
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="text">PRofile Image</div>
                    
                    <img src='{{asset("profile_image/$user_data->profile_image")}}'  class='w-100' >
                    </div>
                   
                  </div>
                </li>
                </ul>
            </div>
        </div>
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->


<!-- profile_image modal -->

  <div class="modal fade" id="profile_image">
    <div class="modal-dialog modal-dialog-centered " >
      <div class="modal-content" >

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center ml-2">
          <form action="{{url('image_change')}}" method="post" enctype='multipart/form-data'>
          @csrf()
            <label for="">Profile Image</label>
            @if(Session::has('register_email'))
            <input type="hidden" value='{{Session::get("register_email")}}' name="email">
            <input type="hidden" value='{{Session::get("provider_user_id")}}' name="provider_user_id" >
            @else
            <input type="hidden" value='{{Cookie::get("register_email")}}' name="email" >
            <input type="hidden" value='{{Cookie::get("provider_user_id")}}' name="provider_user_id" >
            @endif
            <input type="file" name='image_change' class='form-control'>
            <input type="submit">
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<!-- profile_image modal end -->

<!-- change_password modal -->

  <div class="modal fade" id="change_password">
    <div class="modal-dialog modal-dialog-centered " >
      <div class="modal-content" >

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close password_change_btn" data-dismiss="modal" >&times; </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center ml-2 old_password_body">
        <div class="password_error"></div>
            <label for="">Input Old Password</label>
            @if(Session::has('register_email'))
            <input type="hidden" value='{{Session::get("register_email")}}' class="email" >
            <input type="hidden" value='{{Session::get("provider_user_id")}}' class="id">
            @else
            <input type="hidden" value='{{Cookie::get("provider_user_id")}}' class="id">
            <input type="hidden" value='{{Cookie::get("register_email")}}' class="email" >
            @endif
            <input type="password" name='old_password' id='old_password' class='form-control'>
            <input type="submit" class='btn btn-info m-3' onclick='change_password()' >
        </div>
        <div class="modal-body text-center ml-2 new_password_body">
            <label for="">Set New Password</label>
            <div class="same_password_check"></div>
            <form action="{{url('password_change_url')}}" method="post">
            @csrf()
            @if(Session::has('register_email'))
            sess
            <input type="hidden" name='email' value='{{Session::get("register_email")}}'>
            <input type="hidden" name='id' value='{{Session::get("provider_user_id")}}'>
            @else
            <input type="hidden" name='email' value='{{Cookie::get("register_email")}}'>
            <input type="hidden" name='id' value='{{Cookie::get("provider_user_id")}}'>
            @endif
            <label for="">New Password</label>
            <input type="password" name='new_password' id='new_password' class='form-control'>
            <label for="">Confirm Password</label>
            <input type="password" name='confirm_password' id='confirm_password' class='form-control'>
            <input type="submit" class='btn btn-info m-3' id='new_passsword_set'> 
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger password_change_btn" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<!-- change_password modal end -->




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

$(function(){
    // $('#appoint_alert').hide();
    $('.new_password_body').hide();
  })

// password scrpit
function change_password()
  {
    let email_id = $('.email').val();
    let id = $('.id').val();
    let old_password = $('#old_password').val();
    $.ajax({
      url:"{{url('change_password')}}",
      type:'get',
      data:{email_id:email_id,id:id,old_password:old_password},
      success:function(data)
      {
        if(data == 'same')
        {
          $('.old_password_body').slideUp('1000');
          $('.new_password_body').slideDown('1000');
        }
        else
        {
          $('.password_error').addClass('alert').addClass('alert-danger');
          $('.password_error').html('Password not match');
        }
      }
    })
  }
  $('.password_change_btn').click(function(){
    $('.new_password_body').slideUp();
    $('.old_password_body').slideDown();
    $('#old_password').val('');
    $('#new_password').val('');
    $('#confirm_password').val('');
    $('.password_error').html('');
    $('.same_password_check').html('');
    $('.password_error').removeClass('alert').removeClass('alert-danger');
    $('.same_password_check').removeClass('alert').removeClass('alert-danger');
  });

  $('#change_password').modal({
        show: false,
        backdrop: 'static',
        keyboard: false
    })


    $('#confirm_password').keyup(function(){
      let new_password = $("#new_password").val();
      let confirm_password = $('#confirm_password').val();
      if(new_password == confirm_password)
      {
        $('.same_password_check').addClass('alert').addClass('alert-success').removeClass('alert-danger');
        $('.same_password_check').html('Password same');
        $('#new_passsword_set').attr('disabled',false);
      }
      else
      {
        $('.same_password_check').addClass('alert').addClass('alert-danger').removeClass('alert-success');
        $('.same_password_check').html('Password not same');
        $('#new_passsword_set').attr('disabled',true);

      }
    })
// end
</script>





@section('footer')
@endsection



@endsection









