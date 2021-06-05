<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('barcut/img/fav.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="Robin Singh">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Good Look</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:400,500,500i" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{asset('barcut/css/linearicons.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/availability-calendar.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('barcut/css/main.css')}}">
	
	<style>
/* search btn design */
	.wrap {
	/* background: linear-gradient(to bottom right, #274B74 0%, #8233C5 50%, #E963FD 100%); */
	position:relative;
	display: flex;
	justify-content: center;
	align-items: center;
	}

	.js-search {
	position: relative;
	padding: 15px 40px 15px 20px;
	width: 20px;
	color: #525252;
	text-transform: uppercase;
	font-size: 16px;
	font-weight: 100;
	letter-spacing: 2px;
	border:none;
	border-bottom: 1px solid black;
	border-left: 1px solid black;
	border-right: 1px solid black;
	border-radius: 5px;
	background: linear-gradient(to right, #FFFFFF 0%, #464747 #F9F9F9 100%);
	transition: width 0.4s ease;
	outline: none;
	}
	.js-search:focus {
	width: 300px;
	}

	.fa-search {
	position: relative;
	left: -37px;
	color: #8233C5;
	}

	.social {
	position: absolute;
	right: 35px;
	bottom: 35px;
	}
	.social img {
	display: block;
	width: 32px;
	}
	.search_output{
		position:absolute;
		z-index:9999999999999999999 !important;
		padding: 20px;
    	background: #e0d6d6d4;
    	top: 57px;
    	width: 80%;
		display:none;
	}
/* end */
	</style>
</head>
<body>

	<!--================ Start Header Area =================-->
	<header class="header-area">
		<div class="container position-relative" >
			<div class="header-wrap">
				<div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
					<div class="col menu-left">
						@if(session()->has('Login_required'))
							<a href="{{url('/')}}"><span class="pulse">{{session()->get('Login_required')}}</span></a>
						@endif
						<a class="{{ '/'  == request()->path() ?  'active' : ''}}" href="{{url('/')}}">Home</a>
						<a class="{{ 'about'  == request()->path() ?  'active' : ''}}" href="{{url('about')}}">about</a>
						<!-- <a class="{{ 'barbers'  == request()->path() ?  'active' : ''}}" href="{{url('barbers')}}">barbers</a> -->
						<a class="{{ 'gallery'  == request()->path() ?  'active' : ''}}" href="{{url('gallery')}}">gallery</a>
					</div>
					<div class="col-3 logo">
						<a href="{{url('/')}}"><img class="mx-auto" src="{{asset('barcut/img/logo_png.png')}}" alt=""></a>
					</div>
					<nav class="col navbar navbar-expand-lg justify-content-end">

						<!-- Toggler/collapsibe Button -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
							<span class="lnr lnr-menu"></span>
						</button>

						<!-- Navbar links -->
						<div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
							<ul class="navbar-nav justify-content-center w-100 ">
								<li class="nav-item hide-lg">
									<a class="{{ '/'  == request()->path() ?  'active' : ''}} nav-link" href="{{url('/')}}">Home</a>
								</li>
								<li class="nav-item hide-lg">
									<a class="{{ 'about'  == request()->path() ?  'active' : ''}} nav-link" href="{{url('about')}}">about</a>
								</li>
								<li class="nav-item">
									<a class="{{ 'pricing'  == request()->path() ?  'active' : ''}} nav-link" href="{{url('pricing')}}">pricing</a>
								</li>
								<li class="nav-item hide-lg">
									<a class="{{ 'barbers'  == request()->path() ?  'active' : ''}} nav-link" href="{{url('barbers')}}">barbers</a>
								</li>
								<li class="nav-item hide-lg">
									<a class="{{ 'gallery'  == request()->path() ?  'active' : ''}} nav-link" href="{{url('gallery')}}">gallery</a>
								</li>
								<!-- Dropdown -->
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
										Special Services
									</a>
									<div class="dropdown-menu">
										@foreach($shop_navbar_info as $link_data => $images)
										<a class="dropdown-item" href="{{url('special_service',[$link_data])}}">{{$link_data}}</a>
										<!-- <a class="dropdown-item" href="{{url('elements')}}">Elements</a> -->
										@endforeach
									</div>
								</li>
								<!-- <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
										Blog
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{url('blog')}}">Blog</a>
										<a class="dropdown-item" href="{{url('blog_details')}}">Blog Detail</a>
									</div>
								</li> -->
								<li class="nav-item">
									<a class="{{ 'contact'  == request()->path() ?  'active' : ''}} nav-link" href="{{url('contact')}}">Contact</a>
								</li>
								<li class="nav-item dropdown mt-2">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
										<i class='fa fa-user'></i>
									</a>
									<div class="dropdown-menu">
									@if( (Session::has('register_email')) || (Cookie::has('register_email')) )
										<a class="dropdown-item" href="{{url('my_account')}}">My Account</a>
										<a class="dropdown-item" href="{{url('logout')}}">Logout</a>
									@else
										<a class="dropdown-item" href="{{url('register')}}">Register</a>
										<a class="dropdown-item" href="{{url('login')}}">Login</a>
									@endif
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- <div class="wrap">
				<input placeholder='Search for shop...' class='js-search' type="text">
				<i class="fa fa-search"></i>
			<div class="search_output">
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>S no</th>
						<th>Shop Name</th>
						<th>Address</th>
						<th>Contact</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody class='search_table'>
				
				</tbody>
			</table>
			</div>
			</div> -->
		</div>
	</header>
    <!--================ End Header Area =================-->
    
    @yield('main_content')





    <!--================ Start Footer Area =================-->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row footer-inner">
				<div class="col-lg-5 col-sm-6">
					<aside class="f-widget">
						<div class="f-title">
							<h3>About Me</h3>
						</div>
						<p>Do you want to be even more successful? Learn to love learning and growth. The more effort you put into
							improving your skills,</p>

					</aside>
				</div>
				<div class="col-lg-5 col-sm-6">
					<aside class="f-widget news-widget">
						<div class="f-title">
							<h3>Newsletter</h3>
						</div>
						<p>Stay updated with our latest trends</p>
						<div id="mc_embed_signup">
						</div>
					</aside>
				</div>
				<div class="col-lg-2">
					<aside class="f-widget social-widget">
						<div class="f-title">
							<h3>Follow Me</h3>
						</div>
						<p>Let us be social</p>
						<ul class="list">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</aside>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 ab-widget">
					<p>
					Copyright &copy;<script>
					document.write(new Date().getFullYear()); </script> 
					All rights reserved | <a href="https://er-robin-resume.zyrosite.com/">Robin Singh</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area =================-->



	<script src="{{('barcut/js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{('barcut/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{('barcut/js/owl.carousel.min.js')}}"></script>
	<script src="{{('barcut/js/owl-carousel-thumb.min.js')}}"></script>
	<script src="{{('barcut/js/jquery.sticky.js')}}"></script>
	<script src="{{('barcut/js/jquery.tabs.min.js')}}"></script>
	<script src="{{('barcut/js/parallax.min.js')}}"></script>
	<script src="{{('barcut/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{('barcut/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{('barcut/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{('barcut/js/jquery.magnific-popup.min.js')}}"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{('barcut/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{('barcut/js/main.js')}}"></script>


<script>
$('.js-search').keyup(function(){
	let value = $(this).val();
	table = '';
	count =1;
	$.ajax({
		url:'{{url("search_link")}}',
		type:'get',
		data:{value:value},
		success:function(data)
		{
			for(dd in data)
			{
				table += '<tr>';
				table += '<td>'+count+'</td>';
				table += '<td class="text-uppercase">'+data[dd].shop_name+'</td>';
				table += '<td class="text-uppercase">'+data[dd].address+'</td>';
				table += '<td class="text-uppercase">'+data[dd].shop_contact+'</td>';
				table += '<td class="text-uppercase">'+data[dd].user_email+'</td>';
				table += '</tr>';
				count++;
			}
			// $('.search_output').show('1000');
			$('.search_output').slideDown('1000');
			$('.search_table').html(table);
		}
	})
})
$(".js-search").focusout(function(){
  $('.search_output').slideUp("1000");
});

</script>
    
    @yield('footer')
    