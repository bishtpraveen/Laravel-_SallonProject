<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome {{Session::get('register_name')}} {{Cookie::get('register_name')}} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style -->
        <!-- favicon
            ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Google Fonts
            ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/bootstrap.min.css')}}">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/font-awesome.min.css')}}">
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('service_provider/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('service_provider/css/owl.transitions.css')}}">
        <!-- meanmenu CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/meanmenu/meanmenu.min.css')}}">
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/animate.css')}}">
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/normalize.css')}}">
        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
        <!-- jvectormap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
        <!-- notika icon CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/notika-custom-icon.css')}}">
        <!-- wave CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/wave/waves.min.css')}}">
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/main.css')}}">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/style.css')}}">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('service_provider/css/responsive.css')}}">
        <!-- modernizr JS
            ============================================ -->
        <script src="{{asset('service_provider/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- style end -->
    <style>
    .hd-mg-tt  a:hover
    {
        background: #8080806b;
    }
    </style>
</head>

<body>

    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <!-- <a href="#"><img src="{{asset('service_provider/img/logo/logo.png')}}" alt="" /></a> -->
                        <a href="{{url('/')}}"><img src="{{asset('barcut/img/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <!-- <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li> -->
                            <!-- <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-mail"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Messages</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li> -->
                            <!-- <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>3</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li> -->
                            <!-- <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>2</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Tasks</h2>
                                    </div>
                                    <div class="hd-message-info hd-task-info">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>HTML5 Validation Report</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>Google Chrome Extension</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>Social Internet Projects</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="75%" style="width: 75%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>75%</span> </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>Bootstrap Admin</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="93%" style="width: 65%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>65%</span> </div>
                                            </div>
                                            <div class="progress progress-bt">
                                                <div class="lead-content">
                                                    <p>Youtube App</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="55%" style="width: 55%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>55%</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li> -->
                            <!-- <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-chat"></i></span></a> -->
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <a href="#" style='color:black;border-bottom: 1px solid #917a7a;padding: 5px;' data-toggle='modal' data-target='#profile_image'> Change Profile Image</a>
                                        <a href="#" style='color:black;border-bottom: 1px solid #917a7a;padding: 5px;' data-toggle='modal' data-target='#change_password'> Change Password </a>
                                        <a href="{{url('logout')}}" style='color:black;border-bottom: 1px solid #917a7a;padding: 5px;'> Logout </a>
                                    </div>
                                    <!-- <div class="search-people">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" placeholder="Search People" />
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Last seen 3 hours ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Last seen 2 minutes ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home
                                </a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard One</a></li>
                                        <li><a href="index-2.html">Dashboard Two</a></li>
                                        <li><a href="index-3.html">Dashboard Three</a></li>
                                        <li><a href="index-4.html">Dashboard Four</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="view-email.html">View Email</a></li>
                                        <li><a href="compose-email.html">Compose Email</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="animations.html">Animations</a></li>
                                        <li><a href="google-map.html">Google Map</a></li>
                                        <li><a href="data-map.html">Data Maps</a></li>
                                        <li><a href="code-editor.html">Code Editor</a></li>
                                        <li><a href="image-cropper.html">Images Cropper</a></li>
                                        <li><a href="wizard.html">Wizard</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="flot-charts.html">Flot Charts</a></li>
                                        <li><a href="bar-charts.html">Bar Charts</a></li>
                                        <li><a href="line-charts.html">Line Charts</a></li>
                                        <li><a href="area-charts.html">Area Charts</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="normal-table.html">Normal Table</a></li>
                                        <li><a href="data-table.html">Data Table</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="form-elements.html">Form Elements</a></li>
                                        <li><a href="form-components.html">Form Components</a></li>
                                        <li><a href="form-examples.html">Form Examples</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="notification.html">Notifications</a>
                                        </li>
                                        <li><a href="alert.html">Alerts</a>
                                        </li>
                                        <li><a href="modals.html">Modals</a>
                                        </li>
                                        <li><a href="buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="contact.html">Contact</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="color.html">Color</a>
                                        </li>
                                        <li><a href="login-register.html">Login Register</a>
                                        </li>
                                        <li><a href="404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="{{ 's_p-index'  == request()->path() ?  'active' : ''}} nav-link"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        @php
                            $session =  session::get('user_type');
                            $cookie  =  cookie::get('user_type');
                        @endphp
                        
                        @if(($session == 'sh') || ($cookie == 'sh')  )
                        <li class="{{ 'user-shop'  == request()->path() ?  'active' : ''}} nav-link"><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Shop</a>
                        </li>
                        @elseif(($session == 'sfh') || ($cookie == 'sfh') )
                        <li ><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Service Details</a>
                        </li>
                        @elseif(($session == 'dod') || ($cookie == 'dod'))
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i>Service Area</a>
                        </li>
                        @endif
                        <li class="{{ 'appointment_view'  == request()->path() ?  'active' : ''}} nav-link"><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Appointments</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="{{ 's_p-index'  == request()->path() ?  'active' : ''}} {{ 'view-profile'  == request()->path() ?  'active' : ''}} nav-link tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{url('s_p-index')}}">Home Page</a>
                                </li>
                                <li><a href="#" data-toggle='modal' data-target='#profile_modal'>View Profile</a>
                                </li>
                            </ul>
                        </div>
                        <div id="mailbox" class="{{ 'user-shop'  == request()->path() ?  'active' : ''}} {{ 'view-shop'  == request()->path() ?  'active' : ''}} {{ 'comment_get'  == request()->path() ?  'active' : ''}} nav-link tab-pane in notika-tab-menu-bg animated flipInX">
                        @if(($session == 'sh') || ($cookie == 'sh') )
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{url('user-shop')}}">Add Shop</a>
                                </li>
                                <li><a href="{{url('view-shop')}}">View Shop</a>
                                </li>
                                <li><a href="{{url('comment_get')}}">View Comments</a>
                                </li>
                            </ul>
                            @elseif(($session == 'sfh') || ($cookie == 'sfh'))
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="#" data-toggle="modal" data-target="#addworkspace">Add Work Space</a>
                                </li>
                                <li><a href="#" data-toggle="modal" data-target="#viewlocation">View Location</a>
                                </li>
                                <li><a href="#" data-toggle="modal" data-target="#viewcomment">View Comments</a>
                                </li>
                            </ul>

                            @elseif(($session == 'dod') || ($cookie == 'dod'))
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{url('dod_add_area')}}">Add Work Area</a>
                                </li>
                                <li><a href="{{url('dod_view_area')}}">View Area</a>
                                </li>
                                <li><a href="{{url('dod_comment_get')}}">View Comments</a>
                                </li>
                            </ul>
                        @endif
                        </div>
                        <div id="Interface" class="{{ 'appointment_view'  == request()->path() ?  'active' : ''}} nav-link tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            @if(($session == 'sh') || ($cookie == 'sh') )
                                <li><a href="{{url('appointment_view')}}">View All</a></li>
                            @elseif(($session == 'sfh') || ($cookie == 'sfh'))
                                <li><a href="#" data-toggle="modal" data-target="#appointmentmodal">View All</a></li>
                                @elseif(($session == 'dod') || ($cookie == 'dod'))
                                <li><a href="#" data-toggle="modal" data-target="#appointmentmodal">View All</a></li>
                            @endif 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->




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
            <input type="submit" class='btn btn-info m-3' style='color:black !important' onclick='change_password()' >
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
            <input type="submit" class='btn btn-info m-3' style='color:black !important' id='new_passsword_set'> 
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




    @yield('s_p-menu')

     <!-- Start Footer area-->
     <div class="footer-copyright-area" style='background:black !important;position: absolute;bottom: 0px;width: 100%;'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right text-dark" >
                        <p>Copyright © 2018 All rights reserved. Template by <a href="#">Sachtech Solution</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Footer area-->
     <!-- js
     
        ============================================ -->
        <script src="{{asset('service_provider/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- bootstrap JS
        ============================================ -->
        <script src="{{asset('service_provider/js/bootstrap.min.js')}}"></script>
        <!-- wow JS
        ============================================ -->
        <script src="{{asset('service_provider/js/wow.min.js')}}"></script>
        <!-- price-slider JS
        ============================================ -->
        <script src="{{asset('service_provider/js/jquery-price-slider.js')}}"></script>
        <!-- owl.carousel JS
        ============================================ -->
        <script src="{{asset('service_provider/js/owl.carousel.min.js')}}"></script>
        <!-- scrollUp JS
        ============================================ -->
        <script src="{{asset('service_provider/js/jquery.scrollUp.min.js')}}"></script>
            <!-- meanmenu JS
            ============================================ -->
            <script src="{{asset('service_provider/js/meanmenu/jquery.meanmenu.js')}}"></script>
            <!-- counterup JS
                ============================================ -->
                <script src="{{asset('service_provider/js/counterup/jquery.counterup.min.js')}}"></script>
                <script src="{{asset('service_provider/js/counterup/waypoints.min.js')}}"></script>
                <script src="{{asset('service_provider/js/counterup/counterup-active.js')}}"></script>
            <!-- mCustomScrollbar JS
                ============================================ -->
            <script src="{{asset('service_provider/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
            <!-- jvectormap JS
                ============================================ -->
                <script src="{{asset('service_provider/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
                <script src="{{asset('service_provider/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
            <script src="{{asset('service_provider/js/jvectormap/jvectormap-active.js')}}"></script>
            <!-- sparkline JS
            ============================================ -->
            <script src="{{asset('service_provider/js/sparkline/jquery.sparkline.min.js')}}"></script>
            <script src="{{asset('service_provider/js/sparkline/sparkline-active.js')}}"></script>
            <!-- sparkline JS
            ============================================ -->
            <script src="{{asset('service_provider/js/flot/jquery.flot.js')}}"></script>
            <script src="{{asset('service_provider/js/flot/jquery.flot.resize.js')}}"></script>
            <script src="{{asset('service_provider/js/flot/curvedLines.js')}}"></script>
            <script src="{{asset('service_provider/js/flot/flot-active.js')}}"></script>
            <!-- knob JS
                ============================================ -->
                <script src="{{asset('service_provider/js/knob/jquery.knob.js')}}"></script>
                <script src="{{asset('service_provider/js/knob/jquery.appear.js')}}"></script>
                <script src="{{asset('service_provider/js/knob/knob-active.js')}}"></script>
                <!--  wave JS
                ============================================ -->
                <script src="{{asset('service_provider/js/wave/waves.min.js')}}"></script>
            <script src="{{asset('service_provider/js/wave/wave-active.js')}}"></script>
            <!--  todo JS
            ============================================ -->
            <script src="{{asset('service_provider/js/todo/jquery.todo.js')}}"></script>
            <!-- plugins JS
            ============================================ -->
            <script src="{{asset('service_provider/js/plugins.js')}}"></script>
            <!--  Chat JS
            ============================================ -->
            <script src="{{asset('service_provider/js/chat/moment.min.js')}}"></script>
            <script src="{{asset('service_provider/js/chat/jquery.chat.js')}}"></script>
            <!-- main JS
                ============================================ -->
                <script src="{{asset('service_provider/js/main.js')}}"></script>
                <!-- tawk chat JS
                ============================================ -->
                <!-- <script src="{{asset('service_provider/js/tawk-chat.js')}}"></script> -->
    <!-- js end -->

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


    @yield('s_p-footer')
