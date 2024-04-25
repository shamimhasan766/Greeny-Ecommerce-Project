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
                            <li class="about-p"><span>#{{ $tag->tag_name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->
<!-- grid-list start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="all-filter">
                    <div class="categories-page-filter">
                        <h4 class="filter-title">Categories</h4>
                        <a href="#category-filter" data-bs-toggle="collapse" class="filter-link"><span>Categories </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-option collapse" id="category-filter">
                            @foreach ($categories as $category)
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">{{ $category->name }} <span class="grid-items">({{ $category->Products->count() }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="price-filter">
                        <h4 class="filter-title">Filter by price</h4>
                        <a href="#price-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by price </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-price collapse" id="price-filter">
                            <price-range class="price-range">
                                <div class="price-range-group group-range">
                                    <input type="range" class="range" min="0" max="89" value="0" id="range1">
                                    <input type="range" class="range" min="0" max="89" value="89" id="range2">
                                </div>
                                <div class="price-input-group group-input">
                                    <div class="price-range-input input-prefix">
                                        <label class="input-prefix-label">From</label>
                                        <span class="input-prefix-value">$ <span id="demo1"></span></span>
                                    </div>
                                    <span class="price-range-delimeter">-</span>
                                    <div class="price-range-input input-prefix">
                                        <label class="input-prefix-label">To</label>
                                        <span class="input-prefix-value">$ <span id="demo2"></span></span>
                                    </div>
                                </div>
                            </price-range>
                        </ul>
                    </div>
                    <div class="pro-size">
                        <h4 class="filter-title">Filter by size</h4>
                        <a href="#size-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by size </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-size collapse" id="size-filter">
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>10kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>10ltr</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>1kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>1ltr</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>2kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>2ltr</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>3kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>5kg</label>
                            </li>
                            <li class="choice-size">
                                <input type="checkbox">
                                <label>5ltr</label>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-tag">
                        <h4 class="filter-title">Filter by tags</h4>
                        <a href="#tags-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by tags </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-tag collapse" id="tags-filter">
                            <li class="tag"><a href="product.html">Almond</a></li>
                            <li class="tag"><a href="product.html">Banana</a></li>
                            <li class="tag"><a href="product.html">Bitrrot</a></li>
                            <li class="tag"><a href="product.html">Blackberry</a></li>
                            <li class="tag"><a href="product.html">Chikoo</a></li>
                            <li class="tag"><a href="product.html">Coconet</a></li>
                            <li class="tag"><a href="product.html">Guava</a></li>
                            <li class="tag"><a href="product.html">juice</a></li>
                            <li class="tag"><a href="product.html">Ladiesfinger</a></li>
                            <li class="tag"><a href="product.html">Litchi</a></li>
                            <li class="tag"><a href="product.html">Minirrot</a></li>
                            <li class="tag"><a href="product.html">Mussel</a></li>
                            <li class="tag"><a href="product.html">Onion</a></li>
                            <li class="tag"><a href="product.html">Organic-food</a></li>
                            <li class="tag"><a href="product.html">Potato</a></li>
                            <li class="tag"><a href="product.html">Shrimp</a></li>
                            <li class="tag"><a href="product.html">Tomato</a></li>
                        </ul>
                    </div>
                    <div class="vendor-filter">
                        <h4 class="filter-title">Filter by vendor</h4>
                        <a href="#vendor" data-bs-toggle="collapse" class="filter-link"><span>Filter by vendor </span><i class="fa fa-angle-down"></i></a>
                        <ul class="all-vendor collapse" id="vendor">
                            <li class="f-vendor">
                                <input type="checkbox">
                                <label>Fargglad</label>
                            </li>
                            <li class="f-vendor">
                                <input type="checkbox">
                                <label>Flisat</label>
                            </li>
                            <li class="f-vendor">
                                <input type="checkbox">
                                <label>Kyrre</label>
                            </li>
                            <li class="f-vendor">
                                <input type="checkbox">
                                <label>Lustigt</label>
                            </li>
                            <li class="f-vendor">
                                <input type="checkbox">
                                <label>Sundvik</label>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-banner">
                        <a href="grid-list.html" class="grid-banner">
                            <img src="{{ asset('frontend/image/') }}/grid-banner.jpg" class="img-fluid" alt="image">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="grid-list-banner" style="background-image: url({{ asset('frontend/image/') }}/slider17.jpg);">
                    <div class="grid-banner-content">
                        <h4>Bestseller</h4>
                        <p>Praesent dapibus, neque id cursus Ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, facilisis luc...</p>
                    </div>
                </div>
                <div class="grid-list-area">
                    <div class="grid-list-select">

                        <ul class="grid-list-selector">
                            <li>
                                <label>Sort by</label>
                                <select>
                                    <option>Featured</option>
                                    <option>Best selling</option>
                                    <option>Alphabetically,A-Z</option>
                                    <option>Alphabetically,Z-A</option>
                                    <option>Price, low to high</option>
                                    <option>Price, high to low</option>
                                    <option>Date new to old</option>
                                    <option>Date old to new</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="list-product">
                        @foreach ($products as $product)
                            <div class="list-items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img class="img-fluid" src="{{ asset($product->preview_img) }}" alt="pro-img1">
                                        </a>
                                    </div>
                                    <div class="Pro-lable">
                                        <span class="{{ $product->discount ? 'p-discount' : 'p-text' }}">{{ $product->discount ? '- '. $product->discount . '%' : 'New' }}</span>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a></h3>
                                    <p class="list-description">{{ $product->short_desc }}</p>
                                    <div class="rating">
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star c-star"></i>
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
                                    <div class="pro-icn">
                                        <a href="wishlist.html" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                        <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                        <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="list-all-page">
            <span class="page-title">Showing 1 - 17 of 17 result</span>
            <div class="page-number">
                <a href="grid-list.html" class="active">1</a>
                <a href="grid-list-2.html">2</a>
                <a href="grid-list-3.html">3</a>
                <a href="grid-list-4.html">4</a>
                <a href="javascript:void(0)"><i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- grid-list start -->
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
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-2">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/prro-page-image01.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-3">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image1-1.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-4">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image1.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-5">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image2.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-6">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image2-2.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-7">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image3.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="tab-pane fade show" id="image-8">
                                <a href="javascript:void(0)" class="long-img">
                                    <img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/pro-page-image03.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs quick-slider owl-carousel owl-theme">
                            <li class="nav-item items">
                                <a class="nav-link active" data-bs-toggle="tab" href="#image-1"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image1.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-2"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image2.jpg" class="img-fluid" alt="iamge"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-3"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image3.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-4"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image4.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-5"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image5.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-6"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image6.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-7"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image8.jpg" class="img-fluid" alt="image"></a>
                            </li>
                            <li class="nav-item items">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-8"><img src="{{ asset('frontend/image/') }}/pro-page-{{ asset('frontend/image/') }}/image7.jpg" class="img-fluid" alt="image"></a>
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
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style.css">
@endsection
