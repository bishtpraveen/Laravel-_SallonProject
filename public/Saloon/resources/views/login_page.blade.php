@extends('layout.layout')

@section('main_content')
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login V15</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="{{asset('barcut/login_vendor/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/fonts/login_fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/fonts/login_fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/login_vendor/animate/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/login_vendor/css-hamburgers/hamburgers.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/login_vendor/animsition/css/animsition.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/login_vendor/select2/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/login_vendor/daterangepicker/daterangepicker.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('barcut/css/login_util.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('barcut/css/login_main.css')}}">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<style>
.error_div{

	position: absolute;
    top: -50px;
    /* z-index: 999999999; */
    /* background: red; */
    left: 30%;
	padding:10px;
	box-shadow: 0px 0px 20px grey;
}

.wrap-login100{
	overflow:inherit !important;
}

</style>

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
		@if(session()->has('login_error'))
			<div class='error_div'>{{session()->get('login_error')}}</div>
		@endif
				<div class="login100-form-title" style="background-image: url(barcut/img/login_images/bg-01.jpg);">
					<span class="login100-form-title-1">
					Sign In
					</span>
				</div>
				<form class="login100-form validate-form" action="{{url('login_url')}}" method='post'>
				@csrf()
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="email" name='email'  placeholder="Enter Email" autofocus>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" autofocus>
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
						Remember me
						</label>
						</div>
						<div>
						<a href="#" onclick='reset_password__modal_btn()' class="txt1">
						Forgot Password?
						</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
						Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--password reset modal -->
<div class="modal" id="reset_password">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Place Appointment</h4>
			<button type="button" class="close" data-dismiss='modal'>&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
				<input type="email" placeholder='Enter your registered Email' class='form-control' id='password_email'>
				<div class=" alert alert-danger "id="error"></div>
				<button onclick="reset_password_btn()" id='verify_btn' class='btn btn-success'>Verify Password</button>
		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
			
			<button type="button" class="btn btn-danger" data-dismiss='modal'>Close</button>
		</div>

		</div>
	</div>
</div>
<!--password reset modal end -->
	<script>
	$(function(){
		$('#verify_btn').attr('disabled',true);
		$('#error').css('display','none');

	})
	function reset_password__modal_btn()
	{
		$('#reset_password').modal('show');
	}
	$('#password_email').keyup(function(){
		let email = $(this).val();
		$('#error').html('');
		$('#error').css('display','none');
		if(email.length > 0 )
		{
			$('#verify_btn').attr('disabled',false);
		}
		else
		{
			$('#verify_btn').attr('disabled',true);
			$('#error').css('display','block');
			$('#error').html('Please fill something');	
		}
	})
	function reset_password_btn()
			{
				let email = $('#password_email').val();
				$.ajax({
					url:"{{url('password_reset_ajax')}}",
					type:'get',
					data:{email},
					success:function(data)
					{
						if(data == 'no_email')
						{
							$('#error').css('display','block');
							$('#error').html('This Email is not registered with us. Please Fill some valid email or register again');
						}
						else
						{
							$('#error').css('display','block');
							$('#error').removeClass('bg-danger').addClass('bg-success');
							$('#error').html('Email Verification is send to your email successfully.');
							setTimeout(function(){ window.location = "{{url('/')}}" }, 2000);
						}

					}
				})
			}
	

	</script>

<script src="{{asset('barcut/login_vendor/jquery/jquery-3.2.1.min.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script src="{{asset('barcut/login_vendor/animsition/js/animsition.min.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script src="{{asset('barcut/login_vendor/bootstrap/js/popper.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>
<script src="{{asset('barcut/login_vendor/bootstrap/js/bootstrap.min.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script src="{{asset('barcut/login_vendor/select2/select2.min.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script src="{{asset('barcut/login_vendor/daterangepicker/moment.min.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>
<script src="{{asset('barcut/login_vendor/daterangepicker/daterangepicker.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script src="{{asset('barcut/login_vendor/countdowntime/countdowntime.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script src="{{asset('barcut/js/login_main.js')}}" type="5c5b75172db7b7beee958dc3-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="5c5b75172db7b7beee958dc3-text/javascript"></script>
<script type="5c5b75172db7b7beee958dc3-text/javascript">
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="5c5b75172db7b7beee958dc3-|49" defer=""></script>
</body>
</html>

@endsection