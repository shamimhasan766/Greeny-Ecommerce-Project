@extends('layouts.master')
@section('content')
        <!--home page slider start-->
        <section class="home-slider-2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="menu-slider">
                            <div class="vegamenu-content">
                                <a href="#vega-menu" data-bs-toggle="collapse" class="vegamenu-title">
                                    <span class="menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    <span class="menu-cat-title">Browse category</span>
                                    <span class="menu-down-icon"><i class="fa fa-angle-down"></i></span>
                                </a>
                                <div class="main-wrap collapse" id="vega-menu">
                                    <ul class="vega-menu">
                                        @foreach ($categories as $category)
                                            @if ($category->Subcategory->isNotEmpty())

                                                <li class="menu-link parent">
                                                    <a href="javascript:void(0)" class="link-title">
                                                        <img width="30px" src="{{ asset($category->photo) }}" alt="menu-image">
                                                        <span>{{ $category->name }}</span>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-submenu collapse d-flex" id="fresh-fruits">
                                                        <li class="submenu-li parant">
                                                            <a href="#left-menu-b" data-bs-toggle="collapse" class="left-mega-menu-xl">
                                                                <span>Organic staples</span>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="submenu-megamenu-link collapse" id="left-menu-b">
                                                                @foreach ($category->Subcategory->where('status', 1) as $subcategory)
                                                                <li><a href="{{ route('subcategory.product', $subcategory->slug) }}">{{ $subcategory->subcategory }} <span class="grid-items">({{ $subcategory->Products->count() }})</span></a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li class="left-menu-link left-menu-image">
                                                            <img width="300" src="{{ asset($category->photo) }}" alt="drop-image">
                                                        </li>
                                                    </ul>
                                                </li>

                                            @else

                                                <li class="menu-link">
                                                    <a href="product-style-2.html" class="link-title">
                                                        <img width="30px" src="{{ asset($category->photo) }}" alt="manu-image">
                                                        <span>{{ $category->name }}</span>
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="home-slider-2">
                                <div class="home-slider2 owl-carousel owl-theme">
                                    <div class="items">
                                        <div class="img-back" style="background-image:url({{ asset('frontend/image/') }}/slider4.jpg);">
                                            <div class="slide-c-1 h-s-content">
                                                <span>Summer vege sale</span>
                                                <h1>Vegetable<br>farmfood</h1>
                                                <a href="grid-list-2.html" class="btn btn-style1">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="img-back" style="background-image:url({{ asset('frontend/image/') }}/slider5.jpg);">
                                            <div class="slide-c-2 h-s-content">
                                                <span>Mix masala</span>
                                                <h1>Specialties<br>recipetion</h1>
                                                <a href="grid-list-2.html" class="btn btn-style1">View collection</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="img-back" style="background-image:url({{ asset('frontend/image/') }}/slider6.jpg);">
                                            <div class="slide-c-3 h-s-content">
                                                <span>Top selling!</span>
                                                <h1>Healthier<br>testy way</h1>
                                                <a href="grid-list-2.html" class="btn btn-style1">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--home page slider end-->
        <!-- banner grid start -->
        <section class="section-tb-padding grid-banner">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="organic-food-fresh-banner">
                            <div class="offer-banner">
                                <a href="product-style-2.html" class="banner-hover">
                                    <img src="{{ asset('frontend/image/') }}/banner7.jpg" alt="offer-banner" class="img-fluid">
                                </a>
                                <div class="banner-content">
                                    <span>Organic juice</span>
                                    <h2>More fruit,<br> less illness</h2>
                                    <a href="product-style-2.html">Shop now</a>
                                </div>
                            </div>
                            <div class="offer-banner">
                                <a href="product-style-2.html" class="banner-hover">
                                    <img src="{{ asset('frontend/image/') }}/banner8.jpg" alt="offer-banner" class="img-fluid">
                                </a>
                                <div class="banner-content">
                                    <span>Fresh food</span>
                                    <h2>Vegetable <br>100% fresh</h2>
                                    <a href="product-style-2.html">Shop now</a>
                                </div>
                            </div>
                            <div class="offer-banner">
                                <a href="product-style-2.html" class="banner-hover">
                                    <img src="{{ asset('frontend/image/') }}/banner9.jpg" alt="offer-banner" class="img-fluid">
                                </a>
                                <div class="banner-content">
                                    <span>Organic dry fruits</span>
                                    <h2>Because of <br>health is life </h2>
                                    <a href="product-style-2.html">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner grid end -->
        <!-- service start -->
        <section class="service-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="service">
                            <div class="service-box">
                                <div class="s-box">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="service-content">
                                        <span>Free delivery</span>
                                        <p>Orders from all item</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service-box">
                                <div class="s-box">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                    <div class="service-content">
                                        <span>Return & refund</span>
                                        <p>Money back guarantee</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service-box">
                                <div class="s-box">
                                    <i class="fa fa-headphones" aria-hidden="true"></i>
                                    <div class="service-content">
                                        <span>Quality support</span>
                                        <p>Alway online 24/7</p>
                                    </div>
                                </div>
                            </div>
                            <div class="service-box">
                                <div class="s-box">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <div class="service-content">
                                        <span>Join newslleter</span>
                                        <p>20% off by subscribing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service end -->
        <!-- trending product start -->
        <section class="section-tb-padding trending-pro">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Trending products</h2>
                        </div>
                        <div class="home2-trending owl-carousel owl-theme">
                            @foreach ($products->where('discount', '>=', 10) as $product)
                            <div class="items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img class="img-fluid" src="{{ asset($product->preview_img) }}" alt="pro-img1">
                                            <img class="img-fluid additional-image" src="{{ asset($product->Gallery->first()->gallery_path) }}" alt="additional image">
                                        </a>
                                    </div>
                                    <div class="Pro-lable">
                                        <span class="p-discount">- {{ $product->discount }}%</span>
                                    </div>
                                    <div class="pro-icn">
                                        <a style="cursor: pointer" data-slug="{{ $product->slug }}" class="w-c-q-icn wishlist"><i class="fa fa-heart"></i></a>
                                        <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                        <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a></h3>
                                    <div class="rating">
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="pro-price">
                                        <span class="new-price">&#2547; {{ round($product->Inventory->first()->after_discount) }}</span>
                                        <span class="old-price"><del>&#2547; {{ $product->Inventory->first()->price }}</del></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trending product end -->
        <!-- category image start -->
        <section class="section-b-padding home2-category">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Shop by category</h2>
                        </div>
                        <div class="home2-cate-image owl-carousel owl-theme">
                            @foreach ($categories as $category)
                            <div class="items">
                                <div class="cate-image">
                                    <a href="{{ route('category.product', $category->slug) }}">
                                        <img src="{{ asset($category->photo) }}" class="img-fluid" alt="cate-image">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category image end -->
        <!-- deal of the day start -->
        <section class="home2-deal">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="deal-back-image" style="background-image: url({{ asset('frontend/image/') }}/dealbanner2.jpg);">
                            <div class="deal">
                                <div class="deal-content">
                                    <h2>Deal of the day!</h2>
                                    <span>We offer a hot dael offer every festival</span>
                                </div>
                                <ul class="contdown_row">
                                    <li class="countdown_section">
                                        <span id="days" class="countdown_timer">254</span>
                                        <span class="countdown_title">Days</span>
                                    </li>
                                    <li class="countdown_section">
                                        <span id="hours" class="countdown_timer">11</span>
                                        <span class="countdown_title">Hours</span>
                                    </li>
                                    <li class="countdown_section">
                                        <span id="minutes" class="countdown_timer">33</span>
                                        <span class="countdown_title">Minutes</span>
                                    </li>
                                    <li class="countdown_section">
                                        <span id="seconds" class="countdown_timer">36</span>
                                        <span class="countdown_title">Seconds</span>
                                    </li>
                                </ul>
                                <a href="grid-list-2.html" class="btn btn-style1">Shop collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- deal of the day end -->
        <!-- our product tab star -->
        <section class="section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="our-tab">
                            <div class="section-title">
                                <h2>Our products</h2>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home">New product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile">Special product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact">Bestseller</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-pro-slider">
                                <div class="tab-pane fade show active" id="home">
                                    <div class="our-products-tab swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($newproducts as $product)
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="{{ route('product.details', $product->slug) }}">
                                                                <img src="{{ asset($product->preview_img) }}" alt="pro-img1" class="img-fluid">
                                                                <img class="img-fluid additional-image" src="{{ asset($product->Gallery->first()->gallery_path) }}" alt="additional image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="{{ $product->discount ? 'p-discount' : 'p-text' }}">{{ $product->discount ? '- '.$product->discount.'%' : 'new' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        @if ($product->discount)
                                                        <div class="pro-price">
                                                            <span class="new-price">&#2547; {{ $product->Inventory->first()->after_discount }}</span>
                                                            <span class="old-price"><del>&#2547; {{ $product->Inventory->first()->price }}</del></span>
                                                        </div>
                                                        @else
                                                        <div class="pro-price">
                                                            <span class="new-price">&#2547; {{ round($product->Inventory->first()->after_discount) }}</span>
                                                        </div>
                                                        @endif
                                                        <div class="pro-icn">
                                                            <a style="cursor: pointer" data-slug="{{ $product->slug }}" class="w-c-q-icn wishlist"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn wishlist"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-buttons">
                                        <div class="content-buttons">
                                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                            <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="our-products-tab swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($products->where('discount', '>=', 20) as $product)
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="">
                                                                <img src="{{ asset($product->preview_img) }}" alt="pro-img1" class="img-fluid">
                                                                <img class="img-fluid additional-image" src="{{ asset($product->Gallery->first()->gallery_path) }}" alt="additional image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-{{ $product->discount }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="{{ route('product.details',$product->slug) }}">{{ $product->product_name }}</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        @if ($product->discount)
                                                        <div class="pro-price">
                                                            <span class="new-price">&#2547; {{ $product->Inventory->first()->after_discount }}</span>
                                                            <span class="old-price"><del>&#2547; {{ $product->Inventory->first()->price }}</del></span>
                                                        </div>
                                                        @else
                                                        <div class="pro-price">
                                                            <span class="new-price">&#2547; {{ round($product->Inventory->first()->after_discount) }}</span>
                                                        </div>
                                                        @endif
                                                        <div class="pro-icn">
                                                            <a style="cursor: pointer" data-slug="{{ $product->slug }}" class="w-c-q-icn wishlist"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-buttons">
                                        <div class="content-buttons">
                                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                            <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact">
                                    <div class="our-products-tab swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-8.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-08.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Orange juice (5ltr)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star b-star"></i>
                                                            <i class="fa fa-star b-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$93.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a style="cursor: pointer" data-slug="{{ $product->slug }}" class="w-c-q-icn wishlist"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-9.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-09.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-12%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Organic coconet (5ltr) juice</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$167.00 USD</span>
                                                            <span class="old-price"><del>$179.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-10.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-010.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Shrimp jumbo (5Lb)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$230.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-2.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-02.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh organic fruit (50gm)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$130.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-7.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-07.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh & healty food</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$126.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-3.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-03.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-20%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh apple</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$130.00 USD</span>
                                                            <span class="old-price"><del>$150.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-4.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-04.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh litchi 100% organic</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$117.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-5.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-05.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-12%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Vegetable tomato fresh</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star b-star"></i>
                                                            <i class="fa fa-star b-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$133.00 USD</span>
                                                            <span class="old-price"><del>$145.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-6.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-06.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-21%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Natural grassbean</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$139.00 USD</span>
                                                            <span class="old-price"><del>$160.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-2.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-02.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh dryed almod (50gm)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$580.00 USD</span>
                                                            <span class="old-price"><del>$590.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-8.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-08.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Orange juice (5ltr)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star b-star"></i>
                                                            <i class="fa fa-star b-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$93.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-4.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-04.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh litchi 100% organic</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$117.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-7.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-07.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh dryed almod (50gm)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$580.00 USD</span>
                                                            <span class="old-price"><del>$590.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-3.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-03.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-20%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh apple</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$130.00 USD</span>
                                                            <span class="old-price"><del>$150.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-1.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-01.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Fresh litchi 100% organic</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                            <i class="fa fa-star e-star"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$117.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-9.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-09.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-discount">-12%</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Organic coconet (5ltr) juice</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star d-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$167.00 USD</span>
                                                            <span class="old-price"><del>$179.00 USD</del></span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tab-product">
                                                    <div class="tred-pro">
                                                        <div class="tr-pro-img">
                                                            <a href="product-style-2.html">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-10.jpg" alt="pro-img1" class="img-fluid">
                                                                <img src="{{ asset('frontend/image/') }}/pro/pro-img-010.jpg" alt="additional image" class="img-fluid additional-image">
                                                            </a>
                                                        </div>
                                                        <div class="Pro-lable">
                                                            <span class="p-text">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-caption">
                                                        <h3><a href="product-style-2.html">Shrimp jumbo (5Lb)</a></h3>
                                                        <div class="rating">
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star c-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="pro-price">
                                                            <span class="new-price">$230.00 USD</span>
                                                        </div>
                                                        <div class="pro-icn">
                                                            <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                            <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-buttons">
                                        <div class="content-buttons">
                                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                            <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our product tab end -->
        <!-- testimonial start -->
        <section class="home2-testimonial testimonial2-bg section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Our customer say</h2>
                        </div>
                        <div class="home2-testi owl-carousel owl-theme">
                            <div class="items">
                                <div class="testimonial-area">
                                    <span class="tsti-title">“Flexibility”</span>
                                    <p>“ I love this theme. Higly customizable, Easy to use and very flexible theme. Great support ! Excellent response times. Very professional and helpful in all queries, absolutely awesome. Highly recommended! The theme is really amazing. Thank you Spacingtech Webify.”</p>
                                    <div class="testi-name">
                                        <h6>By disarak</h6>
                                        <span>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="testimonial-area">
                                    <span class="tsti-title">“Customer support”</span>
                                    <p>“ I love this theme. Higly customizable, Easy to use and very flexible theme. Great support ! Excellent response times. Very professional and helpful in all queries, absolutely awesome. Highly recommended! The theme is really amazing. Thank you Spacingtech Webify.”</p>
                                    <div class="testi-name">
                                        <h6>By cremica_foods</h6>
                                        <span>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="testimonial-area">
                                    <span class="tsti-title">“Frendly support”</span>
                                    <p>“ I love this theme. Higly customizable, Easy to use and very flexible theme. Great support ! Excellent response times. Very professional and helpful in all queries, absolutely awesome. Highly recommended! The theme is really amazing. Thank you Spacingtech Webify.”</p>
                                    <div class="testi-name">
                                        <h6>By sametin8</h6>
                                        <span>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="testimonial-area">
                                    <span class="tsti-title">“Frendly support”</span>
                                    <p>“ I love this theme. Higly customizable, Easy to use and very flexible theme. Great support ! Excellent response times. Very professional and helpful in all queries, absolutely awesome. Highly recommended! The theme is really amazing. Thank you Spacingtech Webify.”</p>
                                    <div class="testi-name">
                                        <h6>By amirzano</h6>
                                        <span>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="testimonial-area">
                                    <span class="tsti-title">“Design quality”</span>
                                    <p>“ I love this theme. Higly customizable, Easy to use and very flexible theme. Great support ! Excellent response times. Very professional and helpful in all queries, absolutely awesome. Highly recommended! The theme is really amazing. Thank you Spacingtech Webify.”</p>
                                    <div class="testi-name">
                                        <h6>By nestheboza</h6>
                                        <span>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial end -->
        <!-- featured products start -->
        <section class="section-tb-padding featured-products">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Featured products</h2>
                        </div>
                        <div class="featured owl-carousel owl-theme">
                            @foreach ($products as $product)
                            @if ($product->Inventory->first()->price >= 10000)
                            <div class="items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img class="img-fluid" src="{{ asset($product->preview_img) }}" alt="pro-img1">
                                            <img class="img-fluid additional-image" src="{{ asset($product->Gallery->first()->gallery_path) }}" alt="additional image">
                                        </a>
                                    </div>
                                    <div class="Pro-lable">
                                        <span class="{{ $product->discount ? 'p-discount' : 'p-text' }}">{{ $product->discount ? '- '.$product->discount.'%' : 'new' }}</span>
                                    </div>
                                    <div class="pro-icn">
                                        <a style="cursor: pointer" data-slug="{{ $product->slug }}" class="w-c-q-icn wishlist"><i class="fa fa-heart"></i></a>
                                        <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                        <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a></h3>
                                    <div class="rating">
                                        <i class="fa fa-star b-star"></i>
                                        <i class="fa fa-star b-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    @if ($product->discount)
                                    <div class="pro-price">
                                        <span class="new-price">&#2547; {{ $product->Inventory->first()->after_discount }}</span>
                                        <span class="old-price"><del>&#2547; {{ $product->Inventory->first()->price }}</del></span>
                                    </div>
                                    @else
                                    <div class="pro-price">
                                        <span class="new-price">&#2547; {{ $product->Inventory->first()->after_discount }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured products end -->
        <!-- blog start -->
        <section class="section-b-padding home2-blog">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Recent news</h2>
                        </div>
                        <div class="blog2 owl-carousel owl-theme">
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-1.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 Jan 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 6 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">Green onion knife and salad plased</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-2.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 fab 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 1 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">All time fresh every time healthy</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-3.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 march 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 0 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">Health and skin for your organic</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-4.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 april 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 0 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">Health and skin for your organic</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-5.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 may 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 0 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">Organic mix masala fresh & soft</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-6.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 fab 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 0 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">Fresh organic brand and picnic</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-style-2-details.html">
                                            <img src="{{ asset('frontend/image/') }}/blog-image/blog-7.jpg" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-date-comment">
                                            <span class="blog-date"><i class="ti-calendar"></i> 8 march 2021</span>
                                            <a href="javascript:void(0)"><i class="ti-comment-alt"></i> 0 Comment</a>
                                        </div>
                                        <div class="blog-title">
                                            <h6><a href="blog-style-2-details.html">Vegist special liquide fresh vegetable</a></h6>
                                        </div>
                                        <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor...</p>
                                        <div class="more-blog">
                                            <a href="blog-style-2-details.html" class="read-link">
                                                <span>Read more</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                            <span class="blog-admin">By <span class="blog-editor">Andrew louise</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-blog2">
                            <a href="blog-style-2-3-grid.html" class="btn btn-style1">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->
        <!-- news letter start -->
        <section class="section-tb-padding news-letter" style="background-image: url({{ asset('frontend/image/') }}/news-bg2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="news-content">
                            <h4>Get the latest deals</h4>
                            <span>And receive 20% off coupon for first shopping</span>
                            <div class="news-input">
                                <form>
                                    <input type="text" name="email" placeholder="Enter your email address">
                                    <a href="javascript:void(0)" class="btn btn-style1">Subscribe</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- news letter end -->
        <!-- quick veiw start -->
        <section class="quick-view">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Product quickview</h5>
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="quick-veiw-area">
                            <div class="quick-image">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="image-1">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-2">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/prro-page-image01.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-3">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image1-1.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-4">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image1.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-5">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image2.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-6">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image2-2.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-7">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image3.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-8">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="{{ asset('frontend/image/') }}/pro-page-image/pro-page-image03.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs quick-slider owl-carousel owl-theme">
                                    <li class="nav-item items">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#image-1"><img src="{{ asset('frontend/image/') }}/pro-page-image/image1.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-2"><img src="{{ asset('frontend/image/') }}/pro-page-image/image2.jpg" class="img-fluid" alt="iamge"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-3"><img src="{{ asset('frontend/image/') }}/pro-page-image/image3.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-4"><img src="{{ asset('frontend/image/') }}/pro-page-image/image4.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-5"><img src="{{ asset('frontend/image/') }}/pro-page-image/image5.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-6"><img src="{{ asset('frontend/image/') }}/pro-page-image/image6.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-7"><img src="{{ asset('frontend/image/') }}/pro-page-image/image8.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-8"><img src="{{ asset('frontend/image/') }}/pro-page-image/image7.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="quick-caption">
                                <h4>Fresh organic reachter</h4>
                                <div class="quick-price">
                                    <span class="new-price">$350.00 USD</span>
                                    <span class="old-price"><del>$399.99 USD</del></span>
                                </div>
                                <div class="quick-rating">
                                    <i class="fa fa-star c-star"></i>
                                    <i class="fa fa-star c-star"></i>
                                    <i class="fa fa-star c-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="pro-description">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</p>
                                </div>
                                <div class="pro-size">
                                    <label>Size: </label>
                                    <select>
                                        <option>1 ltr</option>
                                        <option>3 ltr</option>
                                        <option>5 ltr</option>
                                    </select>
                                </div>
                                <div class="plus-minus">
                                    <span>
                                        <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                        <input type="text" name="name" value="1">
                                        <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                    </span>
                                    <a href="cart.html" class="quick-cart"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="wishlist.html" class="quick-wishlist"><i class="fa fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- quick veiw end -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.wishlist').on('click', function(){
            StoreWishlist($(this).data('slug'))
        })

        function StoreWishlist(slug){
            $.ajax({
                url: '{{ route('store.wishlist') }}',
                type: 'POST',
                data: {
                    slug: slug,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response)
                    Swal.fire({
                    title: response.message,
                    icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload(); // Reload the page when the user clicks OK or outside the alert
                        }
                    });
                    //window.location.href = "{{ route('order.success', '') }}/" + response.order_id;
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                },
                complete: function () {
                    // Re-enable the button and set the text back to 'Place order'
                    $('.place-order').prop('disabled', false).html('Place order');
                }
            });
        }
    </script>
@endsection
