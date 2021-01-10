@extends('layout.layout')
@section('main_content')

<head>
<link href="{{asset('barcut/css/custom_modal.css')}}" rel="stylesheet"/> 

</head>

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
							<a class="primary-btn price-btn mt-40" onclick='appointment_btn("{{$all_shop_data->id}}","{{$all_shop_data->user_email}}","{{$all_shop_data->shop_name}}")' >Order Now</a>
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
<div class="custom_modal" id="order_modal">
	<div class="custom_modal-dialog">
		<div class="custom_modal-content">

		<!-- Modal Header -->
		<div class="custom_modal-header">
			<h4 class="custom_modal-title">Modal Heading</h4>
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
				<input type="date" placeholder='date' name='appoint_date' value='Date()' class='form-control datepicker ' >
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
			$('.datepicker').blur(function(){
				let date = $(this).val();
				let shop_appoint_email = $('#shop_appoint_email').val();
				let shop_appoint_id = $('#shop_appoint_id').val();
				let appoint_time = $('#appoint_time').val();
				// alert(shop_appoint_email);
				$.ajax({
					url:'{{url("appoint_check")}}',
					type:'get',
					data:{date:date,shop_appoint_email:shop_appoint_email,appoint_time:appoint_time,shop_appoint_id:shop_appoint_id},
					success:function(data){
						if(data == 'exists'){
							$('.error').removeClass('bg-success').addClass('bg-danger').addClass('text-center').addClass('text-white');
							$('.error').html('Please choose some other date and time. This appointment is taken')
							$('#appoint_submit').attr('disabled',true);
						}else{
							$('.error').removeClass('bg-danger').addClass('bg-success').addClass('text-center').addClass('text-white');
							$('.error').html('You can choose this Date and time')
							$('#appoint_submit').attr('disabled',false);
						}	
					}
				})
			})
		})
	})


</script>




@section('footer')
@endsection



@endsection