@extends('layout.layout')

@section('main_content')

	<!--================ Start banner Area =================-->
	<section class="banner-area relative">
		<div class="banner-img">
			<img class="img-fluid" src="{{asset('barcut/img/banner/b1.jpg')}}" alt="">
			<div class="overlay overlay-bg"></div>
		</div>
		<div class="banner-content text-center">
			<div class="breadcrmb">
				<p>
					<a href="{{url('/')}}">home</a>
					<span class="lnr lnr-arrow-right"></span>
					<a href="{{url('about')}}">about</a>
				</p>
			</div>
			<h1>about us</h1>
		</div>
	</section>
	<!--================ End banner Area =================-->

	<!--================ Start About Area =================-->
	<section class="section-gap about-area">
		<div class="container">
			<div class="single-about row align-items-center">
				<div class="col-lg-4 col-md-6 no-padding about-left">
					<div class="about-content">
						<h1>We Believe that <br> Interior beauty Lasts Long</h1>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
						<a href="" class="primary-btn">Learn More</a>
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

	<!--================ Start Catalogue Area =================-->
	<section class="section-gap catalogue-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 offset-lg-1 offset-md-2 col-sm-12 col-md-8">
					<div class="tab-area">
						<div class="tab-contact-wraper" id="horizontalTab">
							<h4>Select Your Style</h4>
							<p>Shaveing</p>
							<div class="jq-tab-menu justify-content-center">
								<div class="jq-tab-title active" data-tab="1"><img src="{{asset('barcut/img/tab/icon1.png')}}" alt=""></div>
								<div class="jq-tab-title deff-bg1" data-tab="2"><img src="{{asset('barcut/img/tab/icon2.png')}}" alt=""></div>
								<div class="jq-tab-title" data-tab="3"><img src="{{asset('barcut/img/tab/icon3.png')}}" alt=""></div>
								<div class="jq-tab-title deff-bg1" data-tab="4"><img src="{{asset('barcut/img/tab/icon4.png')}}" alt=""></div>
							</div>

							<div class="jq-tab-content-wrapper">
								<div class="jq-tab-content active" data-tab="1">
									inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
									especially in the workplace. That’s why it’s crucial that as women.
									<a href="{{url('gallery')}}" class="view-btn">View Gallery...</a>
								</div>
								<div class="jq-tab-content" data-tab="2">
									inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
									especially in the workplace. That’s why it’s crucial that as women.
									<a href="{{url('gallery')}}" class="view-btn">View Gallery...</a>
								</div>
								<div class="jq-tab-content" data-tab="3">
									inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
									especially in the workplace. That’s why it’s crucial that as women.
									<a href="{{url('gallery')}}" class="view-btn">View Gallery...</a>
								</div>
								<div class="jq-tab-content" data-tab="4">
									inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
									especially in the workplace. That’s why it’s crucial that as women.
									<a href="{{url('gallery')}}" class="view-btn">View Gallery...</a>
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
		
	</section>
	<!--================ End Team Area =================-->

	<!--================Testimonials Area =================-->
	<section class="testimonials-area section-gap-top">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="text-center">
				<img class="quote-img" src="img/testimonial/quote.png" alt="">
			</div>
			<div class="testi-slider owl-carousel" data-slider-id="1">
				<div class="item">
					<div class="testi-item">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
								you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
								you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
								you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
								you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="img/testimonial/t1.png" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="img/testimonial/t2.png" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="img/testimonial/t3.png" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid" src="img/testimonial/t4.png" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Testimonials Area =================-->

	

@section('footer')

@endsection


@endsection
</body>

</html>