@extends('layout.layout')

@section('main_content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('barcut/fonts/register_fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('barcut/css/register_form.css')}}">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <style>
  .loginhere{
      margin-top:30px !important;

    }
    #email_error{
        display:none
    }
    #email{
        background:white !important;
    }
  </style>
    <!-- <script src="{{asset('barcut/js/register_form.js')}}"></script> -->
</head>
<body style='	background-image: url({{asset("barcut/img/signup-bg.jpg")}});'>

    <div class="main">
    @if($errors->any())
          <div class="alert alert-danger">
              <ul class="list-group">
                  @foreach($errors->all() as $error)
                  <li class="list-group-item">{{$error}}</li>
                  @endforeach
              </ul>
          </div>
          @endif
        <section class="signup">
            <!-- <img src="{{asset('barcut/img/signup-bg.jpg')}}" alt=""> -->
            <div class="container_form">
                <div class="signup-content">
                    <form method="POST" action="{{url('register_form')}}" id="signup-form" class="signup-form">
                        @csrf()
                        <h2 class="form-title">Create account</h2>
                        <!-- <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div> -->
                        <div class="form-group position-relative">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                            <div style='position: absolute;top: 25%;right: 10px;font-size: 12px;padding: 2px;' id='email_error'>
                           <span id='email_error_txt'> Email exists. Please use different email</span>
                            <i class="fa fa-exclamation-circle" id='exclamation-icon' style='color:red;'></i>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <div class="form-group">
                        <!-- <div class="col-md-6 col-md-offset-4 mx-auto mt-3">
                            <a href="{{url('/redirect')}}" class="btn btn-block" style='background:linear-gradient(to left,#0D2647,#33517A);border:none;color:white'>Sign Up with Google</a>
                        </div> -->
                    <p class="loginhere">
                        Have already an account ? <a href="{{url('login')}}" class="loginhere-link">Login here</a>
                    </p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <!-- custom script -->
    <script>
        // email actions
            $('#submit').attr('disabled',true)
            $('#email_error_txt').css('display','none')
            $('#email').keyup(function(){
            let email = $(this).val();
                if(email.length >=5){
                    $('#submit').attr('disabled',false)
                    $('#submit').css({'background-image':'linear-gradient(to left,#9face6,#74ebd5)','border':'2px solid gray'})
                }else{
                    $('#submit').attr('disabled',true)
                    $('#submit').css({'background-image':'linear-gradient(to left,#74ebd5,#9face6)','border':'none'})
                }
                $.ajax({
                    url:"{{url('email_ajax')}}",
                    type:'get',
                    data:{email,email},
                    success:function(data){
                        if(data == 1){
                            $('#email_error').css('display','block')
                            $('#submit').attr('disabled',true)
                        }else{
                            $('#email_error').css('display','none')
                            $('#submit').attr('disabled',false)
                        } 
                    }
                })
            })
            $('#exclamation-icon').mouseover(function(){
                $('#email_error').css('border','2px solid red');
                $('#email_error_txt').css('display','initial')
            })
            $('#exclamation-icon').mouseout(function(){
                $('#email_error').css('border','none');
                $('#email_error_txt').css('display','none')
            })
        // end
        </script>
    <!-- custom script end -->

</body>
</html>
@endsection