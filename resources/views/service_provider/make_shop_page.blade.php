@extends('service_provider.sp_layout')
@section('s_p-menu')
    

<!-- Breadcomb area Start-->
<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Shop Form Section</h2>
										<p>Please Place Details about your Saloon<span class="bread-ntd"></span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- shop form main div -->
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <!-- <h2>Input Text</h2>
                            <p>Text Inputs with different sizes by height(<code>.input-sm, .input-lg</code>) and column.</p> -->
                        </div>
                        <div class="row">
                            <!-- <h3 class="well"></h3> -->
                        <!--shop form -->
                            <form method="post" action="{{url('shop_register')}}" enctype="multipart/form-data">
                                @csrf()
                                    <div class="row">
                                        <!-- owner name -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control" name='owner_name' placeholder="Owner name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                        <!-- shop name -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control" name='shop_name' placeholder="Shop Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                        <!-- address -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="nk-int-st">
                                                        <textarea class="form-control" rows="5" name='address' placeholder="Address" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- address end -->
                                        <!-- add shop_contact -->
                                        <div class="form-group ic-cmp-int">
                                            <div class="form-ic-cmp">
                                                <i class="notika-icon notika-phone"></i>
                                            </div>
                                            <div class="nk-int-st">
                                                <input type="text" pattern="[0-9]{10}" title='Please Enter Valid Phone number' class="form-control" name='shop_contact' placeholder="Add Shop Contact" required>
                                            </div>
                                        </div>
                                        <!-- add shop contact end -->
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
                                        <!--shop type  -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style='margin-top:10px;'>
                                            <div class="form-group">
                                            <h5>Shop Type</h5>
                                                <select name="shop_type" class='form-control' id="" required>
                                                    <option value="male" >Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="unisex">Unisex</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- shop type end -->
                                        <!-- employ number -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style='margin-top:10px;'>
                                            <h5>Number of Employ</h5>
                                            <div class="form-group" style='margin-top: -11px;'>
                                                <div class="nk-int-st">
                                                    <input type="number" name='employ_number' class="form-control input-lg disable_arrow_number" value='0' placeholder="Enter Number Of Employ" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                        <!-- specillaty service -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style='margin-top:10px;'>
                                            <h5>Specillaty Service</h5>
                                            <div class="form-group" style='margin-top: 10px;'>
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
                                        <!-- add services -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style='margin-top:10px;'>
                                            <h5>Add Services for your Shop</h5>
                                            <!-- main div -->
                                                <div class="form-group  service_main_div" style='margin-top: -11px;'>
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
                                                <div class="form-group add_form " style='margin-top: 10px;'>
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
                                        </div>
                                        <!-- add services end -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <h5>You have to Upload Images of your shop.</h5>
                                        <!-- image_upload -->
                                            <div class="nk-int-st">
                                                <div class="input-group hdtuto control-group lst increment" >
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
                                        <!-- image_upload ends  -->
                                        </div>
                                        <!-- SUBMIT BUTTON -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
                                        </div>
                                        <!-- SUBMIT BUTTON END -->

                                    </div>
                            </form>        
                        <!-- shop form end -->
                        </div>
                    </div>
                    <!-- shop form main div end -->
                </div>
            </div>
        </div>   
    </div>

    <!-- Form Element area End-->

<!-- shop_image_jquery  -->
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
                                        <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
                                        <script type="text/javascript">
                                            // $('.shop_services').click(function(){
                                            //    let confirm_alert = confirm('You are going to edit these field and adding your custom field. Are you sure about it');
                                            //    alert(confirm_alert)
                                            //    if(confirm_alert == 'true'){
                                            //        $(this).html()
                                            //    }
                                            // })
                                        

                                            $(document).ready(function() {
                                                $(".waves-effect_add").click(function(){ 
                                                    var lsthmtl = $(".add_form").html();
                                                    // alert(lsthmtl)
                                                    $(".service_main_div").after(lsthmtl);
                                                    $(lsthmtl).removeClass('hide');
                                                });
                                                $("body").on("click",".waves-effect_delete",function(){ 
                                                    // alert($(this))  
                                                    $(this).parents(".add_form").remove();
                                                });

                                            });
                                        </script>
<!--end shop_image_jquery  -->



@section('s_p-footer')

@endsection()


@endsection()

