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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <style>
    .custom_select{
        display:block !important;
    }
    .nice-select{
        display:none !important;
    }
    /* .user_only{
        display:none;
    } */
  </style>
    <!-- <script src="{{asset('barcut/js/register_form.js')}}"></script> -->
</head>
<body style='	background-image: url({{asset("barcut/img/signup-bg.jpg")}});'>

    <div class="main">
        <section class="signup">
            <!-- <img src="{{asset('barcut/img/signup-bg.jpg')}}" alt=""> -->
            <div class="container_form">
                <div class="signup-content">
                    @if(session()->has('register_complete'))
                        <div class="alert alert-success">
                        {{session()->get('register_complete')}}
                        </div>
                    @endif
                    <form method="POST" action="{{url('register_complete_form')}}" id="signup-form" class="signup-form" enctype="multipart/form-data">
                        @csrf()
                        <h2 class="form-title">Complete Your Details</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required/>
                        </div>
                        <!-- <div class="form-group" style='overflow:visible !important'> -->
                        <select name="user_type" id="user_type" class='form-control custom_select'>
                            <option value="user" >User</option>
                            <option value="sh"  >Saloon Holder</option>
                            <!-- <option value="dod" >Door to Door</option> -->
                            <option value="sfh" >Service from home</option>
                        </select>
                        <!-- </div> -->
                        <br>
                        <div class="form-group mt-4" style='overflow:visible !important'>
                            <input type="email" class="form-input" value='{{$user_detail->email}}' readonly name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group" >
                            <input type="text" class="form-input" name="contact" placeholder="Contact" required />
                            <!-- <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span> -->
                            <input type="file" class="form-input" name="image" required   />
                            <!-- <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span> -->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>
                            <span toggle="#password" onclick="showPassword()" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" required/>
                        </div>
                        <div class="form-group">
                        <input value='{{$user_detail->provider_user_id}}' hidden name='provider_user_id' >
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <!-- <p class="loginhere">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p> -->
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script> -->
    
<!-- custom script -->
    <script>
    // checkbox script
        $('#submit').attr('disabled',true)
        $('#agree-term').click(function(){
            if($(this).is(':checked')){
                $('#submit').attr('disabled',false)
                $('#submit').css({'background-image':'linear-gradient(to left,#9face6,#74ebd5)','border':'2px solid gray'})
            }else{
                $('#submit').attr('disabled',true)
                $('#submit').css({'background-image':'linear-gradient(to left,#74ebd5,#9face6)','border':'none'})
            }
        })
    // end
    // password script
        $('#re_password').keyup(function(){
            let password = $('#password').val();
            let re_password = $(this).val();
            if(password == re_password){
                // alert('same');
                document.getElementById('password').style.borderBottom='2px solid green';
                document.getElementById('re_password').style.borderBottom='2px solid green';
            }else{
                document.getElementById('password').style.borderBottom='2px solid red';
                document.getElementById('re_password').style.borderBottom='2px solid red';
                // alert('error');
            }
        });
    // password script end

    // extra_fields
    $('#user_type').change(function(){
        // let value = document.getElementsByClassName('current');
        // alert(value[0].innerText);
        let element = $(this).val();
        if(element == 'user')
        {
            $('#user_only').show();
        }else
        {
            $('#user_only').hide();
        }
    })
    // extra_fields_end

    // password to text
    function showPassword(){
        let passType = $('#password').attr('type');
        if(passType == 'password'){
            $('#password').attr('type','text');
            $('.toggle-password').removeClass('zmdi-eye');
            $('.toggle-password').addClass('zmdi-eye-off');
        }else{
            $('#password').attr('type','password');
            $('.toggle-password').removeClass('zmdi-eye-off');
            $('.toggle-password').addClass('zmdi-eye');
        }
    }
    // password to text end

    </script>
<!-- custom script end -->
</body>
</html>
@endsection