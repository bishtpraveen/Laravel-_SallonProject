<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-12 text-center">
            <img src="{{asset('barcut/img/logo.png')}}" style='width:12%;height:100%' alt="">
        </div>
        <div class="col-md-8 mx-auto mt-4  p-3">
            <h4>Dear {{$user_name}}.</h4>
            <p>This is your Registration Verification Link.</p>
            <p>Please Click on it and your registration will be completed successfully.</p>
            <a href="{{url('verification_code',[$tt = $token])}}" style=''>Click On it</a>
        </div>
    </div>
</div>
    
</body>
</html>