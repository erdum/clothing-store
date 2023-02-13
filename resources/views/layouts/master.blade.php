<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper Cdn Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Font's Link -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <!-- Font Awesme Icon Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FavIcon Link -->
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon-32x32.png') }}" type="image/x-icon">
    <title>@yield('title', 'Clothing Store') | Apparel UB365Inn</title>
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    @show
</head>

<body>
    <!-- HEADER -->
    <header>
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt=""></a>
        <input type="checkbox" id="menu-bar">
        <nav class="navbar">
            <ul>
                <li class="ex">
                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-bag bag"></i></a>
                    <input type="text" class="search-bar" placeholder="Search">
                    <i class="fa fa-search search"></i>
                    <a href="{{ route('login') }}">
                        <img src="{{ Auth::user()->avatar ?? asset('images/user.jpg') }}" alt="user profile avatar">
                    </a>
                </li>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Categories +</a>
                    <ul>
                        @foreach (App\Models\Category::all() as $category)
                            <li><a href="{{ route('category', ['name' => $category->name]) }}">{{ ucfirst($category->name) }} +</a>
                                <ul>
                                    @foreach ($category->sub as $sub_category)
                                        <li><a href="{{ route('category', [
                                                'name' => $category->name,
                                                'sub_name' => $sub_category->name
                                            ]) }}">{{ ucfirst($sub_category->name) }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">Featured</a></li>
                <li><a href="#">Sales +</a>
                    <ul>
                        <li><a href="#">Flat Sale</a></li>
                        <li><a href="#">Season Off Sale</a></li>
                        <li><a href="#">Winter Sale</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="user-cart">
            <label for="menu-bar"><i class="fa-solid fa-bars"></i></label>
            <div class="cart" id="cart">
                @auth
                    <i class="fa fa-shopping-bag" id="cart"></i>
                        <div class="popup" id="popup">
                            <div class="elem_container" id="elem_container">
                                @foreach (Auth::user()->in_cart_items as $cart_item)
                                <div class="element">
                                    <div class="img_des">
                                        <img src="{{ asset($cart_item->product->images[0]->url) }}" alt="">
                                        <div class="des">
                                            <h3>{{ $cart_item->product->name }}</h3>
                                            <p>{{ $cart_item->product->description }}</p>
                                        </div>
                                    </div>
                                    <div class="quantity_pr">
                                        <div class="quantity">
                                            <button class="quantity_btn" id="minus">-</button>
                                            <div class="quantity_value" id="item-value">{{ $cart_item->product->quantity }}</div>
                                            <button class="quantity_btn" id="plus">+</button>
                                        </div>
                                        <div class="price"><span>
                                                <pre>Price:  $ </pre>
                                            </span>
                                            <p id="initial-price">{{ $cart_item->product->unit_price }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="total">
                                <button class="checkout-btn"><a href="{{ route('checkout') }}">Checkout</a></button>
                                <div class="total_container">
                                    <h3>
                                        <pre>Total: $ </pre>
                                    </h3>
                                    <p id="total-price">
                                        {{
                                            Auth::user()
                                            ->in_cart_items
                                            ->sum(function ($item) {
                                                return ($item->quantity * $item->product->unit_price);
                                            });
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}">
                        <i class="fa fa-shopping-bag" id="cart"></i>
                    </a>
                @endguest
            </div>
            <div>
                <a href="{{ route('order') }}">
                    <img src="{{ Auth::user()->avatar ?? asset('images/user.jpg') }}" alt="user profile avatar" id="user">
                </a>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- FOOTER -->
    <footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address: </strong> 281 Prince Road, Street 32, Alabama</p>
            <p><strong>Phone: </strong> +1 254 312 0542 </p>
            <p><strong>Hours: </strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fa-solid fa-envelope"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Categories</h4>
            <a href="men.html">Men</a>
            <a href="women.html">Women</a>
            <a href="kids.html">Kids</a>
            <a href="home.html">Lifestyle</a>
        </div>
        <div class="col">
            <h4>Account</h4>
            <a href="{{ route('login') }}">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col inst">
            <div class="row">
                <h4>Payment Methods</h4>
                <img src="{{ asset('images/pay.png') }}" alt="">
            </div>
        </div>
        <div class="copyright">
            <a href="">
                <p>&copy; 2023- Studio Hammad. &#8482;</p>
            </a>
        </div>
    </footer>
    <script defer src="{{ asset('js/itemvalue.js') }}"></script>
    <script defer src="{{ asset('js/cart.js') }}"></script>
    <script defer src="{{ asset('js/script.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script defer>
    let perView = 1;
    if (window.innerWidth > 600 && window.innerWidth < 980) {
        perView = 2;
    } else if (window.innerWidth > 980 && window.innerWidth < 1024) {
        perView = 3;
    } else if (window.innerWidth >= 1024) {
        perView = 4;
    }

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: perView,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    </script>
    @section('scripts')
    @show
</body>

</html>
