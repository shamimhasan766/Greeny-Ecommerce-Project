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
                                <span style="min-width: 80px" class="available">Availability:</span>
                                <span class="stock_amount"></span> <span class="item d-none">item</span>
                                <span class="pro-instock">In stock</span>
                            </div>
                            <div class="pro-price">
                                <span class="new-price">&#2547; {{ round($product->Inventory->first()->after_discount) }}</span>
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
                                        <input type="text" class="quantity_input" name="quantity" value="1">
                                        <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                    </span>
                                </div>
                            </div>
                            <div style="margin-top: 10px" class="pro-btn">
                                <div style="margin-left: 100px" class="cart_err text-danger mb-2"></div>
                                <a style="cursor: pointer" data-slug="{{ $product->slug }}" class="btn btn-style1 wishlist"><i class="fa fa-heart"></i></a>
                                @auth('customer')
                                <a class="btn btn-style1 add_to_cart"><i class="fa fa-shopping-bag"></i> Add to cart</a>
                                @else
                                <a href="{{ route('customer.login') }}" class="btn btn-style1">Add to cart</a>
                                @endauth
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
                        @foreach ($product->Category->Products->except($product->id) as $item)
                            <div class="items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="{{ route('product.details', $item->slug) }}">
                                            <img class="img-fluid" src="{{ asset($item->preview_img) }}" alt="pro-img1">
                                            <img class="img-fluid additional-image" src="{{ asset($item->Gallery->first()->gallery_path) }}" alt="additional image">
                                        </a>
                                    </div>
                                    <div class="Pro-lable">
                                        @if ($item->discount)
                                        <span class="p-discount">-{{ $item->discount }}%</span>
                                        @else
                                        <span class="p-text">New</span>
                                        @endif
                                    </div>
                                    <div class="pro-icn">
                                        <a style="cursor: pointer" data-slug="{{ $item->slug }}" class="w-c-q-icn wishlist"><i class="fa fa-heart"></i></a>
                                        <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                        <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a href="{{ route('product.details', $item->slug) }}">{{ $item->product_name }}</a></h3>
                                    <div class="rating">
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star c-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    @if ($item->discount)
                                    <div class="pro-price">
                                        <span class="new-price">&#2547; {{ $item->Inventory->first()->after_discount }}</span>
                                        <span class="old-price"><del>&#2547; {{ $item->Inventory->first()->price }}</del></span>
                                    </div>
                                    @else
                                    <div class="pro-price">
                                        <span class="new-price">&#2547; {{ $item->Inventory->first()->after_discount }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function getColors() {
    var size_id = $('.size_id.active').data('id');
    var product_id = '{{ $product->id }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '{{ route('get.colors') }}',
        type: 'POST',
        data: {'size_id': size_id, 'product_id': product_id},
        success: function(data) {
            $('.color').html(data); // Update the color options
            $('.color_id').on('click', function() {
                $('.color_id').removeClass('active'); // Remove 'active' class from all color items
                $(this).addClass('active'); // Add 'active' class to the clicked color item
                checkStock(); // Check stock after color selection
            });
        }
    });
}

$('.size_id').on('click', function(){
    $('.size_id').removeClass('active'); // Remove 'active' class from all size items
    $(this).addClass('active'); // Add 'active' class to the clicked size item
    getColors(); // Update available colors when a size is clicked
    checkStock();
});

$('.color_id').on('click', function(){
    $('.color_id').removeClass('active'); // Remove 'active' class from all size items
    $(this).addClass('active'); // Add 'active' class to the clicked size item
    checkStock();
})

// getting stock

function checkStock() {
    var sizeActive = $('.size_id.active'); // Select active size
    var sizeId = sizeActive.data('id'); // Get data-id of active size

    var colorActive = $('.color_id.active'); // Select active color
    var colorId = colorActive.data('id');

    var productId = '{{ $product->id }}';

    // If both size and color are active, display the stock
    if (sizeActive && colorActive) {
        // Retrieve stock value (you might need to modify this based on how you store/access stock data)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{route('get.quantity.price')}}',
            type: 'POST',
            data: {'color_id': colorId, 'product_id': productId, 'size_id': sizeId},
            success:function(data){
                $('.stock_amount').html(data.quantity);
                $('.item').toggleClass('d-none');
                $('.pro-price').html(data.price);
            }
        });



    } else {
        $('.stock_amount').html('');
    }
}



$(document).ready(function() {
    $('.plus-btn').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var input = $(this).siblings('input[name="quantity"]'); // Get the input field

        var currentValue = parseInt(input.val()); // Get the current value
        input.val(currentValue + 1); // Increment the value
    });

    $('.minus-btn').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior

        var input = $(this).siblings('input[name="quantity"]'); // Get the input field
        var currentValue = parseInt(input.val()); // Get the current value
        if (currentValue > 1) {
            input.val(currentValue - 1); // Decrement the value, but not below 1
        }
    });

    // Update value on input change
    $('input[name="quantity"]').on('input', function() {
        var value = parseInt($(this).val());
        if (isNaN(value) || value < 1) {
            $(this).val(1); // Reset to 1 if input is invalid
        }
    });


   // Add To Cart
   $('.add_to_cart').on('click', function() {
        var quantity = $('.quantity_input').val();
        var size_id = $('.size_id.active').data('id');
        var color_id = $('.color_id.active').data('id');
        var product_id = '{{ $product->id }}';
        if(!size_id , !color_id){
            $('.cart_err').html('please select size & color')
        }
        else(
            $('.cart_err').html('')
        )
        console.log('Quantity:', quantity, 'size_id:', size_id, 'color_id:', color_id, 'product_id', product_id);
        if($('.stock_amount').html() == 0){
            $('.cart_err').html('Your choosen size and color product is out of stock')
        }
        else{

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('store.cart') }}',
                type: 'POST',
                data: {'size_id': size_id,'color_id': color_id , 'product_id': product_id, 'quantity': quantity},
                success: function(data) {
                    console.log(data.message)
                    Swal.fire({
                    title: data.message,
                    icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload(); // Reload the page when the user clicks OK or outside the alert
                        }
                    });
                }
            });
        }
    });
});


// Wishlist
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
@section('link')
<style>
    a.color_id.active {
        border: 2px solid greenyellow !important;
    }
</style>
@endsection
