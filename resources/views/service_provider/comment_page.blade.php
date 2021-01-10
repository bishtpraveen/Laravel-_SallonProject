@extends('service_provider.sp_layout')
@section('s_p-menu')
    

<div class='container'>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="breadcomb-wp">
                            <div class="breadcomb-icon">
                                <i class="notika-icon notika-app"></i>
                            </div>
                            <div class="breadcomb-ctn">
                                <h2>Comment Section</h2>
                                <p>Here you can check the comment's send by users to your shop <span class="bread-ntd"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                        <div class="breadcomb-report">
                            <button data-toggle="tooltip" data-placement="left" title="" class="btn waves-effect" data-original-title="Download Report"><i class="notika-icon notika-sent"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-collapse notika-accrodion-cus " style='margin-top:20px'>
    @foreach($comment_data as $comment)
        <div class="panel-heading " role="tab">
            <h4 class="panel-title">
            @foreach($shop_data as $shop)
                <a data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-{{$comment->id}}" aria-expanded="false" class="text-uppercase">
                        @if($comment->shop_id == $shop->id)
                        {{$shop->shop_name}}
                        @endif

                </a>
            @endforeach
            </h4>
        </div>
        <div id="accordionGreen-{{$comment->id}}" class="collapse" role="tabpanel" aria-expanded="false" style="">
            <div class="panel-body">
                <p> <strong>Subject</strong>{{$comment->subject}}</p>
                <p> <strong>Message</strong>{{$comment->message}}</p>
                <p> <span>{{$comment->user_name}} {{$comment->user_email}} </span> </p>
            </div>
        </div>
    @endforeach
    </div>
</div>

@section('s_p-footer')
    
    @endsection()
    @endsection()