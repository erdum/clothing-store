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
    <link rel="shortcut icon" href="./images/favicon/favicon-32x32.png" type="image/x-icon">
    <title>LOGIN: To be a part!</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <a href="./index.html"><i class="fa-solid fa-arrow-left back"></i></a>

    <div class="sign-in-form">
        <img src="./images/icon3.png">
        <h1>Log In</h1>
        <form>
            <input type="email" class="input-box" placeholder="Your Email">
            <input type="password" class="input-box" placeholder="Your Password">
            <p><span><input type="checkbox" class="checkbox"></span> Save Password for Future Login</p>
            <button type="button" class="signin-btn">Log In</button>
            <hr>
            <p class="or">OR</p>
            <button type="button" class="gmail-btn"><a href="{{ $google_link }}"><i class="fa-solid fa-envelope"></i> Login with Gmail</a></button>
            <button type="button" class="twitter-btn"><a href="{{ $facebook_link }}"><i class="fa-brands fa-facebook"></i> Login with Facebook</a></button>
            
        </form>
    </div>
</body>

</html>