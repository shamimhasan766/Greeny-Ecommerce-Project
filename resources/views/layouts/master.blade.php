<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from spacingtech.com/html/vegist-final/vegist/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2024 10:41:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- title -->
        <title>Vegist - Multipurpose eCommerce HTML Template</title>
        <meta name="description" content="A best clean, modern, stylish, creative, responsive theme for different eCommerce business or industries."/>
        <meta name="keywords" content="organic food theme, vegetables, foof store, eCommerce html template, responsive, electronics store, furniture wood, fashion, furniture, mobile, watches, electronics, computers accessories, toys, jewellery, restaurant accessories"/>
        <meta name="author" content="spacingtech_webify">
        <!-- favicon -->
        <link rel="shortcut icon" type="{{ asset('frontend/image/') }}/favicon" href="{{ asset('frontend/image/') }}/fevicon.png">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/bootstrap.min.css">
        <!-- simple-line icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/simple-line-icons.css">
        <!-- font-awesome icon -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- themify icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/themify-icons.css">
        <!-- ion icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/ionicons.min.css">
        <!-- owl slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/owl.theme.default.min.css">
        <!-- swiper -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/swiper.min.css">
        <!-- animation -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/animate.css">
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style2.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/responsive2.css">
        @yield('link')
</head>
    <body>
        <!-- top notificationbar start -->
        <section class="top-2" style="background-image: url({{ asset('frontend/image/') }}/top-2.jpg);">
            <div class="container">
                <div class="row ">
                    <div class="col">
                        <ul class="top-home">
                            <li class="top-home-li t-content">
                                <!-- offer text start -->
                                <div class="top-content">
                                    <p class="top-slogn"><span class="top-c">Free shipping</span> orders from all item</p>
                                </div>
                                <!-- offer text end -->
                            </li>
                            <li class="top-home-li">
                                <!-- login start -->
                                <div class="currency">
                                    <div class="currency-drop">
                                        <ul class="cry">
                                            @auth('customer')
                                            <a href="{{ route('customer.profile') }}">
                                                <img height="50" src="{{ Auth::guard('customer')->user()->photo ? asset(Auth::guard('customer')->user()->photo) : 'https://shorturl.at/gqrx3' }}" class="rounded-circle" alt="avatar">
                                            </a>
                                            @else
                                            <li><a href="{{ route('customer.login') }}" style="color: white" href="register.html">register / log in</a></li>
                                            @endauth
                                        </ul>
                                    </div>
                                </div>
                                <!-- login end -->
                                <!-- currency start -->
                                <div class="currency">
                                    <div class="currency-drop">
                                        <ul class="cry">
                                            <li class="eur-head">
                                                <span class="eur"><img src="{{ asset('frontend/image/') }}/c-icon1.png" alt="currency icon"> EUR <i class="fa fa-angle-down"></i></span>
                                                <ul class="all-currency all-drop-currency">
                                                    <li><a href="javascript:void(0)"><img src="{{ asset('frontend/image/') }}/c-icon4.png" alt="currency icon"> AFN</a></li>
                                                    <li><a href="javascript:void(0)"><img src="{{ asset('frontend/image/') }}/c-icon2.png" alt="currency icon"> BDT</a></li>
                                                    <li><a href="javascript:void(0)"><img src="{{ asset('frontend/image/') }}/c-icon3.png" alt="currency icon"> CAD</a></li>
                                                    <li><a href="javascript:void(0)"><img src="{{ asset('frontend/image/') }}/c-icon5.png" alt="currency icon"> GBP</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- currency start -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- top notificationbar start -->
        <!-- header start -->
        <header class="header-area">
            <div class="header-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header-main">
                                <!-- logo start -->
                                <div class="header-element logo">
                                    <a href="/">
                                        <img src="{{ asset('frontend/image/') }}/logo2.png" alt="logo-image" class="img-fluid">
                                    </a>
                                </div>
                                <!-- logo end -->
                                <!-- main menu start -->
                                <div class="header-element megamenu-content">
                                    <div class="mainwrap">
                                        <ul class="main-menu">
                                            <li class="menu-link parent">
                                                <a href="/" class="link-title">
                                                    <span class="sp-link-title">Home</span>
                                                </a>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="javascript:void(0)" class="link-title">
                                                    <span class="sp-link-title">Shop</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <a href="#collapse-top-mega-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                    <span class="sp-link-title">Shop</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu mega-menu collapse" id="collapse-top-mega-menu">
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Fresh food</h2>
                                                        <a href="#collapse-top-sub-mega-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Fresh food</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="collapse-top-sub-mega-menu">
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fruit & nut</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Snack food</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Organics nut gifts</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Non dairy</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Mayonnaise</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Milk almond</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Mixedfruits</h2>
                                                        <a href="#collapse-top-fruits-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Mixedfruits</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="collapse-top-fruits-menu">
                                                            <li class="supmenu-li"><a href="product-style-6.html">Oranges</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Coffee creamers</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Ghee beverages</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Ranch salad</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Hemp milk</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Nuts & seeds</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Bananas & plantains</h2>
                                                        <a href="#collapse-top-banana-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Bananas & plantains</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="collapse-top-banana-menu">
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fresh gala</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fresh berries</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fruit & nut</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fifts mixed fruits</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Oranges</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Oranges</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Apples berries</h2>
                                                        <a href="#collapse-top-apple-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Apples berries</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="collapse-top-apple-menu">
                                                            <li class="supmenu-li"><a href="product-style-6.html">Pears produce</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Bananas</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Natural grassbeab</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fresh green orange</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Fresh organic reachter</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Balckberry 100%organic</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="javascript:void(0)" class="link-title">
                                                    <span class="sp-link-title">Collection</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <a href="#collapse-top-banner-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                    <span class="sp-link-title">Collection</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu banner-menu collapse" id="collapse-top-banner-menu">
                                                    <li class="menu-banner">
                                                        <a href="grid-list.html" class="menu-banner-img"><img src="{{ asset('frontend/image/') }}/menu-banner01.jpg" alt="menu-image" class="img-fluid"></a>
                                                        <a href="grid-list.html" class="menu-banner-title"><span>Bestseller</span></a>
                                                    </li>
                                                    <li class="menu-banner">
                                                        <a href="grid-list.html" class="menu-banner-img"><img src="{{ asset('frontend/image/') }}/menu-banner02.jpg" alt="menu-image" class="img-fluid"></a>
                                                        <a href="grid-list.html" class="menu-banner-title"><span>Special product</span></a>
                                                    </li>
                                                    <li class="menu-banner">
                                                        <a href="grid-list.html" class="menu-banner-img"><img src="{{ asset('frontend/image/') }}/menu-banner03.jpg" alt="mneu image" class="img-fluid"></a>
                                                        <a href="grid-list.html" class="menu-banner-title"><span>Featured product</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="javascript:void(0)" class="link-title">
                                                    <span class="sp-link-title">Pages</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <a href="#collapse-top-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                    <span class="sp-link-title">Pages</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu sub-menu collapse" id="collapse-top-page-menu">
                                                    <li class="submenu-li">
                                                        <a href="about-us.html" class="submenu-link">About us</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="javascript:void(0)" class="g-l-link"><span>Account</span> <i class="fa fa-angle-right"></i></a>
                                                        <a href="#account-menu" data-bs-toggle="collapse" class="sub-link"><span>Account</span> <i class="fa fa-angle-down"></i></a>
                                                        <ul class="collapse blog-style-1" id="account-menu">
                                                            <li>
                                                                <a href="order-history.html" class="sub-style"><span>Order</span></a>
                                                                <a href="order-history.html" class="blog-sub-style"><span>Order</span></a>
                                                                <a href="profile.html" class="sub-style"><span>Profile</span></a>
                                                                <a href="profile.html" class="blog-sub-style"><span>Profile</span></a>
                                                                <a href="pro-addresses.html" class="sub-style"><span>Address</span></a>
                                                                <a href="pro-addresses.html" class="blog-sub-style"><span>Address</span></a>
                                                                <a href="pro-wishlist.html" class="sub-style"><span>Wishlist</span></a>
                                                                <a href="pro-wishlist.html" class="blog-sub-style"><span>Wishlist</span></a>
                                                                <a href="pro-tickets.html" class="sub-style"><span>My tickets</span></a>
                                                                <a href="pro-tickets.html" class="blog-sub-style"><span>My tickets</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="billing-info.html" class="submenu-link">Billing info</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="cancellation.html" class="submenu-link">Cancellation</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="cart.html" class="submenu-link">Cart page</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="coming-soon.html" class="submenu-link">Coming soon</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="faq%27s.html" class="submenu-link">Faq's</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="forgot-password.html" class="submenu-link">Forgot passowrd</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="order-complete.html" class="submenu-link">Order complete</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="tracking.html" class="submenu-link">Track page</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="contact.html" class="submenu-link">Contact us</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="payment-policy.html" class="submenu-link">Payment policy</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="privacy-policy.html" class="submenu-link">privacy policy</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="return-policy.html" class="submenu-link">Return policy</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="terms-conditions.html" class="submenu-link">Terms & conditions</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="wishlist.html" class="submenu-link">Wishlist</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="sitemap.html" class="submenu-link">Sitemap</a>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="fnf-page.html" class="submenu-link">4 not 4</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="javascript:void(0)" class="link-title">
                                                    <span class="sp-link-title">Blogs</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <a href="#blog-style" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                    <span class="sp-link-title">Blogs</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu sub-menu collapse" id="blog-style">
                                                    <li class="submenu-li">
                                                        <a href="javascript:void(0)" class="g-l-link"><span>Blog grid</span> <i class="fa fa-angle-right"></i></a>
                                                        <a href="#blog-style03" data-bs-toggle="collapse" class="sub-link"><span>Blog grid</span> <i class="fa fa-angle-down"></i></a>
                                                        <ul class="collapse blog-style-1" id="blog-style03">
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#grid1" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="grid1">
                                                                    <li><a href="blog-style-1-3-grid.html">Blog 3 grid</a></li>
                                                                    <li><a href="blog-style-1-left-3-grid.html">Left blog 3 grid</a></li>
                                                                    <li><a href="blog-style-1-right-3-grid.html">Right blog 3 grid</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#grid2" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="grid2">
                                                                    <li><a href="blog-style-2-3-grid.html">Blog 3 grid</a></li>
                                                                    <li><a href="blog-style-2-left-3-grid.html">Left blog 3 grid</a></li>
                                                                    <li><a href="blog-style-2-right-3-grid.html">Right blog 3 grid</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#grid3" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="grid3">
                                                                    <li><a href="blog-style-3-grid.html">Blog 3 grid</a></li>
                                                                    <li><a href="blog-style-3-left-grid-blog.html">Left blog 3 grid</a></li>
                                                                    <li><a href="blog-style-3-right-grid-blog.html">Right blog 3 grid</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#grid4" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="grid4">
                                                                    <li><a href="blog-style-5-3-grid.html">Blog 3 grid</a></li>
                                                                    <li><a href="blog-style-5-left-3-grid.html">Left blog 3 grid</a></li>
                                                                    <li><a href="blog-style-5-right-3-grid.html">Right blog 3 grid</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#grid5" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="grid5">
                                                                    <li><a href="blog-style-6-3-grid.html">Blog 3 grid</a></li>
                                                                    <li><a href="blog-style-6-left-3-grid.html">Left blog 3 grid</a></li>
                                                                    <li><a href="blog-style-6-right-3-grid.html">Right blog 3 grid</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#grid6" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="grid6">
                                                                    <li><a href="blog-style-7-3-grid.html">Blog 3 grid</a></li>
                                                                    <li><a href="blog-style-7-left-grid-blog.html">Left blog 3 grid</a></li>
                                                                    <li><a href="blog-style-7-right-grid-blog.html">Right blog 3 grid</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="javascript:void(0)" class="g-l-link"><span>Blog list</span> <i class="fa fa-angle-right"></i></a>
                                                        <a href="#blog-style01" data-bs-toggle="collapse" class="sub-link"><span>Blog list</span> <i class="fa fa-angle-down"></i></a>
                                                        <ul class="collapse blog-style-1" id="blog-style01">
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-1" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-1">
                                                                    <li><a href="blog-style-1-list.html">Blog list</a></li>
                                                                    <li><a href="blog-style-1-left-list.html">Left blog list</a></li>
                                                                    <li><a href="blog-style-1-right-list.html">Right blog list</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-22" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-22">
                                                                    <li><a href="blog-style-2-list.html">Blog list</a></li>
                                                                    <li><a href="blog-style-2-left-list.html">Left blog list</a></li>
                                                                    <li><a href="blog-style-2-right-list.html">Right blog list</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-33" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-33">
                                                                    <li><a href="blog-style-3-list.html">Blog list</a></li>
                                                                    <li><a href="blog-style-3-left-list-blog.html">Left blog list</a></li>
                                                                    <li><a href="blog-style-3-right-list-blog.html">Right blog list</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-44" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-44">
                                                                    <li><a href="blog-style-5-list-blog.html">Blog list</a></li>
                                                                    <li><a href="blog-style-5-left-list.html">Left blog list</a></li>
                                                                    <li><a href="blog-style-5-right-list.html">Right blog list</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-55" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-55">
                                                                    <li><a href="blog-style-6-list-blog.html">Blog list</a></li>
                                                                    <li><a href="blog-style-6-left-list-blog.html">Left blog list</a></li>
                                                                    <li><a href="blog-style-6-right-list-blog.html">Right blog list</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-66" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-66">
                                                                    <li><a href="blog-style-7-list-blog.html">Blog list</a></li><!--list-->
                                                                    <li><a href="blog-style-7-left-list-blog.html">Left blog list</a></li><!--list-->
                                                                    <li><a href="blog-style-7-right-list-blog.html">Right blog list</a></li><!--list-->
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="javascript:void(0)" class="g-l-link"><span>Blog details</span> <i class="fa fa-angle-right"></i></a>
                                                        <a href="#blog-style02" data-bs-toggle="collapse" class="sub-link"><span>Blog Details</span> <i class="fa fa-angle-down"></i></a>
                                                        <ul class="collapse blog-style-1 ex-width" id="blog-style02">
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog details style 1</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list-11" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 1</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list-11">
                                                                    <li><a href="blog-style-1-details.html">Blog details</a></li>
                                                                    <li><a href="blog-style-1-left-details.html">Left blog details</a></li>
                                                                    <li><a href="blog-style-1-right-details.html">Right blog details</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog details style 2</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list2" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 2</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list2">
                                                                    <li><a href="blog-style-2-details.html">Blog details</a></li>
                                                                    <li><a href="blog-style-2-left-details.html">Left blog details</a></li>
                                                                    <li><a href="blog-style-2-right-details.html">Right blog details</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog details style 3</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list3" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 3</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list3">
                                                                    <li><a href="blog-style-3-details.html">Blog details</a></li>
                                                                    <li><a href="blog-style-3-left-blog-details.html">Left blog details</a></li>
                                                                    <li><a href="blog-style-3-right-blog-details.html">Right blog details</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog details style 4</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list4" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 4</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list4">
                                                                    <li><a href="blog-style-5-details.html">Blog details</a></li>
                                                                    <li><a href="blog-style-5-left-details.html">Left blog details</a></li>
                                                                    <li><a href="blog-style-5-right-details.html">Right blog details</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog details style 5</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list5" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 5</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list5">
                                                                    <li><a href="blog-style-6-details.html">Blog details</a></li>
                                                                    <li><a href="blog-style-6-left-details-blog.html">Left blog details</a></li>
                                                                    <li><a href="blog-style-6-right-details-blog.html">Right blog details</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="sub-style"><span>Blog details style 6</span><i class="fa fa-angle-right"></i></a>
                                                                <a href="#list6" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 6</span><i class="fa fa-angle-right"></i></a>
                                                                <ul class="grid-style collapse" id="list6">
                                                                    <li><a href="blog-style-7-details.html">Blog details</a></li>
                                                                    <li><a href="blog-style-7-left-details.html">Left blog details</a></li>
                                                                    <li><a href="blog-style-7-right-details.html">Right blog details</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="submenu-li">
                                                        <a href="javascript:void(0)" class="g-l-link"><span>Center blog</span> <i class="fa fa-angle-right"></i></a>
                                                        <a href="#center-blog" data-bs-toggle="collapse" class="sub-link"><span>Center blog</span> <i class="fa fa-angle-down"></i></a>
                                                        <ul class="collapse blog-style-1" id="center-blog">
                                                            <li>
                                                                <a href="blog-style-1-center-blog.html" class="sub-style"><span>Blog style 1</span></a>
                                                                <a href="blog-style-1-center-blog.html" class="blog-sub-style"><span>Blog style 1</span></a>
                                                                <a href="blog-style-2-center-blog.html" class="sub-style"><span>Blog style 2</span></a>
                                                                <a href="blog-style-2-center-blog.html" class="blog-sub-style"><span>Blog style 2</span></a>
                                                                <a href="blog-style-3-center-blog.html" class="sub-style"><span>Blog style 3</span></a>
                                                                <a href="blog-style-3-center-blog.html" class="blog-sub-style"><span>Blog style 3</span></a>
                                                                <a href="blog-style-5-center-blog.html" class="sub-style"><span>Blog style 4</span></a>
                                                                <a href="blog-style-5-center-blog.html" class="blog-sub-style"><span>Blog style 4</span></a>
                                                                <a href="blog-style-6-center-blog.html" class="sub-style"><span>Blog style 5</span></a>
                                                                <a href="blog-style-6-center-blog.html" class="blog-sub-style"><span>Blog style 5</span></a>
                                                                <a href="blog-style-7-center-blog.html" class="sub-style"><span>Blog style 6</span></a>
                                                                <a href="blog-style-7-center-blog.html" class="blog-sub-style"><span>Blog style 6</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="javascript:void(0)" class="link-title">
                                                    <span class="sp-link-title">Feature</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <a href="#feature1" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                    <span class="sp-link-title">Feature</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu mega-menu collapse" id="feature1">
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Header style</h2>
                                                        <a href="#feature01" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Header style</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="feature01">
                                                            <li class="supmenu-li"><a href="header-style-1.html">Header style 1</a></li>
                                                            <li class="supmenu-li"><a href="header-style-2.html">Header style 2</a></li>
                                                            <li class="supmenu-li"><a href="header-style-3.html">Header style 3</a></li>
                                                            <li class="supmenu-li"><a href="header-style-4.html">Header style 4</a></li>
                                                            <li class="supmenu-li"><a href="header-style-5.html">Header style 5</a></li>
                                                            <li class="supmenu-li"><a href="header-style-6.html">Header style 6</a></li>
                                                            <li class="supmenu-li"><a href="header-style-7.html">Header style 7</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Footer style</h2>
                                                        <a href="#feature02" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Footer style</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="feature02">
                                                            <li class="supmenu-li"><a href="footer-style-1.html">Footer style 1</a></li>
                                                            <li class="supmenu-li"><a href="footer-style-2.html">Footer style 2</a></li>
                                                            <li class="supmenu-li"><a href="footer-style-3.html">Footer style 3</a></li>
                                                            <li class="supmenu-li"><a href="footer-style-4.html">Footer style 4</a></li>
                                                            <li class="supmenu-li"><a href="footer-style-5.html">Footer style 5</a></li>
                                                            <li class="supmenu-li"><a href="footer-style-6.html">Footer style 6</a></li>
                                                            <li class="supmenu-li"><a href="footer-style-7.html">Footer style 7</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Product details</h2>
                                                        <a href="#feature03" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Product details</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="feature03">
                                                            <li class="supmenu-li"><a href="product.html">Product details style 1</a></li>
                                                            <li class="supmenu-li"><a href="product-style-2.html">Product details style 2</a></li>
                                                            <li class="supmenu-li"><a href="product-style-3.html">Product details style 3</a></li>
                                                            <li class="supmenu-li"><a href="product-style-4.html">Product details style 4</a></li>
                                                            <li class="supmenu-li"><a href="product-style-5.html">Product details style 5</a></li>
                                                            <li class="supmenu-li"><a href="product-style-6.html">Product details style 6</a></li>
                                                            <li class="supmenu-li"><a href="product-style-7.html">Product details style 7</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="megamenu-li parent">
                                                        <h2 class="sublink-title">Other style</h2>
                                                        <a href="#feature04" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                            <span>Other style</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-supmenu collapse" id="feature04">
                                                            <li class="supmenu-li"><a href="checkout-1.html">Checkout style 1</a></li>
                                                            <li class="supmenu-li"><a href="checkout-2.html">Checkout style 2</a></li>
                                                            <li class="supmenu-li"><a href="checkout-3.html">Checkout style 3</a></li>
                                                            <li class="supmenu-li"><a href="cart.html">Cart style 1</a></li>
                                                            <li class="supmenu-li"><a href="cart-2.html">Cart style 2</a></li>
                                                            <li class="supmenu-li"><a href="cart-3.html">Cart style 3</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- main menu end -->
                                <!-- header icon start -->
                                <div class="header-element right-block-box">
                                    <ul class="shop-element">
                                        <li class="side-wrap nav-toggler">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                                            <span class="line"></span>
                                            </button>
                                        </li>
                                        <li class="side-wrap search-wrap">
                                            <div class="search-rap">
                                                <a href="#search-modal" class="search-popuup" data-bs-toggle="modal"><i class="fa fa-search" aria-hidden="true"></i></a>
                                            </div>
                                        </li>
                                        <li class="side-wrap wishlist-wrap">
                                            <a href="{{ route('wishlist') }}" class="header-wishlist">
                                                <span class="wishlist-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                                <span class="wishlist-counter">
                                                    @auth('customer')
                                                    {{ Auth::guard('customer')->user()->wishlists->count() }}
                                                    @else
                                                    0
                                                    @endauth</span>
                                            </a>
                                        </li>
                                        <li class="side-wrap cart-wrap">
                                            <div class="shopping-widget">
                                                <div class="shopping-cart">
                                                    @auth('customer')
                                                    <a href="javascript:void(0)" class="cart-count">
                                                        <span class="cart-icon-wrap">
                                                            <span class="cart-icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                                                            <span id="cart-total" class="bigcounter">{{ Auth::guard('customer')->user()->Cart->count() }}</span>
                                                        </span>
                                                    </a>
                                                    @else
                                                    <a href="{{ route('customer.login') }}" class="cart-count">
                                                        <span class="cart-icon-wrap">
                                                            <span class="cart-icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                                                            <span id="cart-total" class="bigcounter">0</span>
                                                        </span>
                                                    </a>
                                                    @endauth
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- header icon end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile menu start -->
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="main-menu-area">
                                <div class="main-navigation navbar-expand-xl">
                                    <div class="box-header menu-close">
                                        <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                    </div>
                                    <div class="navbar-collapse" id="navbarContent">
                                        <div class="megamenu-content">
                                            <div class="mainwrap">
                                                <ul class="main-menu">
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Home</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-home" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Home</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu sub-menu collapse" id="collapse-home">
                                                            <li class="submenu-li">
                                                                <a href="index1.html" class="submenu-link">Vegist home 01</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="../vegist-rtl/index1.html" class="submenu-link">Vegist home 01 (RTL)</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="../vegist-box/index1.html" class="submenu-link">Vegist home 01 (BOX)</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index2.html" class="submenu-link">Vegist home 02</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index3.html" class="submenu-link">Vegist home 03</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index4.html" class="submenu-link">Vegist home 04</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index5.html" class="submenu-link">Vegist home 05</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index6.html" class="submenu-link">Vegist home 06</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index7.html" class="submenu-link">Vegist home 07</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index8.html" class="submenu-link">Vegist home 08</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index9.html" class="submenu-link">Vegist home 09</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index10.html" class="submenu-link">Vegist home 10</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index11.html" class="submenu-link">Vegist home 11</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index12.html" class="submenu-link">Vegist home 12</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index13.html" class="submenu-link">Vegist home 13</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index14.html" class="submenu-link">Vegist home 14</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index15.html" class="submenu-link">Vegist home 15</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="index16.html" class="submenu-link">Vegist home 16</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Shop</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-mega-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Shop</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu mega-menu collapse" id="collapse-mega-menu">
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Fresh food</h2>
                                                                <a href="#collapse-sub-mega-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Fresh food</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="collapse-sub-mega-menu">
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fruit & nut</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Snack food</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Organics nut gifts</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Non dairy</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Mayonnaise</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Milk almond</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Mixedfruits</h2>
                                                                <a href="#collapse-fruits-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Mixedfruits</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="collapse-fruits-menu">
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Oranges</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Coffee creamers</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Ghee beverages</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Ranch salad</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Hemp milk</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Nuts & seeds</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Bananas & plantains</h2>
                                                                <a href="#collapse-banana-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Bananas & plantains</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="collapse-banana-menu">
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fresh gala</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fresh berries</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fruit & nut</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fifts mixed fruits</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Oranges</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Oranges</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Apples berries</h2>
                                                                <a href="#collapse-apple-menu" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Apples berries</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="collapse-apple-menu">
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Pears produce</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Bananas</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Natural grassbeab</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fresh green orange</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Fresh organic reachter</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Balckberry 100%organic</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Collection</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-banner-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Collection</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu banner-menu collapse" id="collapse-banner-menu">
                                                            <li class="menu-banner">
                                                                <a href="grid-list.html" class="menu-banner-img"><img src="{{ asset('frontend/image/') }}/menu-banner01.jpg" alt="menu-image" class="img-fluid"></a>
                                                                <a href="grid-list.html" class="menu-banner-title"><span>Bestseller</span></a>
                                                            </li>
                                                            <li class="menu-banner">
                                                                <a href="grid-list.html" class="menu-banner-img"><img src="{{ asset('frontend/image/') }}/menu-banner02.jpg" alt="menu-image" class="img-fluid"></a>
                                                                <a href="grid-list.html" class="menu-banner-title"><span>Special product</span></a>
                                                            </li>
                                                            <li class="menu-banner">
                                                                <a href="grid-list.html" class="menu-banner-img"><img src="{{ asset('frontend/image/') }}/menu-banner03.jpg" alt="mneu image" class="img-fluid"></a>
                                                                <a href="grid-list.html" class="menu-banner-title"><span>Featured product</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Pages</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Pages</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                            <li class="submenu-li">
                                                                <a href="about-us.html" class="submenu-link">About us</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="javascript:void(0)" class="g-l-link"><span>Account</span> <i class="fa fa-angle-right"></i></a>
                                                                <a href="#account-menu01" data-bs-toggle="collapse" class="sub-link"><span>Account</span> <i class="fa fa-angle-down"></i></a>
                                                                <ul class="collapse blog-style-1" id="account-menu01">
                                                                    <li>
                                                                        <a href="order-history.html" class="sub-style"><span>Order</span></a>
                                                                        <a href="order-history.html" class="blog-sub-style"><span>Order</span></a>
                                                                        <a href="profile.html" class="sub-style"><span>Profile</span></a>
                                                                        <a href="profile.html" class="blog-sub-style"><span>Profile</span></a>
                                                                        <a href="pro-addresses.html" class="sub-style"><span>Address</span></a>
                                                                        <a href="pro-addresses.html" class="blog-sub-style"><span>Address</span></a>
                                                                        <a href="pro-wishlist.html" class="sub-style"><span>Wishlist</span></a>
                                                                        <a href="pro-wishlist.html" class="blog-sub-style"><span>Wishlist</span></a>
                                                                        <a href="pro-tickets.html" class="sub-style"><span>My tickets</span></a>
                                                                        <a href="pro-tickets.html" class="blog-sub-style"><span>My tickets</span></a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="billing-info.html" class="submenu-link">Billing info</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="cancellation.html" class="submenu-link">Cancellation</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="cart.html" class="submenu-link">Cart page</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="coming-soon.html" class="submenu-link">Coming soon</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="faq%27s.html" class="submenu-link">Faq's</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="forgot-password.html" class="submenu-link">Forgot passowrd</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="order-complete.html" class="submenu-link">Order complete</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="tracking.html" class="submenu-link">Track page</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="contact.html" class="submenu-link">Contact us</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="payment-policy.html" class="submenu-link">Payment policy</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="privacy-policy.html" class="submenu-link">privacy policy</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="return-policy.html" class="submenu-link">Return policy</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="terms-conditions.html" class="submenu-link">Terms & conditions</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="wishlist.html" class="submenu-link">Wishlist</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="sitemap.html" class="submenu-link">Sitemap</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="fnf-page.html" class="submenu-link">4 not 4</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Blogs</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#blog-grid-style01" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Blogs</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu sub-menu collapse" id="blog-grid-style01">
                                                            <li class="submenu-li">
                                                                <a href="javascript:void(0)" class="g-l-link"><span>Blog grid</span> <i class="fa fa-angle-right"></i></a>
                                                                <a href="#blog-style-03" data-bs-toggle="collapse" class="sub-link"><span>Blog grid</span> <i class="fa fa-angle-down"></i></a>
                                                                <ul class="collapse blog-style-1" id="blog-style-03">
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#grid-1" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="grid-1">
                                                                            <li><a href="blog-style-1-3-grid.html">Blog 3 grid</a></li>
                                                                            <li><a href="blog-style-1-left-3-grid.html">Left blog 3 grid</a></li>
                                                                            <li><a href="blog-style-1-right-3-grid.html">Right blog 3 grid</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#grid-2" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="grid-2">
                                                                            <li><a href="blog-style-2-3-grid.html">Blog 3 grid</a></li>
                                                                            <li><a href="blog-style-2-left-3-grid.html">Left blog 3 grid</a></li>
                                                                            <li><a href="blog-style-2-right-3-grid.html">Right blog 3 grid</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#grid-3" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="grid-3">
                                                                            <li><a href="blog-style-3-grid.html">Blog 3 grid</a></li>
                                                                            <li><a href="blog-style-3-left-grid-blog.html">Left blog 3 grid</a></li>
                                                                            <li><a href="blog-style-3-right-grid-blog.html">Right blog 3 grid</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#grid-4" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="grid-4">
                                                                            <li><a href="blog-style-5-3-grid.html">Blog 3 grid</a></li>
                                                                            <li><a href="blog-style-5-left-3-grid.html">Left blog 3 grid</a></li>
                                                                            <li><a href="blog-style-5-right-3-grid.html">Right blog 3 grid</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#grid-5" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="grid-5">
                                                                            <li><a href="blog-style-6-3-grid.html">Blog 3 grid</a></li>
                                                                            <li><a href="blog-style-6-left-3-grid.html">Left blog 3 grid</a></li>
                                                                            <li><a href="blog-style-6-right-3-grid.html">Right blog 3 grid</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#grid-6" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="grid-6">
                                                                            <li><a href="blog-style-7-3-grid.html">Blog 3 grid</a></li>
                                                                            <li><a href="blog-style-7-left-grid-blog.html">Left blog 3 grid</a></li>
                                                                            <li><a href="blog-style-7-right-grid-blog.html">Right blog 3 grid</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="javascript:void(0)" class="g-l-link"><span>Blog list</span> <i class="fa fa-angle-right"></i></a>
                                                                <a href="#blog-list-style" data-bs-toggle="collapse" class="sub-link"><span>Blog list</span> <i class="fa fa-angle-down"></i></a>
                                                                <ul class="collapse blog-style-1" id="blog-list-style">
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-list-1" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 1</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-list-1">
                                                                            <li><a href="blog-style-1-list.html">Blog list</a></li>
                                                                            <li><a href="blog-style-1-left-list.html">Left blog list</a></li>
                                                                            <li><a href="blog-style-1-right-list.html">Right blog list</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-list-2" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 2</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-list-2">
                                                                            <li><a href="blog-style-2-list.html">Blog list</a></li>
                                                                            <li><a href="blog-style-2-left-list.html">Left blog list</a></li>
                                                                            <li><a href="blog-style-2-right-list.html">Right blog list</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-list-3" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 3</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-list-3">
                                                                            <li><a href="blog-style-3-list.html">Blog list</a></li>
                                                                            <li><a href="blog-style-3-left-list-blog.html">Left blog list</a></li>
                                                                            <li><a href="blog-style-3-right-list-blog.html">Right blog list</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-list-4" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 4</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-list-4">
                                                                            <li><a href="blog-style-5-list-blog.html">Blog list</a></li>
                                                                            <li><a href="blog-style-5-left-list.html">Left blog list</a></li>
                                                                            <li><a href="blog-style-5-right-list.html">Right blog list</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-list-5" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 5</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-list-5">
                                                                            <li><a href="blog-style-6-list-blog.html">Blog list</a></li>
                                                                            <li><a href="blog-style-6-left-list-blog.html">Left blog list</a></li>
                                                                            <li><a href="blog-style-6-right-list-blog.html">Right blog list</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-list-6" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog style 6</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-list-6">
                                                                            <li><a href="blog-style-7-list-blog.html">Blog list</a></li><!--list-->
                                                                            <li><a href="blog-style-7-left-list-blog.html">Left blog list</a></li><!--list-->
                                                                            <li><a href="blog-style-7-right-list-blog.html">Right blog list</a></li><!--list-->
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="javascript:void(0)" class="g-l-link"><span>Blog details</span> <i class="fa fa-angle-right"></i></a>
                                                                <a href="#blog-details-style" data-bs-toggle="collapse" class="sub-link"><span>Blog Details</span> <i class="fa fa-angle-down"></i></a>
                                                                <ul class="collapse blog-style-1 ex-width" id="blog-details-style">
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog details style 1</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-details-1" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 1</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-details-1">
                                                                            <li><a href="blog-style-1-details.html">Blog details</a></li>
                                                                            <li><a href="blog-style-1-left-details.html">Left blog details</a></li>
                                                                            <li><a href="blog-style-1-right-details.html">Right blog details</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog details style 2</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-details-2" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 2</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-details-2">
                                                                            <li><a href="blog-style-2-details.html">Blog details</a></li>
                                                                            <li><a href="blog-style-2-left-details.html">Left blog details</a></li>
                                                                            <li><a href="blog-style-2-right-details.html">Right blog details</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog details style 3</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-details-3" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 3</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-details-3">
                                                                            <li><a href="blog-style-3-details.html">Blog details</a></li>
                                                                            <li><a href="blog-style-3-left-blog-details.html">Left blog details</a></li>
                                                                            <li><a href="blog-style-3-right-blog-details.html">Right blog details</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog details style 4</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-details-4" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 4</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-details-4">
                                                                            <li><a href="blog-style-5-details.html">Blog details</a></li>
                                                                            <li><a href="blog-style-5-left-details.html">Left blog details</a></li>
                                                                            <li><a href="blog-style-5-right-details.html">Right blog details</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog details style 5</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-details-5" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 5</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-details-5">
                                                                            <li><a href="blog-style-6-details.html">Blog details</a></li>
                                                                            <li><a href="blog-style-6-left-details-blog.html">Left blog details</a></li>
                                                                            <li><a href="blog-style-6-right-details-blog.html">Right blog details</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="sub-style"><span>Blog details style 6</span><i class="fa fa-angle-right"></i></a>
                                                                        <a href="#blog-details-6" data-bs-toggle="collapse" class="blog-sub-style"><span>Blog details style 6</span><i class="fa fa-angle-right"></i></a>
                                                                        <ul class="grid-style collapse" id="blog-details-6">
                                                                            <li><a href="blog-style-7-details.html">Blog details</a></li>
                                                                            <li><a href="blog-style-7-left-details.html">Left blog details</a></li>
                                                                            <li><a href="blog-style-7-right-details.html">Right blog details</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="javascript:void(0)" class="g-l-link"><span>Center blog</span> <i class="fa fa-angle-right"></i></a>
                                                                <a href="#center-b" data-bs-toggle="collapse" class="sub-link"><span>Center blog</span> <i class="fa fa-angle-down"></i></a>
                                                                <ul class="collapse blog-style-1" id="center-b">
                                                                    <li>
                                                                        <a href="blog-style-1-center-blog.html" class="sub-style"><span>Blog style 1</span></a>
                                                                        <a href="blog-style-1-center-blog.html" class="blog-sub-style"><span>Blog style 1</span></a>
                                                                        <a href="blog-style-2-center-blog.html" class="sub-style"><span>Blog style 2</span></a>
                                                                        <a href="blog-style-2-center-blog.html" class="blog-sub-style"><span>Blog style 2</span></a>
                                                                        <a href="blog-style-3-center-blog.html" class="sub-style"><span>Blog style 3</span></a>
                                                                        <a href="blog-style-3-center-blog.html" class="blog-sub-style"><span>Blog style 3</span></a>
                                                                        <a href="blog-style-5-center-blog.html" class="sub-style"><span>Blog style 4</span></a>
                                                                        <a href="blog-style-5-center-blog.html" class="blog-sub-style"><span>Blog style 4</span></a>
                                                                        <a href="blog-style-6-center-blog.html" class="sub-style"><span>Blog style 5</span></a>
                                                                        <a href="blog-style-6-center-blog.html" class="blog-sub-style"><span>Blog style 5</span></a>
                                                                        <a href="blog-style-7-center-blog.html" class="sub-style"><span>Blog style 6</span></a>
                                                                        <a href="blog-style-7-center-blog.html" class="blog-sub-style"><span>Blog style 6</span></a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Feature</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#feature10" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Feature</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu mega-menu collapse" id="feature10">
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Header style</h2>
                                                                <a href="#feature08" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Header style</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="feature08">
                                                                    <li class="supmenu-li"><a href="header-style-1.html">Header style 1</a></li>
                                                                    <li class="supmenu-li"><a href="header-style-2.html">Header style 2</a></li>
                                                                    <li class="supmenu-li"><a href="header-style-3.html">Header style 3</a></li>
                                                                    <li class="supmenu-li"><a href="header-style-4.html">Header style 4</a></li>
                                                                    <li class="supmenu-li"><a href="header-style-5.html">Header style 5</a></li>
                                                                    <li class="supmenu-li"><a href="header-style-6.html">Header style 6</a></li>
                                                                    <li class="supmenu-li"><a href="header-style-7.html">Header style 7</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Footer style</h2>
                                                                <a href="#feature07" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Footer style</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="feature07">
                                                                    <li class="supmenu-li"><a href="footer-style-1.html">Footer style 1</a></li>
                                                                    <li class="supmenu-li"><a href="footer-style-2.html">Footer style 2</a></li>
                                                                    <li class="supmenu-li"><a href="footer-style-3.html">Footer style 3</a></li>
                                                                    <li class="supmenu-li"><a href="footer-style-4.html">Footer style 4</a></li>
                                                                    <li class="supmenu-li"><a href="footer-style-5.html">Footer style 5</a></li>
                                                                    <li class="supmenu-li"><a href="footer-style-6.html">Footer style 6</a></li>
                                                                    <li class="supmenu-li"><a href="footer-style-7.html">Footer style 7</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Product details</h2>
                                                                <a href="#feature06" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Product details</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="feature06">
                                                                    <li class="supmenu-li"><a href="product.html">Product details style 1</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-2.html">Product details style 2</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-3.html">Product details style 3</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-4.html">Product details style 4</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-5.html">Product details style 5</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-6.html">Product details style 6</a></li>
                                                                    <li class="supmenu-li"><a href="product-style-7.html">Product details style 7</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="megamenu-li parent">
                                                                <h2 class="sublink-title">Other style</h2>
                                                                <a href="#feature05" data-bs-toggle="collapse" class="sublink-title sublink-title-lg">
                                                                    <span>Other style</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-supmenu collapse" id="feature05">
                                                                    <li class="supmenu-li"><a href="checkout-1.html">Checkout style 1</a></li>
                                                                    <li class="supmenu-li"><a href="checkout-2.html">Checkout style 2</a></li>
                                                                    <li class="supmenu-li"><a href="checkout-3.html">Checkout style 3</a></li>
                                                                    <li class="supmenu-li"><a href="cart.html">Cart style 1</a></li>
                                                                    <li class="supmenu-li"><a href="cart-2.html">Cart style 2</a></li>
                                                                    <li class="supmenu-li"><a href="cart-3.html">Cart style 3</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile menu end -->
            <!-- minicart start -->
            @auth('customer')
            @php
                $carts = Auth::guard('customer')->user()->Cart;
                $subtotal = 0;
            @endphp
            @endauth



            @auth('customer')
            <div class="mini-cart">
                <a href="javascript:void(0)" class="shopping-cart-close"><i class="ion-close-round"></i></a>
                <div class="cart-item-title">
                    <p>
                        <span class="cart-count-desc">There are</span>
                        <span class="cart-count-item bigcounter">{{ $carts->count() }}</span>
                        <span class="cart-count-desc">Products</span>
                    </p>
                </div>
                <ul class="cart-item-loop">
                    @foreach ($carts as $cart)
                        <li class="cart-item" id="cart-item-{{ $cart->id }}">
                            <div class="cart-img">
                                <a href="{{ route('product.details', $cart->Product->slug) }}">
                                    <img src="{{ asset($cart->Product->preview_img) }}" alt="cart-image" class="img-fluid">
                                </a>
                            </div>
                            <div class="cart-title">
                                <h6><a href="{{ route('product.details', $cart->Product->slug) }}">{{ $cart->Product->product_name }}</a></h6>
                                <div class="cart-pro-info">
                                    <div class="cart-qty-price">
                                        <span class="quantity">{{ $cart->quantity }} x </span>
                                        <span class="price-box">&#2547; {{ round($cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount) }}</span>
                                        <span class="d-block mt-1">Size: {{ $cart->Size->size_name }}</span>
                                        <span class="d-block mt-1">Color: {{ $cart->Color->color_name }}</span>
                                    </div>
                                    <div class="delete-item-cart">
                                        <a href="#" class="delete-cart-item" data-cart-id="{{ $cart->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </li>
                        @php
                            $subtotal += $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount * $cart->quantity;
                        @endphp
                    @endforeach
                </ul>
                <ul class="subtotal-title-area">
                    <li class="subtotal-info">
                        <div class="subtotal-titles">
                            <h6>Sub total:</h6>
                            <span class="subtotal-price">&#2547; {{ $subtotal }}</span>
                        </div>
                    </li>
                    <li class="mini-cart-btns">
                        <div class="cart-btns">
                            <a href="{{ route('cart.page') }}" class="btn btn-style2">View cart</a>
                            <a href="checkout-2.html" class="btn btn-style2">Checkout</a>
                        </div>
                    </li>
                </ul>
            </div>
            @endauth
            <!-- minicart end -->
            <!-- search start -->
            <div class="modal fade" id="search-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="search-content">
                                            <div class="search-engine">
                                                <input type="text" name="search" placeholder="Search products,brands or advice">
                                                <a href="search.html" class="search-btn"><i class="ion-ios-search-strong"></i></a>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="ion-close-round"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search end -->
        </header>
        <!-- header end -->

        @yield('content')


        <!-- footer start -->
        <section class="footer-one section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="f-logo">
                            <ul class="footer-ul">
                                <li class="footer-li footer-logo">
                                    <a href="/">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/logo2.png" alt="">
                                    </a>
                                </li>
                                <li class="footer-li footer-address">
                                    <ul class="f-ul-li-ul">
                                        <li class="footer-icon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </li>
                                        <li class="footer-info">
                                            <h6>Location</h6>
                                            <span>401 Broadway 24th floor
                                            </span>
                                            <span>Near ant mall cross road</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer-li footer-contact">
                                    <ul class="f-ul-li-ul">
                                        <li class="footer-icon">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </li>
                                        <li class="footer-info">
                                            <h6>Get in touch</h6>
                                            <a href="tel:1-800-222-000">Phone: 1-800-222-000</a>
                                            <a href="mailto:demo@demo.com">Email: demo@demo.com</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer-li footer-contact">
                                    <ul class="f-ul-li-ul">
                                        <li class="footer-icon">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </li>
                                        <li class="footer-info">
                                            <h6>Help</h6>
                                            <span>Lorem ipsum is simply</span>
                                            <span>Dummy the printing</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-bottom">
                            <div class="footer-link" id="footer-accordian">
                                <div class="f-link">
                                    <h2 class="h-footer">Top categories</h2>
                                    <a href="#t-cate" data-bs-toggle="collapse" class="h-footer">
                                        <span>Top categories</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="t-cate" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="grid-list.html">Fruits</a></li>
                                        <li class="f-link-ul-li"><a href="grid-list.html">Fast foods</a></li>
                                        <li class="f-link-ul-li"><a href="grid-list.html">Vegetable</a></li>
                                        <li class="f-link-ul-li"><a href="grid-list.html">Salads</a></li>
                                        <li class="f-link-ul-li"><a href="grid-list.html">Bestseller</a></li>
                                    </ul>
                                </div>
                                <div class="f-link">
                                    <h2 class="h-footer">Services</h2>
                                    <a href="#services" data-bs-toggle="collapse" class="h-footer">
                                        <span>Services</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="services" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="about-us.html">About vegist</a></li>
                                        <li class="f-link-ul-li"><a href="faq%27s.html">Faq's</a></li>
                                        <li class="f-link-ul-li"><a href="contact.html">Contact us</a></li>
                                        <li class="f-link-ul-li"><a href="blog-style-2-3-grid.html">News</a></li>
                                        <li class="f-link-ul-li"><a href="sitemap.html">Sitemap</a></li>
                                    </ul>
                                </div>
                                <div class="f-link">
                                    <h2 class="h-footer">Privacy & terms</h2>
                                    <a href="#privacy" data-bs-toggle="collapse" class="h-footer">
                                        <span>Privacy & terms</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="privacy" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="payment-policy.html">Payment policy</a></li>
                                        <li class="f-link-ul-li"><a href="privacy-policy.html">Privacy policy</a></li>
                                        <li class="f-link-ul-li"><a href="return-policy.html">Return policy</a></li>
                                        <li class="f-link-ul-li"><a href="shipping-policy.html">Shipping policy</a></li>
                                        <li class="f-link-ul-li"><a href="terms-conditions.html">Terms & conditions</a></li>
                                    </ul>
                                </div>
                                <div class="f-link">
                                    <h2 class="h-footer">My account</h2>
                                    <a href="#account" data-bs-toggle="collapse" class="h-footer">
                                        <span>My account</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="account" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="account.html">My account</a></li>
                                        <li class="f-link-ul-li"><a href="cart-2.html">My cart</a></li>
                                        <li class="f-link-ul-li"><a href="tracking.html">Order history</a></li>
                                        <li class="f-link-ul-li"><a href="wishlist.html">My wishlist</a></li>
                                        <li class="f-link-ul-li"><a href="addresses.html">My address</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer end -->
        <!-- copyright start -->
        <section class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="f-bottom">
                            <li class="f-c f-copyright">
                                <p>Copyright <i class="fa fa-copyright"></i> 2023 spacingtech</p>
                            </li>
                            <li class="f-c f-social">
                                <a href="https://www.whatsapp.com/" class="f-icn-link"><i class="fa fa-whatsapp"></i></a>
                                <a href="https://www.facebook.com/" class="f-icn-link"><i class="fa fa-facebook-f"></i></a>
                                <a href="https://twitter.com/" class="f-icn-link"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/" class="f-icn-link"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.pinterest.com/" class="f-icn-link"><i class="fa fa-pinterest-p"></i></a>
                                <a href="https://www.youtube.com/" class="f-icn-link"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li class="f-c f-payment">
                                <a href="checkout-2.html"><img src="{{ asset('frontend/image/') }}/payment.png" class="img-fluid" alt="payment image"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- copyright end -->
        <!-- newsletter pop-up start -->
        {{-- <div class="vegist-popup animated modal fadeIn" id="myModal1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-content">
                            <!-- popup close button start -->
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                            <!-- popup close button end -->
                            <!-- popup content area start -->
                            <div class="pop-up-newsletter" style="background-image: url({{ asset('frontend/image/') }}/news-popup.jpg);">
                                <div class="logo-content">
                                    <a href="index2.html"><img src="{{ asset('frontend/image/') }}/logo2.png" alt="image" class="img-fluid"></a>
                                    <h4>Become a subscriber</h4>
                                    <span>Subscribe to get the notification of latest posts</span>
                                </div>
                                <div class="subscribe-area">
                                    <input type="text" name="comment" placeholder="Your email address">
                                    <a href="index2.html" class="btn btn-style1">Subscribe</a>
                                </div>
                            </div>
                            <!-- popup content area end -->
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- newsletter pop-up end -->
        <!-- back to top start -->
        <a href="javascript:void(0)" class="scroll" id="top">
            <span><i class="fa fa-angle-double-up"></i></span>
        </a>
        <!-- back to top end -->
        <div class="mm-fullscreen-bg"></div>
        <!-- jquery -->
        <script src="{{ asset('frontend/js/') }}/modernizr-2.8.3.min.js"></script>
        <script src="{{ asset('frontend/js/') }}/jquery-3.6.0.min.js"></script>
        <!-- bootstrap -->
        <script src="{{ asset('frontend/js/') }}/bootstrap.min.js"></script>
        <!-- popper -->
        <script src="{{ asset('frontend/js/') }}/popper.min.js"></script>
        <!-- fontawesome -->
        <script src="{{ asset('frontend/js/') }}/fontawesome.min.js"></script>
        <!-- owl carousal -->
        <script src="{{ asset('frontend/js/') }}/owl.carousel.min.js"></script>
        <!-- swiper -->
        <script src="{{ asset('frontend/js/') }}/swiper.min.js"></script>
        <script src="{{ asset('frontend/js/') }}/range-slider.js"></script>
        <!-- custom -->
        <script src="{{ asset('frontend/js/') }}/custom.js"></script>
        @yield('script')
        <script>
            $('.delete-cart-item').click(function(e) {
                    e.preventDefault();
                    var cartId = $(this).data('cart-id');
                    var url = "{{ route('cart.delete') }}";

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            cart_id: cartId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // For example, you could remove the deleted cart item from the UI
                            $('#cart-item-' + cartId).remove();
                            updateCartCount()
                        },
                        error: function(xhr) {
                            // Handle error
                            console.log(xhr.responseText);
                        }
                    });
            });

            function updateCartCount(){
                $.ajax({
                        url: '{{ route('get.cart.count') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // For example, you could remove the deleted cart item from the UI
                            $('#cart-total').html(response);
                        },
                        error: function(xhr) {
                            // Handle error
                            console.log(xhr.responseText);
                        }
                    });
            }
        </script>
    </body>

<!-- Mirrored from spacingtech.com/html/vegist-final/vegist/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2024 10:41:12 GMT -->
</html>
