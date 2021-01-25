@extends('service_provider.sp_layout')
@section('s_p-menu')
    

<!-- Service Status area -->
<style>
.fa-sort-numeric-asc::before{
    text-shadow: 0px 0px 0px black, 0px 0px 0px black, 0px 0px 0px black, 0px 1px 0px black;
    color: white;
}
</style>

<div class="notika-status-area">
    <div class="container">
    @php
        $session =  session::get('user_type');
        $cookie  =  cookie::get('user_type');
    @endphp
    @if($session =='sh' || $cookie == 'sh')
    <!-- saloon servide -->
        <div class="row">
            @if(session()->has('shop_data_update'))
            <div class="alert alert-success alert-dismissible mt-5 mb-5" role="alert">{{session()->get('shop_data_update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
            </div>
            @endif
            @if(session()->has('payment_request_done'))
            <div class="alert alert-success alert-dismissible mt-5 mb-5" role="alert">{{session()->get('payment_request_done')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
            </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="appointment_count"></span></h2>
                        <p>Your Total Appointments</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats1">4,9,4,8,6,5,6,4,8,3,5,9,5</div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="comments_count"></span></h2>
                        <p>Your Shop Comment Section</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$shop_count}}</span></h2>
                        <p>Total Shop's</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div> -->
                </div>
            </div>
        </div>
    <!-- saloon servide end -->
        @elseif($session =='sfh' || $cookie == 'sfh')
    <!-- service from home -->
        <div class="row">
            <!-- <div class='notification-demo' >
            <a href="" class="btn btn-info waves-effect" data-type="inverse" data-from="top" data-align="center">Top Center</a>
            </div> -->
            @if(session()->has('shop_data_update'))
            <div class="alert alert-success alert-dismissible mt-5 mb-5" role="alert">{{session()->get('shop_data_update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
            </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="appointment_count"></span></h2>
                        <p>Your Total Appointments</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats1">4,9,4,8,6,5,6,4,8,3,5,9,5</div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="comments_count"></span></h2>
                        <p>Your Feedback Section</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$shop_count}}</span></h2>
                        <p>Total Work Space</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">1,000</span></h2>
                        <p>Total Support Tickets</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                </div>
            </div> -->
        </div>
    <!-- service from home end -->
        @else
    <!-- door to door -->
        <div class="row">
            @if(session()->has('shop_data_update'))
            <div class="alert alert-success alert-dismissible mt-5 mb-5" role="alert">{{session()->get('shop_data_update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
            </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="appointment_count"></span></h2>
                        <p>Your Total Appointments</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats1">4,9,4,8,6,5,6,4,8,3,5,9,5</div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="comments_count"></span></h2>
                        <p>Your Shop Comment Section</p>
                    </div>
                    <!-- <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">{{$shop_count}}</span></h2>
                        <p>Total Shop's</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">1,000</span></h2>
                        <p>Total Support Tickets</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                </div> -->
            </div>
        </div>
    <!-- door to door end -->
        @endif
    </div>
</div>
<!-- profile_modal -->
<div class="modal fade in" id="profile_modal" role="dialog" style="display: none; padding-right: 17px;">
        <div class="modal-dialog modals-default ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                <h2 class='text-center'>Your Profile data</h2>
                <strong>Name :-</strong><h2 class='text-uppercase'>{{$profile_data->name}}</h2>
                <strong>Email :-</strong><h2 class='text-uppercase'>{{$profile_data->email}}</h2>
                <strong>Contact :-</strong><h2 class='text-uppercase'>{{$profile_data->contact}}</h2>
                <h3>Profile Image</h3>
                <img src='{{asset("profile_image/$profile_data->profile_image")}}' alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- profile_modal_end -->

<!-- sfh_add_work_space_modal -->
<div class="modal fade in" id="addworkspace" role="dialog" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modals-default ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
            <form action="{{url('sfh_add_home')}}" method="post" enctype="multipart/form-data">
            @csrf()
                <div style='background: white;padding: 0px;'>
                    <!-- shop name -->
                    <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-house"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" name='shop_name' placeholder="Location Name" required>
                            </div>
                    </div>
                    <!-- shop name end -->
                    <!-- owner name -->
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-support"></i>
                        </div>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name='owner_name' placeholder="Provider Name" required> 
                        </div>
                    </div>
                    <!-- owner name end -->
                    <!-- email input -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden">
                                            <div class="form-group">
                                                <div class="nk-int-st ">
                                                @if(Session::has('register_email'))
                                                    <input type="text" class="form-control input-sm" name='user_email' value='{{Session::get("register_email")}}' placeholder="email">
                                                    @else
                                                    <input type="text" class="form-control input-sm" name='user_email' value='{{Cookie::get("register_email")}}' placeholder="email">
                                                    @endif
                                                </div>
                                                <div class="nk-int-st ">
                                                @if(Session::has('user_type'))
                                                    <input type="text" class="form-control input-sm" name='user_type' value='{{Session::get("user_type")}}' placeholder="email">
                                                    @else
                                                    <input type="text" class="form-control input-sm" name='user_type' value='{{Cookie::get("user_type")}}' placeholder="email">
                                                    @endif
                                                </div>
                                                <div class="nk-int-st ">
                                                @if(Session::has('provider_user_id'))
                                                    <input type="text" class="form-control input-sm" name='provider_user_id' value='{{Session::get("provider_user_id")}}' placeholder="email">
                                                    @else
                                                    <input type="text" class="form-control input-sm" name='provider_user_id' value='{{Cookie::get("provider_user_id")}}' placeholder="email">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- email input end -->
                    <!-- number of employee -->
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                        <i class="fa fa-sort-numeric-asc"></i>
                            <!-- <i class="notika-icon notika-map"></i> -->
                        </div>
                        <div class="nk-int-st">
                            <input type="number" class="form-control" name='employee' placeholder="Number of Employ" required>
                        </div>
                    </div>
                    <!-- number of employee end -->
                    <!-- add location -->
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-map"></i>
                        </div>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name='shop_location' placeholder="Add Your Location" required>
                        </div>
                    </div>
                    <!-- add location end -->
                    <!-- add shop_contact -->
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-phone"></i>
                        </div>
                        <div class="nk-int-st">
                            <input type="text" pattern="[0-9]{10}" title='Please Enter Valid Phone number' class="form-control" name='shop_contact' placeholder="Add Contact" required>
                        </div>
                    </div>
                    <!-- add shop contact end -->
                    <div class="row">
                    <!--shop type  -->
                        <div class="col-md-6">
                            <div class="form-group" style='margin-top:20px'>
                                <h5>Service Type</h5>
                                <select name="shop_type" class='form-control' id="" required>
                                    <option value="male" >Male</option>
                                    <option value="female">Female</option>
                                    <option value="unisex">Unisex</option>
                                </select>
                            </div>
                        </div>
                    <!-- shop type end -->
                    <!-- specillaty service -->
                        <div class="col-md-6">
                            <div class="form-group" style='margin-top: 10px;'>
                                <h5>Specillaty Service</h5>
                                <div class="nk-int-st">
                                <select name="specillaty_service" class="form-control"  required >
                                        <option value="Stylish Hair Cutting">Stylish Hair Cutting</option>
                                        <option value="Quality Gel Shave">Quality Gel Shave</option>
                                        <option value="Beard Trimming">Beard Trimming</option>
                                        <option value="Executive Wash">Executive Wash</option>
                                        <!-- <option value="Basic Snacks">Basic Snacks</option> -->
                                    </select>
                                    <input type="number" name='specillaty_service_amount' class="form-control input-lg "  placeholder="Enter Specillaty Service amount" required>
                                </div>
                            </div>
                        </div>
                    <!-- end -->
                    </div>
                    
                    <!-- add services -->
                        <!-- main div -->
                            <div class="form-group  service_main_div text-center" style='margin-top: 0px;'>
                            <h5>Add Services for your Location</h5>
                                <select name="shop_services[]" class="form-control" style='width:40% !important;display:inline-block !important;' required >
                                    <option value="Basic hair Cut">Basic hair Cut </option>
                                    <option value="Basic Shave">Basic Shave</option>
                                    <option value="Basic Head Wash">Basic Head Wash</option>
                                    <option value="Basic Body Massage">Basic Body Massage</option>
                                    <option value="Basic Snacks">Basic Snacks</option>
                                </select>
                                <input type="text" name="shop_services_amount[]" class='form-control' style='width:39% !important;display:inline-block !important;' placeholder="Amount">
                                <button type='button' class="btn btn-default btn-icon-notika waves-effect_add"><i class="notika-icon notika-down-arrow"></i></button>
                            </div>
                        <!-- main div end -->
                        <!-- sub add div -->
                        <div class='add_form hide'>
                            <div class="form-group remove_form text-center " style='margin-top: 10px;'>
                                <select name="shop_services[]" class="form-control" style='width:39% !important;display:inline-block !important;' required>
                                    <option value="Basic hair Cut">Basic hair Cut </option>
                                    <option value="Basic Shave">Basic Shave</option>
                                    <option value="Basic Head Wash">Basic Head Wash</option>
                                    <option value="Basic Body Massage">Basic Body Massage</option>
                                    <option value="Basic Snacks">Basic Snacks</option>
                                </select>
                                <input type="text" name="shop_services_amount[]" class='form-control' style='width:40% !important;display:inline-block !important;' placeholder="Amount">
                                <button type='button' class="btn btn-danger btn-icon-notika waves-effect_delete"><i class="notika-icon notika-close"></i></button>
                            </div>
                        </div>
                        <!-- sub add div end -->
                    <!-- add services end -->
                    <!-- image_upload -->
                    <div class="form-group ic-cmp-int">
                        <div class="nk-int-st" style='padding-left:15px'>
                            <div class="input-group hdtuto control-group lst increment" style='width: 480px;' >
                                <input type="file" name="filenames[]" class="myfrm form-control" required>
                                <div class="input-group-btn"> 
                                    <button class="btn add_image_input btn-info" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="row">
                            <div class="clone hide">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>  
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- image_upload ends  -->
                    <div class="form-group ic-cmp-int">
                        <div class="nk-int-st">
                            
                            <button type="submit" class="btn btn-success" value=''> <i class='notika-icon notika-checked'></i> Add work Space</button>
                        </div>
                    </div>
                    
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- sfh_add_work_space_modal_end -->

<!-- sfh-view_location_modal -->
<div class="modal fade in" id="viewlocation" role="dialog" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modals-default ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style='background:#00c237 !important'>×</button>
            </div>
            <div class="modal-body">
                <h3>Your Work Space Details</h3>
                @foreach($get_service_from_home as $get_service_from_home_data)
                <div style='box-shadow: 0px 0px 26px olivedrab;padding: 20px;margin-bottom: 20px;'>
                    <h4 style='text-transform:uppercase;text-decoration:underline'>{{$get_service_from_home_data->shop_name}}</h4>
                    <h2><strong>Shop Owner Name</strong> :- <span style='color: #3c4167;text-transform: uppercase;text-decoration: underline wavy;'>{{$get_service_from_home_data->owner_name}}</span></h2>
                    <h5><strong>Employee</strong> :- <span style='color: #3c4167;text-transform: uppercase;text-decoration: underline wavy;'>{{$get_service_from_home_data->employ_number}}</span></h5>
                    <h5><strong>Work Space Location</strong> :- <span style='color: #3c4167;text-transform: uppercase;text-decoration: underline wavy;'>{{$get_service_from_home_data->address}}</span></h5>
                    <h5><strong>Shop Type</strong> :- <span style='color: #3c4167;text-transform: uppercase;text-decoration: underline wavy;'>{{$get_service_from_home_data->shop_type}}</span></h5>
                    <h5><strong>speciallaty Thing</strong> :- <span style='color: #3c4167;text-transform: uppercase;text-decoration: underline wavy;'>{{$get_service_from_home_data->specillaty_service}}</span> <span>{{$get_service_from_home_data->specillaty_service_amount}}</span> </h5>
                    <table class='table table-bordered service_table'>
                        <tbody>

                                <tr>
                                    <th style='border-right: 2px solid;padding: 30px;'>Services</td>
                                @foreach(explode(',', $get_service_from_home_data->shop_services) as $shop_services_data)  
                                <td>{{$shop_services_data}}</td>
                                @endforeach
                            </tr>
                            <tr>
                            <th style='border-right: 2px solid;padding: 30px;'>Amount</th>
                            @foreach(explode(',', $get_service_from_home_data->shop_services_amount) as $shop_services_amount_data)  
                                    <td>{{$shop_services_amount_data}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div>
                    @foreach(explode(',', $get_service_from_home_data->images) as $info) 
                        <img src='{{asset("home_shop_files/$info")}}' style='width:20% !important;height:100px !important;max-width: none;' alt="{{$info}}">
                    @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" style='background:#00c237 !important'>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- sfh-view_location_modal_end -->

<!-- sfh-view_comment_modal -->
<div class="modal fade in" id="viewcomment" role="dialog" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modals-default ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style='background:#00c237 !important'>×</button>
            </div>
            <div class="modal-body">
                <h3>Your Work Space Details</h3>
                @foreach($get_comment_service_from_home as $get_comment_service_from_home_data)
                <div style='box-shadow: 0px 0px 26px olivedrab;padding: 20px;margin-bottom: 20px;'>
                    @foreach($get_service_from_home as $get_service_from_home_data)
                    @if($get_service_from_home_data->id == $get_comment_service_from_home_data->shop_id )
                        <h4>Shop Name :- <span style='text-transform: uppercase;'> {{$get_service_from_home_data->shop_name}} </span></h4>
                    @endif
                    @endforeach
                    <strong>User Name</strong><h4 style='text-transform:uppercase;text-decoration:underline'>{{$get_comment_service_from_home_data->user_name}}</h4>
                    <h2> :- <span style='color: #3c4167;text-transform: uppercase;'>{{$get_comment_service_from_home_data->user_email}}</span></h2>
                    <h5><strong>Subject</strong> :- <span style='color: #3c4167;text-transform: uppercase;'>{{$get_comment_service_from_home_data->subject}}</span></h5>
                    <h5><strong>Message</strong> :- <span style='color: #3c4167;text-transform: uppercase;'>{{$get_comment_service_from_home_data->message}}</span></h5>
                    <!-- <h5><strong>Shop Type</strong> :- <span style='color: #3c4167;text-transform: uppercase;'>{{$get_service_from_home_data->shop_type}}</span></h5>
                    <h5><strong>speciallaty Thing</strong> :- <span style='color: #3c4167;text-transform: uppercase;'>{{$get_service_from_home_data->specillaty_service}}</span> <span>{{$get_service_from_home_data->specillaty_service_amount}}</span> </h5> -->
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" style='background:#00c237 !important'>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- sfh-view_comment_modal_end -->

<!-- sfh-view_appointment_modal -->
<div class="modal fade in" id="appointmentmodal" role="dialog" style="display: none; padding-right: 17px;">
    <div class="modal-dialog modals-default ">
        <div class="modal-content" style='padding: 20px 10px 44px 0px !important;'>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style='background:#00c237 !important'>×</button>
            </div>
            <div class="modal-body">
                <div class="normal-table-list mg-t-30">
                    <div class="basic-tb-hd">
                        <h2>All Appointments</h2>
                        <p>These are the appointments</p>
                    </div>
                    <div class="bsc-tbl-bdr">
                        <table class="table table-bordered text-center table-striped">
                            <thead >
                                <tr>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Shop Name</th>
                                    <th>Payment Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointment_data as $appointment_data)
                                <tr>
                                    <td>{{$appointment_data->appoint_user_name}}</td>
                                    <td>{{$appointment_data->appoint_user_email}}</td>
                                    <td>{{$appointment_data->appoint_date}} </td>
                                    <td>{{$appointment_data->appoint_time}} </td>
                                    @foreach($shop_data as $shop_d)
                                    @if($appointment_data->shop_appoint_id == $shop_d->id)
                                    <td>{{$shop_d->shop_name}} </td>
                                    @endif
                                    @endforeach
                                    @if($appointment_data->status == 1)
                                    <td>Done </td>
                                    @else
                                    <td>Due</td>
                                    @endif
                                    <!-- <td>{{$appointment_data->appoint_time}} </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" style='background:#00c237 !important'>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- sfh-view_appointment_modal_end -->

<!-- payment_request_modal_form -->
    <div class="modal fade in" id="payment_request" role="dialog" style="display: none; padding-right: 17px;">
        <div class="modal-dialog modals-default ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style='background:#00c237 !important'>×</button>
                </div>
                <div class="modal-body">
                    <form action="{{url('payment_request')}}" method="post">
                    @csrf()
                        <label for="">Amount</label>
                        <input type="text" class='form-control' name='amount' placeholder='Enter Booking Amount' required>
                        <label for="">User Contact</label>
                        <input type="text" class='form-control' name='user_contact' id='user_contact' readonly>
                        <input type="hidden" class='form-control' name='user_email' id='user_email' readonly>
                        <input type="hidden" class='form-control' name='shop_id' id='shop_id' readonly>
                        <label for="">Add Message</label>
                        <textarea type="text" class='form-control' name='message' id='user_contact' placeholder='Enter Message' required></textarea>
                        <div class='text-center' style='margin:10px'>
                        <input type="submit" style='background: #e34732;color: white;border: none;padding: 7px;border-radius: 4px;'>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" style='background:#00c237 !important'>Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- payment_request_modal_form_end -->

<!-- Service Status area end -->

    @if(session()->has('Already_Login'))
					<div class="alert alert-success">
					{{session()->get('Already_Login')}}
					</div>
				@endif
<!-- End Status area-->
<!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row normal-table-list mg-t-30">
                <div class="col-lg-12 col-md-8 col-sm-7 col-xs-12 bsc-tbl-bdr">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>S no</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                @if($session =='sh' || $cookie == 'sh')
                                <th>Shop Name</th>
                                @elseif($session =='sfh' || $cookie == 'sfh')
                                <th>Location Name</th>
                                @endif
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class='latest_appointment'>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
<!-- End Sale Statistic area-->

    @section('s_p-footer')
    
    @endsection()
    
   
</body>

<!-- service from home -->
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".add_image_input").click(function(){ 
                        var lsthmtl = $(".clone").html();
                        // alert(lsthmtl)
                        $(".increment").after(lsthmtl);
                    });
                    $("body").on("click",".btn-danger",function(){ 
                        // alert($(this))  
                        $(this).parents(".input-group").remove();
                    });

                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".waves-effect_add").click(function(){ 
                        var lsthmtl = $(".add_form").html();
                        // alert(lsthmtl)
                        $(".service_main_div").after(lsthmtl);
                        $(lsthmtl).removeClass('hide');
                    });
                    $("body").on("click",".waves-effect_delete",function(){ 
                        // alert($(this))  
                        $(this).parents(".remove_form").remove();
                    });

                });
            </script>
<!-- service from home end -->





<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
// latest_appointment

let global_data = '';
function latest_appointment(){
    let table = '';
    let count = 0;
    $.ajax({
        url:"{{url('latest_appointment')}}",
        type:'get',
        success:function(data){
            for(i in data){
                global_data = data;
                table += "<tr>";
                table += "<td>"+data[i].id+"</td>";
                table += "<td>"+data[i].appoint_user_name+"</td>";
                table += "<td>"+data[i].appoint_user_email+"</td>";
                table += "<td>"+data[i].appoint_date+"</td>";
                table += "<td>"+data[i].appoint_time+"</td>";
                table += "<td>"+data[i].shop_appoint_name+"</td>";  
                if(data[i].amount == '0' || data[i].amount == null )
                {
                    table += "<td><button class='btn btn-info btn-sm' onclick='payment_request("+data[i].id+")' >Payment Request</button> </td>";  
                }else
                {
                    if(data[i].status == '0')
                    {
                        table += "<td><button class='btn btn-warning btn-sm'>Waiting for Payment Done</button> </td>";  
                    }else{
                        
                        table += "<td><button class='btn btn-success btn-sm'>Payment Done</button> </td>";  
                    }
                }
                table += "</td>";
                count++;
            }
            $('.appointment_count').html(count);
            $('.latest_appointment').html(table);
        }
    })
};

function payment_request(id)
{
    // alert(id)
    for(dd in global_data)
    {
        if(global_data[dd].id == id)
        {
            // alert(global_data[dd].appoint_user_contact)
            $('#user_contact').val(global_data[dd].appoint_user_contact);
            $('#user_email').val(global_data[dd].appoint_user_email);
            $('#shop_id').val(global_data[dd].shop_appoint_id);
            $('#payment_request').modal('show');
        }
    }
}



// latest_appointment_end


// comments_count
    function comments_count(){
        $.ajax({
            url:'{{url("comments_count")}}',
            type:'get',
            success:function(data){
                // if(data == 1){
                    $('.comments_count').html(data);
                // }
            }
        })
    };
// comments_count_end


// setinterval
    $(function(){
            setInterval(comments_count,2000);
            setInterval(latest_appointment,2000);
    })
// setinterval end 
    
    
</script>

</html>
@endsection()