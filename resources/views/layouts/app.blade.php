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
    <link rel="shortcut icon" href="./images/favicon/favicon-32x32.png" type="image/x-icon">
    <title>Shopping</title>
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/carousel.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <a href="./index.html" class="logo"><img src="./images/logo.png" alt=""></a>
        <input type="checkbox" id="menu-bar">
        <nav class="navbar">
            <ul>
                <li class="ex">
                    <a href="./cart.html"><i class="fa fa-shopping-bag bag"></i></a>
                    <input type="text" class="search-bar" placeholder="Search">
                    <i class="fa fa-search search"></i>
                    <a href="login.html">
                        <img src="./images/user.jpg" alt="">
                    </a>
                    </div>
                </li>
                <li><a href="./index.html">Home</a></li>
                <li><a href="#">Categories +</a>
                    <ul>
                        <li><a href="./men.html">Men +</a>
                            <ul>
                                <li><a href="./kurta.html">Kurta</a></li>
                                <li><a href="./jeans.html">Jeans</a></li>
                                <li><a href="./shirts.html">T-shirts</a></li>
                                <li><a href="./formal.html">Formal</a></li>
                                <li><a href="./unstitched_m.html">Unstitched</a></li>
                            </ul>
                        </li>
                        <li><a href="women.html">Women +</a>
                            <ul>
                                <li><a href="./kids.html">Kurti's</a> </li>
                                <li><a href="./unstitched_w.html">Unstitched</a> </li>
                                <li><a href="./branded.html">Branded</a></li>
                                <li><a href="./casual.html">Casual</a></li>
                            </ul>
                        </li>
                        <li><a href="./kids.html">Kids +</a>
                            <ul>
                                <li><a href="casualw.html">Casual</a></li>
                                <li><a href="kids_shoes.html">Shoes</a></li>
                                <li><a href="party.html">Party Wear</a></li>
                                <li><a href="kid_kurta.html">Kurta</a></li>
                            </ul>
                        </li>
                        <li><a href="./home.html">Lifestyle +</a>
                            <ul>
                                <li><a href="towels.html">Towels</a></li>
                                <li><a href="bags.html">Bags</a></li>
                                <li><a href="mats.html">Mats</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="./feature.html">Featured</a></li>
                <li><a href="#">Sales +</a>
                    <ul>
                        <li><a href="flat.html">Flat Sale</a></li>
                        <li><a href="season_off.html">Season Off Sale</a></li>
                        <li><a href="winter.html">Winter Sale</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="user-cart">
            <label for="menu-bar"><i class="fa-solid fa-bars"></i></label>
            <div class="cart" id="cart">
                <i class="fa fa-shopping-bag" id="cart"></i>
                <div class="popup" id="popup">
                    <div class="elem_container" id="elem_container">
                        <div class="element">
                            <div class="img_des">
                                <img src="./images/men-carousel/Men_Fragrance_1_10.jpg" alt="">
                                <div class="des">
                                    <h3>Product 1</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </div>
                            <div class="quantity_pr">
                                <div class="quantity">
                                    <button class="quantity_btn" id="minus">-</button>
                                    <div class="quantity_value" id="item-value">1</div>
                                    <button class="quantity_btn" id="plus">+</button>
                                </div>
                                <div class="price"><span>
                                        <pre>Price:  $ </pre>
                                    </span>
                                    <p id="initial-price">45.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <button class="checkout-btn"><a href="./checkout.html">Checkout</a></button>
                        <div class="total_container">
                            <h3>
                                <pre>Total: $ </pre>
                            </h3>
                            <p id="total-price">120</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="login.html">
                    <img src="./images/user.jpg" alt="" id="user">
                </a>
            </div>
        </div>
    </header>
    <!--HERO CAROUSEL AUTOMATIC-->
    <div class="hero">
        <div class="carousel fade">
        </div>
    </div>
    <!-- Featured  products Check -->
    <section id="featured">
        <div class="feature-container">
            <h2><a href="feature.html">Featured Products</a></h2>
            <div class="line"><span>Exclusive Sales</span></div>
        </div>
        <!-- Object -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="feature feature1 ">
                        <img src="./images/men/f1.jpg" alt="">
                        <div class="des">
                            <span>adidas</span>
                            <h5>Cartoon Astronaut T-Shirts</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$78</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature2">
                        <img src="./images/men/f2.jpg" alt="">
                        <div class="des">
                            <span>adidas</span>
                            <h5>Cartoon Astronaut T-Shirts</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$78</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature3">
                        <img src="./images/men/f3.jpg" alt="">
                        <div class="des">
                            <span>adidas</span>
                            <h5>Cartoon Astronaut T-Shirts</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$78</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature4">
                        <img src="./images//men/f4.jpg" alt="">
                        <div class="des">
                            <span>adidas</span>
                            <h5>Cartoon Astronaut T-Shirts</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$72</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature5">
                        <img src="./images/men/f5.jpg" alt="">
                        <div class="des">
                            <span>adidas</span>
                            <h5>Cartoon Astronaut T-Shirts</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$72</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature6">
                        <img src="./images/men/f6.jpg" alt="">
                        <div class="des">
                            <span>Levi's</span>
                            <h5>Multicoloured Casual Shirts</h5>
                            <div class="star">
                                <<i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$90</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature7">
                        <img src="./images/men/f7.jpg" alt="">
                        <div class="des">
                            <span>Limelight</span>
                            <h5>Limelight Ladies Trouser</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$94</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature8">
                        <img src="./images/men/f8.jpg" alt="">
                        <div class="des">
                            <span>Limelight</span>
                            <h5>Ladies Summer Kurti</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$74</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature feature9">
                        <img src="./images/men/f8.jpg" alt="">
                        <div class="des">
                            <span>Limelight</span>
                            <h5>Ladies Summer Kurti</h5>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <h4>$74</h4>
                        </div>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- WOMEN CAROUSEL -->
    <div class="feature-container">
        <h2><a href="women.html">WOMEN</a></h2>
        <div class="line"><span>UPTO 20% OFF</span></div>
    </div>
    <section class="women-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/Women_Pret_1_9.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/Women_Fragrance.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/Women_Uns_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/Women_Trousers_1_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/Women_Footwear_1_6.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/Women_Bags_1_7.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/scarves_2_2_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/sarah.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/women-carousel/extra.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- MEN CAROUSEL -->
    <div class="feature-container">
        <h2><a href="men.html">MEN</a></h2>
        <div class="line"><span>WINTER SALE</span></div>
    </div>
    <section class="men-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Outerwear_1_9.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Fragrance_1_10.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Eastern_1_5.jpg" alt="">
                    <h3>Falna Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Shirt_1_10.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Tees_1_10.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Pants_1_6.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/Men_Uns_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/download.jpeg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/men-carousel/download (1).jpeg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- KIDS CAROUSEL -->
    <div class="feature-container">
        <h2><a href="kids.html">KIDS</a></h2>
        <div class="line"><span>UPTO 40% OFF</span></div>
    </div>
    <section class="kid-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide main">
                    <img src="./images/kids-carousel/Boy_Eastern_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/kids-carousel/boys_kurta_2_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/kids-carousel/Boys_Tees_1_3.jpg" alt="">
                    <h3>Falna Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/girls-carousel/Girls_Denim_1.jpeg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/girls-carousel/Girls_Pret_3_4.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/kids-carousel/boys_shirt_b_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/girls-carousel/T-shirt_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/kids-carousel/kid.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/kids-carousel/shoe.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- HOME CAROUSEL -->
    <div class="feature-container">
        <h2><a href="home.html">HOME</a></h2>
        <div class="line"><span>Daily Usable's</span></div>
    </div>
    <section class="home-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide main">
                    <img src="./images/home carousel/bath_sheet_2_2_1.jpg" alt="">
                    <h3>Falana Dhamaka</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/home carousel/bath_towels_2_1_1.jpg" alt="">
                    <h3>Bath Towels</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
                <div class="swiper-slide main">
                    <img src="./images/home carousel/hand_towel_2_1_1.jpg" alt="">
                    <h3>Hand Towels</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?</p>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- FOOTER -->
    <footer class="section-p1">
        <div class="col">
            <!-- <img src="./img//log.png" alt="" class="logo"> -->
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
            <a href="login.html">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col inst">
            <div class="row">
                <h4>Payment Methods</h4>
                <img src="./images/pay.png" alt="">
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023- Studio Hammad. &#8482;</p>
        </div>
    </footer>
    <script src="./js/itemvalue.js"></script>
    <script src="./js/cart.js"></script>
    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
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
</body>

</html>
