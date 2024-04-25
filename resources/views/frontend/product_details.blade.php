@extends('layouts.master')
@section('content')
      <!-- breadcumb start -->
      <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-start">
                        <ul class="breadcrumb-url">
                            <li class="breadcrumb-url-li">
                                <a href="index2.html">Home</a>
                            </li>
                            <li class="breadcrumb-url-li">
                                <span>{{ $product->product_name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcumb end -->
    <!-- product info start -->
    <section class="section-tb-padding pro-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-12 col-md-12 col-xs-12 pro-image">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 col-md-6 col-12 col-xs-12 larg-image">
                            <div class="tab-content">
                                @foreach ($galleries as $index => $gallery)
                                <div class="tab-pane fade{{ $index === 0 ? ' show active' : '' }}" id="image-{{ $gallery->id }}">
                                    <a href="javascript:void(0)" class="long-img">
                                        <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{ asset($gallery->gallery_path) }}')">
                                            <img src="{{ asset($gallery->gallery_path) }}" class="img-fluid" alt="image">
                                        </figure>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <ul class="nav nav-tabs pro-pag-5-slider owl-carousel owl-theme">
                                @foreach ($galleries as $index => $gallery)
                                <li class="nav-item items">
                                    <a class="nav-link{{ $index === 0 ? ' active' : '' }}" data-bs-toggle="tab" href="#image-{{ $gallery->id }}"><img src="{{ asset($gallery->gallery_path) }}" class="img-fluid" alt="image"></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-md-6 col-12 col-xs-12 pro-info">
                            <h4>{{ $product->product_name }}</h4>
                            <div class="rating">
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star d-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-availabale">
                                <span class="available">Availability:</span>
                                <span class="pro-instock">In stock</span>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">&#2547; {{ $product->Inventory->first()->after_discount }}</span>
                                @if ($product->discount)
                                <span class="old-price"><del>&#2547; {{ $product->Inventory->first()->price }}</del></span>
                                <div class="Pro-lable">
                                    <span class="p-discount">-{{ $product->discount }}%</span>
                                </div>
                                @endif
                            </div>
                            <span class="pro-details">Hurry up! only <span class="pro-number">7</span> products left in stock!</span>
                            <p>{{ $product->product_name }}</p>
                            <div class="pro-items">
                                <span class="pro-size">Size:</span>
                                <ul class="pro-wight">
                                    @foreach ($sizes as $index =>$size)
                                    <li><a data-id="{{ $size->Size->id }}" href="javascript:void(0)" class="{{ $size->Size->id === 9 ? 'active' : '' }} size_id">{{ $size->Size->size_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product-color">
                                <span class="color-label">Color:</span>
                                <span class="color">
                                    @foreach ($colors as $index => $color)
                                    @if ($color->Color->id == 1)
                                    <a data-id="{{ $color->Color->id }}" style="cursor: pointer; text-align: center; line-height: 24px;" class="active color_id"><span>{{ $color->Color->color_name }}</span></a>
                                    @else
                                    <a data-id="{{ $color->Color->id }}" style="background: {{ $color->Color->color_code }}; cursor: pointer;" class="color_id"><span></span></a>
                                    @endif
                                    @endforeach
                                </span>
                            </div>
                            <div class="pro-qty">
                                <span class="qty">Quantity:</span>
                                <div class="plus-minus">
                                    <span>
                                        <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                        <input type="text" name="name" value="1">
                                        <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                    </span>
                                </div>
                            </div>
                            <div class="pro-btn">
                                <a href="wishlist.html" class="btn btn-style1"><i class="fa fa-heart"></i></a>
                                <a href="cart-2.html" class="btn btn-style1"><i class="fa fa-shopping-bag"></i> Add to cart</a>
                                <a href="checkout-2.html" class="btn btn-style1">Buy now</a>
                            </div>
                            <div class="pro-cod">
                                <span class="p-code">
                                    <span class="code-title">Product code:</span>
                                    <span>{{ $product->sku }}</span>
                                </span>
                                <div class="mt-2">
                                    <span style="font-weight: bold" class="color-label">Tags:</span>
                                    @foreach ($product->Tags as $tag)
                                        <a href="{{ route('tag.product', $tag->id) }}" class="text-black">#{{ $tag->tag_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="share">
                                <span class="share-lable">Share:</span>
                                <ul class="share-icn">
                                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="pay-img">
                                <a href="checkout-2.html">
                                    <img src="{{ asset('frontend/image/') }}/pay-image.jpg" class="img-fluid" alt="pay-image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-xs-12 pro-shipping">
                    <div class="product-service">
                        <div class="icon-content">
                            <span><i class="ti-truck"></i></span>
                            <h4>Delivery info</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.</p>
                    </div>
                    <div class="product-service">
                        <div class="icon-content">
                            <span><i class="ti-reload"></i></span>
                            <h4>30 days returns</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.</p>
                    </div>
                    <div class="product-service">
                        <div class="icon-content">
                            <span><i class="ti-id-badge"></i></span>
                            <h4>10 year warranty</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product info end -->
    <!-- product page tab start -->
    <section class="section-b-padding pro-page-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pro-page-tab">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab-1">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Additional Info</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-1">
                                {!! $product->long_desc !!}
                            </div>
                            <div class="tab-pane fade show" id="tab-2">
                                <h4 class="reviews-title">Customer reviews</h4>
                                <div class="customer-reviews t-desk-2">
                                    <span class="p-rating">
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                    </span>
                                    <p class="review-desck">Based on 2 reviews</p>
                                    <a href="#add-review" data-bs-toggle='collapse'>Write a review</a>
                                </div>
                                <div class="review-form collapse" id="add-review">
                                    <h4>Write a review</h4>
                                    <form>
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Enter your name">
                                        <label>Email</label>
                                        <input type="text" name="mail" placeholder="Enter your Email">
                                        <label>Rating</label>
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <label>Review title</label>
                                        <input type="text" name="mail" placeholder="Review title">
                                        <label>Add comments</label>
                                        <textarea name="comment" placeholder="Write your comments"></textarea>
                                    </form>
                                </div>
                                <div class="customer-reviews">
                                    <span class="p-rating">
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                    <h4 class="review-head">He also good and high product see like look</h4>
                                    <span class="reviews-editor">Kelin patel <span class="review-name">on</span> fab 5, 2021</span>
                                    <p class="r-description">He also good and high product see like look</p>
                                </div>
                                <div class="customer-reviews">
                                    <span class="p-rating">
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star e-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                    <h4 class="review-head">He also good and fresh fruit organic product see like look</h4>
                                    <span class="reviews-editor">Melvin louis <span class="review-name">on</span> fab 5, 2021</span>
                                    <p class="r-description">He also good and fresh fruit organic product see like look</p>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="tab-3">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe height="630" src="https://www.youtube.com/embed/0etCKCAsImI" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="tab-5">
                                {!! $product->additional_info !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product page tab end -->
    <!-- releted product start -->
    <section class="section-b-padding pro-releted">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                    <div class="releted-products owl-carousel owl-theme">
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-1.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-01.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-text">New</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-2.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-02.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-text">New</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-3.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-03.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-discount">-20%</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-4.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-04.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-text">New</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-5.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-05.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-discount">-12%</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-6.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-06.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-discount">-21%</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-7.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-07.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-discount">-10%</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-8.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-08.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-text">New</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-9.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-09.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-discount">-12%</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-10.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-010.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-text">New</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
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
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-11.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-011.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-text">New</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
                                <h3><a href="product-style-2.html">Sp.red fresh guava</a></h3>
                                <div class="rating">
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="pro-price">
                                    <span class="new-price">$45.00 USD</span>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <div class="tred-pro">
                                <div class="tr-pro-img">
                                    <a href="product-style-2.html">
                                        <img class="img-fluid" src="{{ asset('frontend/image/') }}/pro/pro-img-12.jpg" alt="pro-img1">
                                        <img class="img-fluid additional-image" src="{{ asset('frontend/image/') }}/pro/pro-img-012.jpg" alt="additional image">
                                    </a>
                                </div>
                                <div class="Pro-lable">
                                    <span class="p-discount">-25%</span>
                                </div>
                                <div class="pro-icn">
                                    <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="caption">
                                <h3><a href="product-style-2.html">Fresh mussel (500g)</a></h3>
                                <div class="rating">
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star d-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="pro-price">
                                    <span class="new-price">$245.00 USD</span>
                                    <span class="old-price"><del>$270.00 USD</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- releted product end -->
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
<script>
$('.size_id').on('click', function(){
    $('.size_id').removeClass('active'); // Remove 'active' class from all size items
    $(this).addClass('active'); // Add 'active' class to the clicked size item
})
$('.color_id').on('click', function(){
    $('.color_id').removeClass('active'); // Remove 'active' class from all size items
    $(this).addClass('active'); // Add 'active' class to the clicked size item
})

</script>
@endsection
@section('link')
<style>
    a.color_id.active {
        border: 2px solid greenyellow !important;
    }
</style>
@endsection
