@extends('layout.layout')
@section('main_content')

<head>
<link href="{{asset('barcut/css/custom_modal.css')}}" rel="stylesheet"/> 

</head>
@if($errors->any())
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast fade show" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
            <strong class="mr-auto">Opps Some fields are missing in your appointment form</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @foreach ($errors->all() as $error)
                <div class="toast-body">
                    <span class='text-danger'>{{ $error }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endif

<section class="price-area section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h1>Choose Your Service</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua ad minim veniam</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach($all_shop as $all_shop_data)
            <div class="col-lg-4 col-md-6 text-center mt-4" >
                <div class="single-price" style='min-height:650px !important'>
                    <div class="top-sec">
                    @if($all_shop_data->user_type == 'sh')
                    <h4 class='widget-wrap popular-post-widget popular-title ' >
                            Saloon Service 
                    </h4>
                    @elseif($all_shop_data->user_type == 'sfh')
                    <h4 class='widget-wrap popular-post-widget popular-title ' >
                            Service From Home 
                    </h4>
                    @else
                    <h4 class='widget-wrap popular-post-widget popular-title ' >
                            Door to Door Service 
                    </h4>
                    @endif
                        <h4 class='text-uppercase' >{{$all_shop_data->shop_name}}</h4>
                        <p>{{$all_shop_data->specillaty_service}}</p>
                    </div>
                    <div class="bottom-sec">
                        <h1><i class="fa fa-rupee"></i> {{$all_shop_data->specillaty_service_amount}}</h1>
                    </div>
                    <div class="end-sec">
							<h2>Services</h2>
							<ul style='width: 71%;display: inline-block;float: left;'>
							@foreach(explode(',', $all_shop_data->shop_services) as $shop_services_data)  
												<li>{{$shop_services_data}}</li>
												@endforeach
							</ul>
							<ul>
							@foreach(explode(',', $all_shop_data->shop_services_amount) as $shop_services_amount_data)  
													<li>{{$shop_services_amount_data}}</li>
												@endforeach
							</ul>
							@if(Session::get('register_email') || Cookie::get('register_email'))
							<a class="primary-btn price-btn mt-40" onclick='appointment_btn("{{$all_shop_data->id}}","{{$all_shop_data->user_email}}","{{$all_shop_data->shop_name}}")' >Book Appointment</a>
							@else
							<a class="primary-btn price-btn mt-40">Please login</a>
							@endif

						</div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>


<!-- modal -->
<div class="custom_modal" id="order_modal" style="z-index:999999999999999999999">
	<div class="custom_modal-dialog">
		<div class="custom_modal-content">

		<!-- Modal Header -->
		<div class="custom_modal-header">
			<h4 class="custom_modal-title">Appointment form</h4>
			<button type="button" class="close" onclick="custom_modal_close()">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="custom_modal-body">
			<form action="{{url('appointment_form')}}" method="post">
			@csrf()
				<label for="">Name</label>
				<input type="text" placeholder='Name' class='form-control' name='appoint_user_name' id='appoint_user_name'>
				<label for="">Email</label>
				@if(Session::has('register_email'))
				<input type="email" placeholder='email' class='form-control' value="{{Session::get('register_email')}}"  name='appoint_user_email' id='appoint_user_email'  readonly>
				@else
				<input type="email" placeholder='email' class='form-control' value="{{Cookie::get('register_email')}}"  name='appoint_user_email' id='appoint_user_email' readonly>
				@endif
				<label for="">Contact</label>
				@if(Session::has('contact'))
				<input type="number" placeholder='email' class='form-control' value="{{Session::get('contact')}}"  name='appoint_user_contact' id='appoint_user_contact'  >
				@else
				<input type="number" placeholder='email' class='form-control' value="{{Cookie::get('contact')}}"  name='appoint_user_contact' id='appoint_user_contact' >
				@endif
				<label for="">Time</label>
				<input type="time" placeholder='Appointment Time' class='form-control' name='appoint_time' id='appoint_time'>
				<input type="hidden" placeholder='Appointment Time' class='form-control' name='shop_appoint_id' id='shop_appoint_id'>
				<input type="hidden" placeholder='Appointment Time' class='form-control' name='shop_appoint_email' id='shop_appoint_email'>
				<input type="hidden" placeholder='Appointment Time' class='form-control' name='shop_appoint_name' id='shop_appoint_name'>
				<label for="">Appoint Date</label>
				@php
				$today = date('Y-m-d');
                $lastdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 5, date('Y')));
				@endphp
				<input type="date" placeholder='date' id="appoint_date" name='appoint_date' min=<?php echo $today?>  max="<?php echo $lastdate?>" class='form-control datepicker ' disabled>
				<!-- <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
					<input class="form-control" type="text" name='appoint_date' id='appoint_date'/>
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div> -->
				<div class='text-center mt-3 mb-3'>
				<div class="error"> </div>
				@if(Session::has('register_email'))
				<input type="submit" id='appoint_submit' class='genric-btn link-border radius' value='Appointment'>
				@else
				<p>Please Login To place a Appointment</p>
 				@endif
				</div>
			</form>
		</div>

		<!-- Modal footer -->
		<div class="custom_modal-footer">
			
			<button type="button" class="btn btn-danger" onclick="custom_modal_close()">Close</button>
		</div>

		</div>
	</div>
</div>
<!-- modal end -->

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    function appointment_btn(shop_id,shop_email,shop_name)
    {
		// alert(shop_id)
		// alert(shop_email);
		$('#shop_appoint_id').val(shop_id);
		$('#shop_appoint_email').val(shop_email);
		$('#shop_appoint_name').val(shop_name);
		$('.custom_modal').css('display','block');
	}
    function custom_modal_close()
    {
		$('#appoint_user_name').val();
		$('#shop_appoint_id').val();
		$('#shop_appoint_email').val();
		$('#appoint_time').val();
		$('#shop_appoint_name').val();
		$('.custom_modal').css('display','none');

	}

	$(function(){
		$('#appoint_time').blur(function(){
			let inputTime = $('#appoint_time').val();
			if(inputTime == ''){
				$('.error').removeClass('bg-success').addClass('bg-danger').addClass('text-center').addClass('text-white');
				$('.error').html('Please fill time then choose date')
				return false;
			}
			$.ajax({
				url:'{{url("check_time")}}',
				type:'get',
				data:{inputTime:inputTime},
				success:function(data){
					if(data == 'not_valid_time'){
						$('.error').removeClass('bg-success').addClass('bg-danger').addClass('text-center').addClass('text-white');
						$('.error').html('This Time is not valid')
						$('#appoint_submit').attr('disabled',true);
						$('#appoint_date').attr('disabled',true);
					}else{
						$('.error').removeClass('bg-danger').addClass('bg-success').addClass('text-center').addClass('text-white');
						$('.error').html('You can choose this time')
						$('#appoint_submit').attr('disabled',false);
						$('#appoint_date').attr('disabled',false);
					}	
				}
			})
		})
	})
	$('.datepicker').blur(function(){
		let date = $(this).val();
		let shop_appoint_email = $('#shop_appoint_email').val();
		let shop_appoint_id = $('#shop_appoint_id').val();
		let appoint_time = $('#appoint_time').val();
		if(date == '' || appoint_time == '' ){
			alert('date time is required')
			return false
		}
		// alert(shop_appoint_email);
		$.ajax({
			url:'{{url("appoint_check")}}',
			type:'get',
			data:{date:date,shop_appoint_email:shop_appoint_email,appoint_time:appoint_time,shop_appoint_id:shop_appoint_id},
			success:function(data){
				if(data == 'exists'){
					$('.error').removeClass('bg-success').addClass('bg-danger').addClass('text-center').addClass('text-white');
					$('.error').html('Please choose some other date. The appointment is taken at this dates')
					$('#appoint_submit').attr('disabled',true);
				}else{
					$('.error').removeClass('bg-danger').addClass('bg-success').addClass('text-center').addClass('text-white');
					$('.error').html('You can choose this Date')
					$('#appoint_submit').attr('disabled',false);
				}	
			}
		})
	})


</script>




@section('footer')
@endsection



@endsection