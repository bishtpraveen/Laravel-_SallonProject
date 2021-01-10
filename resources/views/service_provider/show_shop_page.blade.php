@extends('service_provider.sp_layout')
@section('s_p-menu')





<!-- shop_div -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-tabs-int">
                <div class="tab-hd">
                    <h2>Tabs</h2>
                    <p>You have Registered {{count($shop_data)}} Shop with us. Click on the name and check the details</p>
                </div>
                <div class="widget-tabs-list">
                    <ul class="nav nav-tabs">
                        @if(!$shop_data == ' ')
                        <h3>Please place a Shop Detail.</h3>
                        @else
                        @foreach($shop_data as $data)
                        <li class=""><a data-toggle="tab" href="#menu{{$data->id}}" aria-expanded="true" style='text-transform:uppercase'>{{$data->shop_name}}</a></li>
                        @endforeach
                            <!-- <li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false">Tab Menu 2</a></li>
                            <li class=""><a data-toggle="tab" href="#menu2" aria-expanded="false">Tab Menu 3</a></li> -->
                    </ul>
                    <div class="tab-content tab-custom-st">
                        @foreach($shop_data as $data)
                        <div id="menu{{$data->id}}" class="tab-pane fade  in">
                            <div class="tab-ctn">   
                                <h4 style='text-transform: uppercase;'>{{$data->shop_type}}</h4>
                                <strong>Specillaty :- </strong><span>{{$data->specillaty_service}} = {{$data->specillaty_service_amount}}</span>
                                <div class="row">
                                    <h5 class='images' style='cursor:pointer' >Images</h5>
                                    <div class='image_div'>
                                        @foreach(explode(',', $data->images) as $info) 
                                        <div class="col-md-4">
                                            <img src='{{asset("shop_files/$info")}}' style='width:100% !important;height:250px !important;max-width: none; margin-top:10px' alt="{{$info}}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row" style='margin-top: 20px;' >
                                    <h5 class='shop_service_list' style='cursor:pointer' >Shop Service list   </h5>
                                    <div class="col-md-4">
                                        <table class='table table-bordered service_table' id=''>
                                            <thead>

                                            </thead>
                                            <tbody>
                                                    <!-- {{count(explode(',', $data->shop_services_amount))}} --> 
                                                    <tr>
                                                        <th style='border-right: 2px solid;padding: 30px;'>Services</td>
                                                    @foreach(explode(',', $data->shop_services) as $shop_services_data)  
                                                    <td>{{$shop_services_data}}</td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                <th style='border-right: 2px solid;padding: 30px;'>Amount</th>
                                                @foreach(explode(',', $data->shop_services_amount) as $shop_services_amount_data)  
                                                        <td>{{$shop_services_amount_data}}</td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        @endif
                        <!-- <div id="menu1" class="tab-pane fade">
                            <div class="tab-ctn">
                                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac the massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                                <p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras ultricies mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse plat.</p>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="tab-ctn">
                                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac the massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                                <p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras ultricies mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse plat.</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop_div end -->
@section('s_p-footer')

@endsection()
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    $(function(){
        $('.image_div').hide();   
        $('.service_table').hide(); 
        $('.images').click(function(){
            $(this).siblings('.image_div').slideToggle('2000');
        })
        $('.shop_service_list').click(function(){
            // alert('d')
            $('.service_table').slideToggle('2000');
            // $('.').slideToggle('1000');
        })
    })

</script>

@endsection()