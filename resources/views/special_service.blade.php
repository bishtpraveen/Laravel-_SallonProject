@extends('layout.layout')

@section('main_content')

<!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
<link href="{{asset('barcut/custom_modal')}}" rel="stylesheet" type="text/css" /> 

<style>
.comment-form{
	display:none;
}
.comments-area .btn-reply{
	padding: 0px 15px !important; 
}
/* custom_modal */
	.custom_modal-open {
		overflow: hidden
	}

	.custom_modal-open .modal {
		overflow-x: hidden;
		overflow-y: auto
	}

	.custom_modal {
		position: fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1050;
		display: none;
		overflow: hidden;
		outline: 0;
		background:#808080d1;
	}

	.custom_modal-dialog {
		position: sticky;
		top: 150px;
		width: auto;
		margin: .5rem;
		pointer-events: none
	}

	.custom_modal.fade .custom_modal-dialog {
		transition: -webkit-transform .3s ease-out;
		transition: transform .3s ease-out;
		transition: transform .3s ease-out, -webkit-transform .3s ease-out;
		-webkit-transform: translate(0, -25%);
		transform: translate(0, -25%)
	}

	@media screen and (prefers-reduced-motion:reduce) {
		.custom_modal.fade .custom_modal-dialog {
			transition: none
		}
	}

	.custom_modal.show .custom_modal-dialog {
		-webkit-transform: translate(0, 0);
		transform: translate(0, 0)
	}

	.custom_modal-dialog-centered {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		min-height: calc(100% - (.5rem * 2))
	}

	.custom_modal-dialog-centered::before {
		display: block;
		height: calc(100vh - (.5rem * 2));
		content: ""
	}

	.custom_modal-content {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		width: 100%;
		pointer-events: auto;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid rgba(0, 0, 0, .2);
		border-radius: .3rem;
		outline: 0
	}

	.custom_modal-backdrop {
		position: fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1040;
		background-color: #000
	}

	.custom_modal-backdrop.fade {
		opacity: 0
	}

	.custom_modal-backdrop.show {
		opacity: .5
	}

	.custom_modal-header {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: start;
		align-items: flex-start;
		-ms-flex-pack: justify;
		justify-content: space-between;
		padding: 1rem;
		border-bottom: 1px solid #e9ecef;
		border-top-left-radius: .3rem;
		border-top-right-radius: .3rem
	}

	.custom_modal-header .close {
		padding: 1rem;
		margin: -1rem -1rem -1rem auto
	}

	.custom_modal-title {
		margin-bottom: 0;
		line-height: 1.5
	}

	.custom_modal-body {
		position: relative;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		padding: 1rem
	}

	.custom_modal-footer {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		-ms-flex-pack: end;
		justify-content: flex-end;
		padding: 1rem;
		border-top: 1px solid #e9ecef
	}

	.custom_modal-footer>:not(:first-child) {
		margin-left: .25rem
	}

	.custom_modal-footer>:not(:last-child) {
		margin-right: .25rem
	}

	.custom_modal-scrollbar-measure {
		position: absolute;
		top: -9999px;
		width: 50px;
		height: 50px;
		overflow: scroll
	}

	@media (min-width:576px) {
		.custom_modal-dialog {
			max-width: 500px;
			margin: 1.75rem auto
		}
		.custom_modal-dialog-centered {
			min-height: calc(100% - (1.75rem * 2))
		}
		.custom_modal-dialog-centered::before {
			height: calc(100vh - (1.75rem * 2))
		}
		.custom_modal-sm {
			max-width: 300px
		}
	}

	@media (min-width:992px) {
		.custom_modal-lg {
			max-width: 800px
		}
	}
/* custom_modal_end */


</style>
<!--================ Start banner Area =================-->


<section class="banner-area relative">
	<div class="banner-img">
		<img class="img-fluid" src="{{asset('barcut/img/banner/banner-bg.jpg')}}" alt="">
		<div class="overlay overlay-bg"></div>
	</div>
	<div class="banner-content text-center">
		<div class="breadcrmb">
			<p>
				<a href="{{url('/')}}">home</a>
				<span class="lnr lnr-arrow-right"></span>
				<a href="#">Blog</a>
				<span class="lnr lnr-arrow-right"></span>
				<a href="#">Details</a>
			</p>
		</div>
		<h1>Blog Details</h1>
	</div>
</section>
	<!--================ End banner Area =================-->
	@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Some fields are missing in your appointment form</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area section-gap">
		<div class="container">
			<div class="row" >
			<!-- shop data and comment section -->
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<!-- specific shop data  -->
							@foreach($special_service as $special_service_data)
							<div class='row ' style='margin-top: 50px;min-height: 400px;'>
							@if($special_service_data->user_type == 'sfh')
									<div class='col-md-12 alert alert-info d-flex align-items-center' >
										Service From Home 
									</div>
									@endif
								<div class="col-lg-3  col-md-3 meta-details ">
									<!-- <ul class="tags">
										<li><a href="#">Food,</a></li>
										<li><a href="#">Technology,</a></li>
										<li><a href="#">Politics,</a></li>
										<li><a href="#">Lifestyle</a></li>
									</ul> -->
									<div class="user-details row">
									
										<p class="user-name col-lg-12 col-md-12 col-6 d-flex justify-content-between">	<span class="lnr lnr-user mt-1" style='font-size:10px'>		(Qwner)</span>		<a href="#"><strong style='text-transform: capitalize;'>{{$special_service_data->owner_name}}</strong></a></p>
										<p class="date col-lg-12 col-md-12 col-6 px-0 d-flex justify-content-between">		<span class="lnr lnr-apartment" style='font-size:10px'>	(Address)</span>	<a href="#"><strong style='text-transform: capitalize;'>{{$special_service_data->address}}</strong></a> </p>
										<p class="view col-lg-12 col-md-12 col-6 d-flex justify-content-between">		<span class="lnr lnr-eye" style='font-size:10px'>				(Shop Type)</span>	<a href="#"><strong style='text-transform: capitalize;'>{{$special_service_data->shop_type}}</strong></a> </p>
										<p class="comments col-lg-12 col-md-12 col-6 d-flex justify-content-between">	<span class="lnr lnr-bubble" style='font-size:10px'>			(Employee's)</span>	<a href="#"><strong style='text-transform: capitalize;'>{{$special_service_data->employ_number}}</strong></a> </p>
										
										<div class="comments-area reply-btn mb-2" style='padding:2px!important;margin-top:0px !important;margin-left: 32px;'>
											<h5  onclick='comment_section("{{$special_service_data->id}}","{{$special_service_data->user_email}}","{{$special_service_data->shop_name}}")' class="btn-reply text-uppercase;" style='text-align: center;font-size: 14px;padding: 10px !important;cursor:pointer'>Leave a comment<h5>
										</div>
										<ul class="social-links col-lg-12 col-md-12 col-6">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-github"></i></a></li>
											<li><a href="#"><i class="fa fa-behance"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20 special_service_data" id='shop_name' style='text-transform: uppercase;'>{{$special_service_data->shop_name}}</h3>
									<div class="shop_content">
									@foreach(explode(',', $special_service_data->images) as $info) 
										@if($special_service_data->user_type == 'sh')
											<img src = '{{asset("shop_files/$info")}}' style='width:49% !important;height:210px !important;max-width: none; margin-top:10px;'>
											@elseif($special_service_data->user_type == 'sfh')
											<img src = '{{asset("home_shop_files/$info")}}' style='width:49% !important;height:210px !important;max-width: none; margin-top:10px;'>
											@else
											<img src = '{{asset("home_shop_files/$info")}}' style='width:49% !important;height:210px !important;max-width: none; margin-top:10px;'>
										@endif
									
									@endforeach	
									<!-- <p>
									<table class='table table-bordered' id='service_table'>
										<thead>

										</thead>
										<tbody>
												<tr>
													<th style='border-right: 2px solid;padding: 30px;'>Services</td>
												@foreach(explode(',', $special_service_data->shop_services) as $shop_services_data)  
												<td>{{$shop_services_data}}</td>
												@endforeach
											</tr>
											<tr>
											<th style='border-right: 2px solid;padding: 30px;'>Amount</th>
											@foreach(explode(',', $special_service_data->shop_services_amount) as $shop_services_amount_data)  
													<td>{{$shop_services_amount_data}}</td>
												@endforeach
											</tr>
										</tbody>
									</table>
									</p> -->
									</div>
								</div>
							</div>
							@endforeach
						<!-- specific shop data end -->
						
					</div>
				<!-- comment section -->
					<div class="comment-form">
						<h4>Leave a Comment</h4>
						<form action="{{url('comment_send')}}" method='post'>
						@csrf()
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-12 name">
									<input type="text" class="form-control" name='user_name' id="user_name" placeholder="Enter Name" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Enter Name'">
								</div>
								<div class="form-group col-lg-6 col-md-12 email">
									<input type="email" class="form-control" name='user_email' id="user_email" placeholder="Enter email address" value="{{Cookie::get('register_email') }}{{ Session::get('register_email')}}" readonly onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Enter email address'">
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name='subject' id="subject" placeholder="Subject" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Subject'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name='shop_id'  id="shop_id" hidden >
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name='shop_name'  id="comment_shop_name" hidden >
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name='shop_email'  id="shop_email" hidden >
							</div>
							<div class="form-group">
								<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Messege'" required=""></textarea>
							</div>
							<input type="submit" class="primary-btn" value='Post Comment'>
						</form>
					</div>
				<!-- comment section ends -->
				</div>
			<!-- end -->
			<!-- pricing -->
			<div class="col-lg-4 sidebar-widgets">
			@foreach($special_service as $special_service_data)
				<div class="col-lg-12 col-md-6 text-center" style='max-height:650px'>
					<div class="single-price">
						<div class="top-sec">
							<h4>{{$special_service_data->specillaty_service}}</h4>
							<p>Specillaty</p>
						</div>
						<div class="bottom-sec">
							<h1> <i class="fa fa-rupee"></i> {{$special_service_data->specillaty_service_amount}}</h1>
						</div>
						<div class="end-sec">
							<h2>Services</h2>
							<ul style='width: 71%;display: inline-block;float: left;'>
							@foreach(explode(',', $special_service_data->shop_services) as $shop_services_data)  
												<li>{{$shop_services_data}}</li>
												@endforeach
							</ul>
							<ul>
							@foreach(explode(',', $special_service_data->shop_services_amount) as $shop_services_amount_data)  
													<li>{{$shop_services_amount_data}}</li>
												@endforeach
							</ul>
							<a class="primary-btn price-btn mt-40" style="letter-spacing:1px !important" onclick='appointment_btn("{{$special_service_data->id}}","{{$special_service_data->user_email}}","{{$special_service_data->shop_name}}")' >Book Appointment</a>
							
						</div>
					</div>
				</div>
			@endforeach
			
					<!-- <div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
								<input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget user-info-widget">
							<img src="img/blog/user-info.png" alt="">
							<a href="#">
								<h4>Charlie Barber</h4>
							</a>
							<p>
								Senior blog writer
							</p>
							<ul class="social-links">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
							<p>
								Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend
								money on boot
								camp when you can get. Boot camps have itssuppor ters andits detractors.
							</p>
						</div>
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Popular Posts</h4>
							<div class="popular-post-list">
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Space The Final Frontier</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp2.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>The Amazing Hubble</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp3.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Astronomy Or Astrology</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp4.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Asteroids telescope</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
							</div>
						</div>
						<div class="single-sidebar-widget ads-widget">
							<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
						</div>
						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Post Catgories</h4>
							<ul class="cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
						</div>
						<div class="single-sidebar-widget newsletter-widget">
							<h4 class="newsletter-title">Newsletter</h4>
							<p>
								Here, I focus on a range of items and features that we use in life without giving them a second thought.
							</p>
							<div class="form-group d-flex flex-row">
								<div class="col-autos">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
										</div>
										<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
										 onblur="this.placeholder = 'Enter email'">
									</div>
								</div>
								<a href="#" class="bbtns">Subcribe</a>
							</div>
							<p class="text-bottom">
								You can unsubscribe at any time
							</p>
						</div>
						<div class="single-sidebar-widget tag-cloud-widget">
							<h4 class="tagcloud-title">Tag Clouds</h4>
							<ul>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Architecture</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Art</a></li>
								<li><a href="#">Adventure</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Adventure</a></li>
							</ul>
						</div>
					</div> -->
				</div>
			<!--pricing end -->
			</div>
		</div>
		
	</section>
	<!-- End post-content Area -->
	



@section('footer')


@endsection

<script>

	function comment_section(id,email,comment_shop_name){
		$('.comment-form').show();
		$('html,body').animate({
        scrollTop: $(".comment-form").offset().top},
		'slow');
		$('#shop_id').val(id);
		$('#comment_shop_name').val(comment_shop_name);
		$('#shop_email').val(email);

	}

	function appointment_btn(shop_id,shop_email,shop_name){
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
	
	var enableDates = ['15/4/2020','16/4/2020','17/4/2020','18/4/2020','19/4/2020','20/4/2020'];
	$(function () {
		$("#datepicker").datepicker({ 
			autoclose: true, 
			todayHighlight: true,
			beforeShowDay: function(date) {
				var currentDate =
				date.getDate() + '/' +
				(date.getMonth() + 1) +
				'/' + date.getFullYear();
				// alert(currentDate)
				return (enableDates.indexOf(currentDate) != -1)
			}
		}).datepicker('update', new Date());
	});

	// $('#datepicker').datepicker({
	//   format: "dd/mm/yyyy",
	//   autoclose: true,
	//   beforeShowDay: function(date) {
	//     var currentDate =
	//       date.getDate() + '/' +
	//       (date.getMonth() + 1) +
	//       '/' + date.getFullYear();
	//     return (enableDates.indexOf(currentDate) != -1)
	//   }
	// });

	// $(function(){

	// $('#datepicker').datepicker({
	// 	let ss = $(this).datepicker("getDate");
	// 	alert(ss)
	// 	});
	// })

	$(function(){
		$('#appoint_time').blur(function(){
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



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<!-- modal -->
		@php
			$today_date = date('Y-m-d');
			$last_date = date('Y-m-d',mktime(0,0,0,date('m'),date('d')+5,date('Y')));
		@endphp
<div class="custom_modal" id="order_modal">
	<div class="custom_modal-dialog">
		<div class="custom_modal-content">

		<!-- Modal Header -->
		<div class="custom_modal-header">
			<h4 class="custom_modal-title">Place Appointment</h4>
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
				<input type="number" placeholder='email' class='form-control' value="{{Session::get('contact')}}"  name='appoint_user_contact' id='appoint_user_email'  >
				@else
				<input type="number" placeholder='email' class='form-control' value="{{Cookie::get('contact')}}"  name='appoint_user_contact' id='appoint_user_email' >
				@endif
				<label for="">Time</label>
				<input type="time" placeholder='Appointment Time' class='form-control' name='appoint_time' id='appoint_time'>
				<input type="hidden" placeholder='Appointment Time' class='form-control' name='shop_appoint_id' id='shop_appoint_id'>
				<input type="hidden" placeholder='Appointment Time' class='form-control' name='shop_appoint_email' id='shop_appoint_email'>
				<input type="hidden" placeholder='Appointment Time' class='form-control' name='shop_appoint_name' id='shop_appoint_name'>
				<label for="">Appoint Date</label>
				<input type="date" min='{{$today_date}}' max='{{$last_date}}'   name='appoint_date' id='appoint_date' class='form-control datepicker' >
				<!-- <input type="date" placeholder='date' name='appoint_date' min="2020-05-1" max='2020-06-30' value='Date()' class='form-control  ' > -->
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

<script>
// 	$('input.date-pick').datepicker().on('change', function (ev) {
//    var firstDate = $(this).val();
//    alert(firstDate);
// });


</script>


<!-- modal end -->
@endsection