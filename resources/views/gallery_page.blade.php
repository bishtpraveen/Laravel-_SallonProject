@extends('layout.layout')
@section('main_content')




<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(function(){
    $('.single_shop_row').hide();
    $('.shop_name').click(function(){
        $(this).next('.single_shop_row').slideToggle(1000)
    })
})
</script>

<style>
    .shop_name{
    text-transform: uppercase;
    border-bottom: 2px solid gray;
    box-shadow: 0px 11px 12px grey;
    display: inline-block;
    }
</style>
<section class="gallery-area" id="gallery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="section-title">
                    <h1>Recent Added Images</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua ad minim veniam</p>
                </div>
            </div>
        </div>
        <div class="filters-content">
            <div class="row">
            @foreach($all_shop as $all_shop_data)
            <div class="single-gallery col-lg-10 col-md-6 all" style='border-radius:0px !important;border-bottom:2px solid black;padding-bottom:10px' >
            <h2 class='shop_name'>{{$all_shop_data->shop_name}}</h2>  
                <div class="row single_shop_row">
                    @foreach(explode(',',$all_shop_data->images) as $image)
                        <div class="col-md-3">
                            <!-- <div class="overlay overlay-bg"></div> -->
                            @if($all_shop_data->user_type == 'sh')
                                <img class="image img-fluid" src='{{asset("shop_files/$image")}}' style='width:100%' alt="aa">
                                @elseif($all_shop_data->user_type == 'sfh')
                                <img class="image img-fluid" src='{{asset("home_shop_files/$image")}}' style='width:100%' alt="aa">
                                @else
                                <img class="image img-fluid" src='{{asset("shop_files/$image")}}' style='width:100%' alt="aa">
                            @endif
                        </div>
                    @endforeach
                    <a href="img/gallery/g1.jpg" class="img-pop-up">
                        <div class="middle">
                            <div class="text align-self-center d-flex">
                                <img src="img/gallery/preview.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</div>


@section('footer')
@endsection





@endsection