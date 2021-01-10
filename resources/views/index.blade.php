@extends('layout.layout')
@section('main_content')

	<!--================ Start banner Area =================-->



	<script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"></script>

	<section class="home-banner-area relative">
				@if(session()->has('register_details_updated'))
					<div class="alert alert-success">
					{{session()->get('register_details_updated')}}
					</div>
				@endif
				@if(session()->has('email_exists_google'))
					<div class="alert alert-success">
					{{session()->get('email_exists_google')}}
					</div>
				@endif
				@if(session()->has('verification_done'))
					<div class="alert alert-success">
					{{session()->get('verification_done')}}
					</div>
				@endif
				@if(session()->has('Please_verify_first'))
					<div class="alert alert-success">
					{{session()->get('Please_verify_first')}}
					</div>
				@endif
				@if(session()->has('Already_Login'))
					<div class="alert alert-success">
					{{session()->get('Already_Login')}}
					</div>
				@endif
				@if(session()->has('comment'))
					<div class="alert alert-success">
					{{session()->get('comment')}}
					</div>
				@endif
				@if(session()->has('appointment_set'))
					<div class="alert alert-success">
					{{session()->get('appointment_set')}}
					</div>
				@endif
				@if(session()->has('token_expire'))
					<div class="alert alert-success">
					{{session()->get('token_expire')}}
					</div>
				@endif
				@if(session()->has('pass_chng_success'))
					<div class="alert alert-success">
					{{session()->get('pass_chng_success')}}
					</div>
				@endif
				@if(session()->has('Contact_Send'))
					<div class="alert alert-success">
					{{session()->get('Contact_Send')}}
					</div>
				@endif
				@if(session()->has('passsword_change_done'))
					<div class="alert alert-success">
					{{session()->get('passsword_change_done')}}
					</div>
				@endif
				@if(session()->has('Profile_image_changed'))
					<div class="alert alert-success">
					{{session()->get('Profile_image_changed')}}
					</div>
				@endif
				@if(session()->has('no_image'))
					<div class="alert alert-success">
					{{session()->get('no_image')}}
					</div>
				@endif


				<!-- <div>cookie{{ Cookie::get('register_email') }}</div>
				@if(Session::has('register_email'))
				<div>Session{{ Session::get('register_email') }}</div>
				@endif -->
		<div class="owl-carousel home-banner-owl">
			<div class="banner-img">
				<img class="img-fluid" src="{{asset('barcut/img/banner/b1.jpg')}}" alt="">
				<div class="overlay overlay-bg"></div>
			</div>
			<div class="banner-img">
				<img class="img-fluid" src="{{asset('barcut/img/banner/b2.jpg')}}" alt="">
				<div class="overlay overlay-bg"></div>
			</div>
			<div class="banner-img">
				<img class="img-fluid" src="{{asset('barcut/img/banner/b3.jpg')}}" alt="">
				<div class="overlay overlay-bg"></div>
			</div>
		</div>

		<div class="text-wrapper">
			<h1>
				For All Occasion <br>
				HairStyle is a Must Try Fashion
			</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or <br>
				incididunt ut labore et dolore
				magna aliqua. Ut enim ad minim.
			</p>
			<div class="text-center">
				<a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=-V5_GMuMzc8">
					<span></span>
				</a>
			</div>
			<div class="video-text">
				<p>Watch Intro Video</p>
			</div>
		</div>
	</section>
	<!--================ End banner Area =================-->

	<!--================ Start About Area =================-->
	<section class="section-gap-top about-area">
		<div class="container">
			<div class="single-about row align-items-center">
				<div class="col-lg-4 col-md-6 no-padding about-left">
					<div class="about-content">
						<h1>We Believe that <br> Interior beauty Lasts Long</h1>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
						<a href="{{url('/about')}}" class="primary-btn">Learn More</a>
					</div>
				</div>
				<div class="col-lg-7 col-md-6 text-center no-padding about-right">
					<div class="about-thumb">
						<img src="{{asset('barcut/img/about-img.jpg')}}" class="img-fluid info-img" alt="">
					</div>
				</div>
				<div class="bordered-img">
					<img src="{{asset('barcut/img/about-img2.jpg')}}" class="img-fluid info-img" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--================ End About Area =================-->

	<!--================ Start Service Area =================-->
	<section class="service-area section-gap">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-8 text-center">
					<div class="section-title">
						{{$shop_navbar_info}}
						<h1>What We Can Do for You</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua ad minim veniam</p>
					</div>
				</div>
			</div>
			
			<div class="row">
			@foreach($shop_navbar_info as $shop_data => $images)
				<div class="col-lg-3 col-sm-6 col-md-3 mx-auto">
					<div class="single-service">
						@php
						$dd = explode(',',$images)[0];
						print_r($dd)
						@endphp
						<img class="img-fluid" src='{{asset("home_shop_files/$dd")}}' style='width:100%;height: 340px;' alt="">
						<h4><a href="{{url('special_service',[$shop_data])}}" style='color:white'>{{$shop_data}}</a></h4>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</section>
	<!--================ End Service Area =================-->

	<!--================ Start Catalogue Area =================-->
	<section class="section-gap catalogue-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 offset-lg-1 offset-md-2 col-sm-12 col-md-8">
					<div class="tab-area">
						<div class="tab-contact-wraper" id="horizontalTab">
							<h4>Select Your Style</h4>
							@foreach($shop_navbar_info as $shop_data => $images)
							<div class="jq-tab-content-wrapper">
								<div class="jq-tab-content" data-tab="{{$shop_data}}" style='text-align:center'>
									{{$shop_data}}
								</div>
							</div>
							@endforeach
							<div class="jq-tab-menu d-flex justify-content-around">
							@foreach($shop_navbar_info as $shop_data => $images)
									@php
										$dd = explode(',',$images)[0];
									@endphp

									@if($shop_data == 'Stylish Hair Cutting' )
									<div class="jq-tab-title  " data-tab="{{$shop_data}}"><img src="{{asset('barcut/img/tab/icon1.png')}}" alt=""></div>
									@elseif($shop_data == 'Quality Gel Shave')
									<div class="jq-tab-title deff-bg1" data-tab="{{$shop_data}}"><img src="{{asset('barcut/img/tab/icon2.png')}}" alt=""></div>
									@elseif($shop_data == 'Beard Trimming')
									<div class="jq-tab-title" data-tab="{{$shop_data}}"><img src="{{asset('barcut/img/tab/icon3.png')}}" alt=""></div>
									@else
									<div class="jq-tab-title deff-bg1" data-tab="{{$shop_data}}"><img src="{{asset('barcut/img/tab/icon4.png')}}" alt=""></div>
									@endif
									<!-- <img src='{{asset("shop_files/$dd")}}' style='width:20px;height:20px' alt=""> -->
								@endforeach
								</div>

								<div class="jq-tab-content-wrapper">
									@foreach($shop_navbar_info as $shop_data => $images)
										<div class="jq-tab-content" data-tab="{{$shop_data}}">
											inappropriate behavior is often  laughed off as “boys will be boys,” women face higher conduct standards
											especially in the workplace. That’s why it’s crucial that as women.
											<a href="{{url('gallery')}}" class="view-btn">View Gallery...</a>
										</div>
										
									@endforeach
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Catalogue Area =================-->

	<!--================ Start Team Area =================-->
	<section class="team-area section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center">
					<div class="section-title">
						<h1>We Have All Famous Barbers</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua ad minim veniam</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single member -->
				<div class="col-lg-4 col-md-4">
					<div class="single-team-member">
						<div class="member-img">
							<img class="img-fluid" src="{{asset('barcut/img/team/person1.jpg')}}" alt="">
						</div>

						<div class="proff">
							<h4>Peter Baker</h4>
							<p>Head hair Cut Specialist</p>
						</div>
					</div>
				</div>
				<!-- single member -->
				<div class="col-lg-4 col-md-4">
					<div class="single-team-member">
						<div class="member-img">
							<img class="img-fluid" src="{{asset('barcut/img/team/person2.jpg')}}" alt="">
						</div>
						<div class="proff">
							<h4>Nancy Holmes</h4>
							<p>Spa & Makeup Specialist</p>
						</div>
					</div>
				</div>
				<!-- single member -->
				<div class="col-lg-4 col-md-4">
					<div class="single-team-member">
						<div class="member-img">
							<img class="img-fluid" src="{{asset('barcut/img/team/person3.jpg')}}" alt="">
						</div>
						<div class="proff">
							<h4>Gavin Hansen</h4>
							<p>Hair Styling Expert</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Team Area =================-->

	<!--================Testimonials Area =================-->
	<section class="testimonials-area section-gap-top">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="text-center">
				<img class="quote-img" src="{{asset('barcut/img/testimonial/quote.png')}}" alt="">
			</div>
			<div class="testi-slider owl-carousel" data-slider-id="1">
				
				@foreach($comment_data as $comment_d)
				<div class="item">
					<div class="testi-item">
						<h4>{{$comment_d->shop_name}}</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								{{$comment_d->message}}
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="{{asset('barcut/img/testimonial/t1.png')}}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="{{asset('barcut/img/testimonial/t2.png')}}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="{{asset('barcut/img/testimonial/t3.png')}}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="{{asset('barcut/img/testimonial/t4.png')}}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Testimonials Area =================-->

	<!--================Start Pricing Area =================-->
	<section class="price-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="section-title">
						<h1>Choose Your Package</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua ad minim veniam</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				@foreach($shop_price as $all_shop_data)
					<div class="col-lg-4 col-md-6 text-center mt-4 " >
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
									<!-- <a class="primary-btn price-btn mt-40" onclick='appointment_btn("{{$all_shop_data->id}}","{{$all_shop_data->user_email}}","{{$all_shop_data->shop_name}}")' >Order Now</a> -->
									
								</div>
						</div>
					</div>
				@endforeach
        	</div>
		</div>
	</section>
	<!--================Start Pricing Area =================-->

	<!--================ Start Blog Area =================-->
	<div class="blog-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="section-title">
						<h1>Latest From Blog</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua ad minim veniam</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($shop_blog as $shop_b)
				<div class="col-lg-6 mb-30">
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="single-blog">
								
								<div class="row align-items-center">
									<div class="col-lg-4 col-md-4">
									@php
										$dd = explode(',',$shop_b->images)[0];
										$date = explode(' ',$shop_b->created_at)[0];
									@endphp
									<div class="blog-thumb">
										@if($shop_b->user_type == 'sh')
											<img src='{{asset("shop_files/$dd")}}' style='width:100%' alt="">
											@elseif($shop_b->user_type == 'sfh')
											<img src='{{asset("home_shop_files/$dd")}}' style='width:100%' alt="">
											@else()
											<img src='{{asset("home_shop_files/$dd")}}' style='width:100%' alt="">
										@endif
										</div>

									</div>
									<div class="col-lg-8 col-md-8">
										<div class="blog-details">
											<div class="blog-meta">
												<a href="#"><i class="fa fa-calendar">{{$date}}</i></a>
												<input type="hidden" class='comment_show_id' value="{{$shop_b->id}}">
												<input type="hidden" class='like_show_id' value="{{$shop_b->id}}">
												@if(Session::has('register_email') || Cookie::has('register_email') )
													@if($shop_b->liked_user_email == Session::has('register_email') ||  Cookie::has('register_email') )
													<a href="javascript:void(0);"><i class="fa fa-heart" style='color:red' onclick='like_shop("{{$shop_b->id}}","{{Session::get('register_email')}}")'> <span style='display:none'></span> </i> <span class='show_likes'></span> </a>
													@else
														@if(Session::has('register_email'))
														<a href="javascript:void(0);"><i class="fa fa-heart-o" onclick='like_shop("{{$shop_b->id}}","{{Session::get('register_email')}}")' > <span style='display:none'></span> </i> <span class='show_likes'></span> </a>
														@elseif(Cookie::has('register_email'))
														<a href="javascript:void(0);"><i class="fa fa-heart-o" onclick='like_shop("{{$shop_b->id}}","{{Cookie::get('register_email')}}")' > <span style='display:none'></span> </i> <span class='show_likes'></span> </a>
														@endif
													@endif
												@else
													<a href="javascript:void(0);"><i class="fa fa-heart-o" > <span style='display:none'></span> </i> <span class='show_likes'></span> </a>
												@endif
												<a href="#"><i class="fa fa-comment-o"></i><span class='show_comment'></span></a>
											</div>
											<h4><a class="blog-title text-uppercase" href="#">{{$shop_b->shop_name}}</a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
    <!--================ End Events Area =================-->
    
    @section('footer')
    @endsection
   
	<script>

		$(function(){
			let count = 0;
			let array = [];
			let class_name = document.getElementsByClassName('show_comment');
			$(".comment_show_id").each(function() {
				let value = $(this).val();
				$.ajax({
					url:'{{url("comment_ajax_index")}}',
					type:'get',
					data:{value:value},
					success:function(data){
						array.push(data);
						class_name[0].innerHTML = array[0]
						class_name[1].innerHTML = array[1]
						class_name[2].innerHTML = array[2]
						class_name[3].innerHTML = array[3]
					}
				});
			});
		})

		function like_show(){
			// alert('dd');
			let like_array = [];
			let like_class_name = document.getElementsByClassName('show_likes');
			$(".like_show_id").each(function() {
				let value = $(this).val();
				$.ajax({
					url:'{{url("like_ajax_index")}}',
					type:'get',
					data:{value:value},
					success:function(data){
						// alert(data);
						like_array.push(data);
						like_class_name[0].innerHTML = like_array[0]
						like_class_name[1].innerHTML = like_array[1]
						like_class_name[2].innerHTML = like_array[2]
						like_class_name[3].innerHTML = like_array[3]
					}
				});
			});
		};
		like_show();
		// setInterval(like_shop,10);

		function like_shop(shop_id,email)
		{
			$.ajax({
				url:'{{url("like_shop_user")}}',
				type:'get',
				data:{shop_id:shop_id,email:email},
				success:function(data)
				{
					like_show();
				}
			})
		}


	</script>
@endsection
    
</body>

</html>