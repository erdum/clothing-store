<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Font Awesme Icon Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FavIcon Link -->
    <link rel="shortcut icon" href="{{ asset('assets/site/images/favicon/favicon-32x32.png') }}" type="image/x-icon">
    <title>Login - Signup | Apparel UB365Inn</title>
    <link rel="stylesheet" href="{{ asset('assets/site/css/login.css') }}">
</head>

<body>
    <a href="{{ route('home') }}" class="back"><i class="fa-solid fa-arrow-left"></i></a>

    <div class="sign-in-form">
        <img src="{{ asset('assets/site/images/icon3.png') }}">
        <h1>Log In</h1>
        <form>
            <input name="email" type="email" class="input-box" placeholder="Your Email">
            <input name="password" type="password" class="input-box" placeholder="Your Password">
            <button type="button" class="form-btn login-btn">Log In</button>
            <hr>
            <p class="or">OR</p>
            <a href="{{ route('third_party_login', ['provider_name' => 'google']) }}" class="form-btn"><i class="fa-brands fa-google"></i> Login with Google</a>
            <a href="{{ route('third_party_login', ['provider_name' => 'facebook']) }}" class="form-btn"><i class="fa-brands fa-facebook"></i> Login with Facebook</a>
            
        </form>
    </div>
</body>

</html>