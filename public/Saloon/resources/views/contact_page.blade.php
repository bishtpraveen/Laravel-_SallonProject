@extends('layout.layout')
@section('main_content')




<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

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
					<a href="{{url('contact')}}">Contact</a>
				</p>
			</div>
			<h1>Contact Us</h1>
		</div>
	</section>
	<!--================ End banner Area =================-->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row">
                <div class="map-wrap" style="width:100%; height: 445px;" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.0561195237124!2d76.69247711559801!3d30.716822693449213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fee5a42944be3%3A0xb713d3a3e26a89c1!2sSachTech%20Solution%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1588854550284!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>Mohali, Punjab</h5>
							<p>
								Mohali Airport Road
							</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5>1234567890</h5>
							<!-- <p>Mon to Fri 9am to 6 pm</p> -->
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>workproject960@gmail.com</h5>
							<p>Send us your query anytime!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form class="form-area contact-form text-right" id="contactform" action="{{url('contact_form')}}" method="post">
                        @csrf()
						<div class="row">
							<div class="col-lg-6 form-group">
								<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
								 class="common-input mb-20 form-control" required="" type="text">

								<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
								 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control"
								 required="" type="email">
                                 <!-- {{$all_shop}} -->
                                 <select name="shop_data" id="" class="common-input mb-20 form-control">
                                     @foreach($all_shop as $single_shop)
                                    <option value="{{$single_shop->id}},{{$single_shop->shop_name}}">{{$single_shop->shop_name}}</option>
                                    @endforeach
                                </select>

								<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
								 class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-6 form-group">
								<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
							</div>
							<div class="col-lg-12">
								<div class="alert-msg" style="text-align: left;"></div>
								<button class="primary-btn text-uppercase" id='submit_contact' style="float: right;">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
    <!-- End contact-page Area -->
    <script>

        $('#submit_contact').click(function(){
            $('#contactform').submit();
        })  

    </script>

@section('footer')
@endsection





@endsection