<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font Awesme Icon Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
   integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
   crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FavIcon Link -->
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon-32x32.png') }}" type="image/x-icon">
    <title>Login - Signup | Apparel UB365Inn</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left back"></i></a>

    <div class="sign-in-form">
        <img src="{{ asset('images/icon3.png') }}">
        <h1>Log In</h1>
        <form>
            <input name="email" type="email" class="input-box" placeholder="Your Email">
            <input name="password" type="password" class="input-box" placeholder="Your Password">
            <button type="button" class="signin-btn">Log In</button>
            <hr>
            <p class="or">OR</p>
            <button type="button" class="gmail-btn"><a href="{{ route('third_party_login', ['provider_name' => 'google']) }}"><i class="fa-solid fa-envelope"></i> Login with Gmail</a></button>
            <button type="button" class="twitter-btn"><a href="{{ route('third_party_login', ['provider_name' => 'facebook']) }}"><i class="fa-brands fa-facebook"></i> Login with Facebook</a></button>
            
        </form>
    </div>
</body>

</html>