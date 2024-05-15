@extends('layouts.master')
@section('content')
  <!-- breadcrumb start -->
  <section class="about-breadcrumb">
    <div class="about-back section-tb-padding" style="background-image: url({{ asset('frontend/image/') }}/about-image.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="about-l">
                        <ul class="about-link">
                            <li class="go-home"><a href="index1.html">Home</a></li>
                            <li class="about-p"><span>Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->
<!-- wishlist start -->
<section class="wishlist-page section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="wishlist-area">
                    <div class="wishlist-details">
                        <div class="wishlist-item">
                            <span class="wishlist-head">My wishlist:</span>
                            <span class="wishlist-items">{{ $products->count() }} item</span>
                        </div>
                    </div>
                </div>
                @foreach ($products as $product)
                <div class="wishlist-area">
                    <div class="wishlist-details">
                        <div class="wishlist-all-pro">
                            <div class="wishlist-pro">
                                <div class="wishlist-pro-image">
                                    <a href="{{ route('product.details', $product->slug) }}"><img height="100" src="{{ asset($product->preview_img) }}" class="" alt="image"></a>
                                </div>
                                <div class="pro-details">
                                    <h4><a href="{{ route('product.details', $product->slug) }}" style="font-weight: bold">{{ $product->product_name }}</a></h4>
                                    <span class="wishlist-text mt-3">{{ $product->short_desc }}</span>
                                </div>
                            </div>
                            <div class="qty-item">
                                <a href="checkout-1.html" class="add-wishlist">Buy now</a>
                            </div>
                            <div class="all-pro-price">
                                <span class="new-price">&#2547; {{ $product->Inventory->first()->after_discount }}</span>
                                @if ($product->discount)
                                <span class="old-price"><del>&#2547; {{ $product->Inventory->first()->price }}</del></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="wishlist-area">
                    <div class="wishlist-details">
                        <div class="other-link">
                            <ul class="c-link">
                                <li class="wishlist-other-link"><a href="/" class="btn-style1">Continue shopping</a></li>
                                <li class="wishlist-other-link"><a href="index1.html" class="btn-style1">Clear wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- wishlist end -->
@endsection
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style.css">

@endsection
