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
                            <li class="about-p"><span>Your checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->
<!-- checkout page start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="checkout-tab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active next" data-bs-toggle="tab" href="#home">1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link next" data-bs-toggle="tab" href="#profile">2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link next" id="contact-tab" onclick="UpdateShippingCharge(0)" data-bs-toggle="tab" href="#contact">3</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home">
                        <div class="checkout-style-2">
                            <div class="billing-area">
                                <form>
                                    <h2>Billing details</h2>
                                    <div class="billing-form">
                                        <strong class="text-danger billing-error"></strong>
                                        <ul class="billing-ul input-2">
                                            <li class="billing-li">
                                                <label>First name</label>
                                                <input type="text" value="{{ Auth::guard('customer')->user()->BillingAddress->f_name ?? Auth::guard('customer')->user()->f_name }}" name="f_name" placeholder="First name">
                                            </li>
                                            <li class="billing-li">
                                                <label>Last name</label>
                                                <input type="text" value="{{ Auth::guard('customer')->user()->BillingAddress->l_name ?? Auth::guard('customer')->user()->l_name }}" name="l_name" placeholder="Last name">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Company name (Optional)</label>
                                                <input type="text" value="{{ Auth::guard('customer')->user()->BillingAddress->company }}" name="company" placeholder="Company name">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Street address</label>
                                                <input type="text" value="{{ Auth::guard('customer')->user()->BillingAddress->address ?? Auth::guard('customer')->user()->address }}" name="address" placeholder="Street address">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul input-2">
                                            <li class="billing-li">
                                                <label>Country</label>
                                                <select class="country_id" onchange="getCity(this.value)" name="country_id">
                                                    <option value="">Select a country</option>
                                                    @if (Auth::guard('customer')->user()->BillingAddress)

                                                    @foreach ($countries as $country)
                                                    <option {{ Auth::guard('customer')->user()->BillingAddress->country_id == $country->id ? 'selected': '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach

                                                    @else

                                                    @foreach ($countries as $country)
                                                    <option {{ Auth::guard('customer')->user()->country_id == $country->id ? 'selected': '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach

                                                    @endif
                                                </select>
                                            </li>
                                            <li class="billing-li">
                                                <label>City</label>
                                                <select class="city_id" name="city_id">
                                                    <option value="">Select a city</option>
                                                    @if (Auth::guard('customer')->user()->BillingAddress)
                                                    <option value="{{ Auth::guard('customer')->user()->BillingAddress->city_id }}" selected>{{ Auth::guard('customer')->user()->BillingAddress->City->name }}</option>
                                                    @else
                                                    @php
                                                    if (Auth::guard('customer')->user()->city_id){
                                                        echo '<option selected value='. Auth::guard("customer")->user()->City->id.'>'.Auth::guard("customer")->user()->City->name.'</option>';
                                                    }
                                                    else{
                                                        echo '<option disabled="" selected="">City</option>';
                                                    }
                                                    @endphp
                                                    @endif
                                                </select>
                                            </li>
                                        </ul>

                                        <ul class="billing-ul input-2">
                                            <li class="billing-li">
                                                <label>Email address</label>
                                                <input type="email" value="{{ Auth::guard('customer')->user()->BillingAddress->email ?? Auth::guard('customer')->user()->email }}" name="email" placeholder="Email address">
                                            </li>
                                            <li class="billing-li">
                                                <label>Phone number</label>
                                                <input type="tel" value="{{ Auth::guard('customer')->user()->BillingAddress->phone ?? Auth::guard('customer')->user()->phone }}" name="phone" placeholder="Phone number">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul input-2">
                                            <li class="billing-li">
                                                <label>Postcode</label>
                                                <input type="text" value="{{ Auth::guard('customer')->user()->BillingAddress->zip ?? Auth::guard('customer')->user()->zip }}" name="zip" placeholder="Postcode">
                                            </li>
                                            <li class="billing-li">
                                                <label>Additional</label>
                                                <input type="text" value="{{ Auth::guard('customer')->user()->BillingAddress->additional_info }}" name="additional" placeholder="Additional">
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                                <!-- <a href="javascript:void(0)" class="btn-style1">Continue</a> -->
                            </div>
                        </div>
                        <div class="checkout-tab">
                            <button id="nextBtn" onclick="UpdateShippingCharge(0)" class="nextBtn btn btn-success float-end mt-2">Next --></button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="checkout-style-2">
                            <div class="billing-area">
                                <div class="billing-details">
                                    <form>
                                        <h2>Shipping details</h2>
                                        <ul class="shipping-form">
                                            <li class="check-box">
                                                <input id="ship_input" type="checkbox" name="">
                                                <label for="ship_input">Ship to a different address?</label>
                                            </li>
                                            <div style="transition: height 0.5s ease-in-out; overflow: hidden;" id="shipping-show" class="mt-3 d-none">
                                                <ul class="mb-3 all-shipping-address">

                                                    @foreach (Auth::guard('customer')->user()->ShippingAddress as $item)
                                                    <li id="ship{{ $item->id }}">
                                                        <input class="shipping_id" id="shipping{{ $item->id }}" value="{{ $item->id }}" type="radio" name="shipping_id">
                                                        <label class="text-danger" style="margin-left: 5px" for="shipping{{ $item->id }}">{{ $item->address }}</label>
                                                        <a data-id="{{ $item->id }}" class="btn btn-danger btn-sm mb-2 delete-shipping"><i class="fa fa-trash ml-5"></i></a>
                                                    </li>
                                                    @endforeach
                                                </ul>

                                                <a style="font-size: 17px; margin-left: 18px; cursor: pointer;" class="text-success font-bold add-shipping">Add a shipping address</a>
                                                <div class="shipping-form add-shipping-form d-none">
                                                    <strong class="text-danger shipping-error"></strong>
                                                    <ul class="billing-ul input-2">
                                                        <li class="billing-li">
                                                            <label>First name</label>
                                                            <input type="text" value="" name="ship_f_name" placeholder="First name">
                                                        </li>
                                                        <li class="billing-li">
                                                            <label>Last name</label>
                                                            <input type="text" value="" name="ship_l_name" placeholder="Last name">
                                                        </li>
                                                    </ul>
                                                    <ul class="billing-ul">
                                                        <li class="billing-li">
                                                            <label>Company name (Optional)</label>
                                                            <input type="text" name="ship_company" placeholder="Company name">
                                                        </li>
                                                    </ul>
                                                    <ul class="billing-ul">
                                                        <li class="billing-li">
                                                            <label>Street address</label>
                                                            <input type="text" value="" name="ship_address" placeholder="Street address">
                                                        </li>
                                                    </ul>
                                                    <ul class="billing-ul input-2">
                                                        <li class="billing-li">
                                                            <label>Country</label>
                                                            <select class="ship_country_id" onchange="getCity(this.value)" name="ship_country_id">
                                                                <option value="">Select a country</option>
                                                                @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </li>
                                                        <li class="billing-li">
                                                            <label>City</label>
                                                            <select class="city_id" name="ship_city_id">
                                                                <option value="">Select a city</option>
                                                            </select>
                                                        </li>
                                                    </ul>

                                                    <ul class="billing-ul input-2">
                                                        <li class="billing-li">
                                                            <label>Email address</label>
                                                            <input type="email" value="" name="ship_email" placeholder="Email address">
                                                        </li>
                                                        <li class="billing-li">
                                                            <label>Phone number</label>
                                                            <input type="tel" value="" name="ship_phone" placeholder="Phone number">
                                                        </li>
                                                    </ul>
                                                    <ul class="billing-ul input-2">
                                                        <li class="billing-li">
                                                            <label>Postcode</label>
                                                            <input type="text" name="ship_zip" placeholder="Postcode">
                                                        </li>
                                                        <li class="billing-li">
                                                            <label>Additional</label>
                                                            <input type="text" name="ship_additional" placeholder="Additional">
                                                        </li>
                                                    </ul>
                                                    <a class="btn btn-primary mt-3 add-shipping-btn">Add Shipping Address</a>
                                                </div>

                                            </div>
                                            <li>
                                                <label>Order notes(Optional)</label>
                                                <textarea name="comments" rows="4" cols="80"></textarea>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-tab">
                            <button id="nextBtn" onclick="UpdateShippingCharge(0)" class="nextBtn btn btn-success float-end mt-2">Next --></button>
                        </div>
                    </div>
                    @php
                        $subtotal = 0;
                    @endphp
                    <div class="tab-pane fade" id="contact">
                        <div class="checkout-style-2">
                            <div class="order-area">
                                <div class="check-pro">
                                    <h2>In your cart ({{ $carts->count() }})</h2>
                                    <ul class="check-ul">
                                        @foreach ($carts as $cart)
                                            <li>
                                                <div class="check-pro-img">
                                                    <a href="{{ route('product.details', $cart->Product->slug) }}"><img height="100px" src="{{ asset($cart->Product->preview_img) }}" class="" alt="image"></a>
                                                </div>
                                                <div class="check-content">
                                                    <a href="{{ route('product.details', $cart->Product->slug) }}">{{ $cart->Product->product_name }}</a>
                                                    <span class="check-code-blod">Product code: <span>{{ $cart->Product->sku }}</span></span>
                                                    <span class="check-price">TK {{ $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="order-history">
                                    <div class="d-block coupon">
                                        <h4 class="mb-2">Apply Coupon</h4>
                                        <div class="d-flex justify-content-between">
                                            <input data-val=0 type="text" class="form-control coupon-input" value="" name="coupon">
                                            <button style="margin-left: 5px" class="btn btn-success coupon-apply">Apply</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="mt-2 d-block">Your order</h2>
                                    </div>
                                    <div class="order-inf">
                                        <div class="order-details">
                                            <span>Product:</span>
                                            <span>Total</span>
                                        </div>
                                        @foreach ($carts as $cart)
                                            <div class="order-details">
                                                <span class="badge bg-secondary">
                                                    @php
                                                        $productName = $cart->Product->product_name;
                                                        $words = explode(' ', $productName);
                                                        $shortenedProductName = implode(' ', array_slice($words, 0, 5));
                                                        echo $shortenedProductName.' :';
                                                    @endphp
                                                </span>
                                                Q({{ $cart->quantity }})
                                                <span>TK {{ $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount * $cart->quantity }}</span>
                                            </div>
                                            @php
                                                $subtotal += $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount * $cart->quantity;
                                            @endphp
                                        @endforeach
                                        <div class="order-details">
                                            <span>Subtotal:</span>
                                            <span>TK {{ $subtotal }}</span>
                                        </div>
                                        <div class="order-details">
                                            <div class="d-none coupon_id"></div>
                                            <span>Shipping Charge:</span>
                                            <span class="shipping-charge">Free shipping</span>
                                        </div>
                                        <div class="order-details">
                                            <span>Discount: </span>
                                            <span class="">TK <span class="total-discount">0</span></span>
                                        </div>

                                        <div class="order-details last">
                                            <span>Total:</span>
                                            <span class="total"></span>
                                        </div>

                                            <div class="order-form order-type mt-3">
                                                <div class="order-checkbox">
                                                    <input type="radio" id="cash" name="payment_type" value="1">
                                                    <label for="cash">Cash On Delevery</label>
                                                </div>
                                                <div class="order-checkbox">
                                                    <input type="radio" id="ssl" name="payment_type" value="2">
                                                    <label for="ssl">SSL Commerz</label>
                                                </div>
                                                <div class="order-checkbox">
                                                    <input type="radio" id="stripe" name="payment_type" value="3">
                                                    <label for="stripe">Stripe</label>
                                                </div>
                                                <div class="pay-icon">
                                                    <a href="javascript:void(0)"><i class="fa fa-credit-card"></i></a>
                                                    <a href="javascript:void(0)"><i class="fa fa-cc-visa"></i></a>
                                                    <a href="javascript:void(0)"><i class="fa fa-cc-paypal"></i></a>
                                                    <a href="javascript:void(0)"><i class="fa fa-cc-mastercard"></i></a>
                                                </div>
                                            </div>
                                            <a onclick="StoreOrder()" style="cursor: pointer" class="btn-style1 place-order">Place order</a>
                                            <strong class="text-danger mt-3 order-type-err"></strong>
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
<!-- checkout page end -->
@endsection
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style.css">
<style>
    .is-invalid{
        border: 1px solid red;
    }
    .disabled{
        cursor: not-allowed !important;
    }
    .shipping-form {
        margin-top: 16px;
    }
    .shipping-form ul.billing-ul{
        width: 100%;
        margin-top: 15px;
    }
    .shipping-form ul.billing-ul.input-2{
        display: flex;
        flex-wrap: wrap;
    }
    .shipping-form ul.billing-ul:first-child {
        margin-top: 0px;
    }
    .shipping-form ul.billing-ul.input-2 li.billing-li{
        width: calc(50% - 15px);
        margin-left: 15px;
    }
    .shipping-form ul.billing-ul.input-2 li.billing-li:first-child{
        margin-left: 0px;
        width: calc(50% - 0px);
        margin-left: 0px;
    }
    .shipping-form ul.billing-ul li.billing-li input{
        width: 100%;
        margin-top: 10px;
    }
    .shipping-form ul.billing-ul li.billing-li select{
        width: 100%;
        margin-top: 10px;
    }
    .add-shipping-form {
        transition: opacity 0.5s ease-in-out; /* Example transition for opacity */
        opacity: 0; /* Initially hidden */
    }

    .add-shipping-form.show {
        opacity: 1; /* Visible */
    }
    /* Add this CSS to your stylesheet */
    .swal2-container {
        font-size: 14px; /* Adjust font size */
    }

    .swal2-title {
        font-size: 16px; /* Adjust title font size */
        margin-bottom: 5px; /* Adjust margin bottom */
    }

    .swal2-content {
        font-size: 14px; /* Adjust content font size */
    }

    .swal2-actions {
        margin-top: 10px; /* Adjust margin top for buttons */
    }


</style>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function getCity(country_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('customer.get.city')}}',
                type: 'POST',
                data: {'country_id': country_id},
                success:function(data){
                    $('.city_id').html(data)
                }
            });
    }


    // Validate Billing Address

    $('.nextBtn').click(function() {

        if (validateForm()) {
            $('.billing-error').html('')
            // If form is valid, switch to the next tab
            var activeTab = $('.nav-tabs .active');
            var nextTab = activeTab.parent().next().find('a');
            if (nextTab.length) {
                nextTab.tab('show');
            }
        } else {
            // If form is invalid, display a validation message
            $('.billing-error').html('Please fill out all required fields before proceeding.')
            AddBillingAddress()
        }
    });

    $('.nav-tabs li:nth-child(2) a, .nav-tabs li:nth-child(3) a').on('show.bs.tab', function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent the tab from switching
            $('.billing-error').html('Please fill out all required fields before proceeding.');
        } else {
            $('.billing-error').html(''); // Clear any existing error message
            AddBillingAddress()
        }
    });


    // Add Billing Address
    function AddBillingAddress(){
        var f_name = $('.billing-form input[name="f_name"]').val();
        var l_name = $('.billing-form input[name="l_name"]').val();
        var company = $('.billing-form input[name="company"]').val();
        var address = $('.billing-form input[name="address"]').val();
        var email = $('.billing-form input[name="email"]').val();
        var phone = $('.billing-form input[name="phone"]').val();
        var zip = $('.billing-form input[name="zip"]').val();
        var country_id = $('.billing-form select[name="country_id"]').val();
        var city_id = $('.billing-form select[name="city_id"]').val();
        var additional = $('.billing-form input[name="additional"]').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('store.billing')}}',
                type: 'POST',
                data: {
                    'l_name': l_name,
                    'f_name': f_name,
                    'company': company,
                    'address': address,
                    'email': email,
                    'phone': phone,
                    'zip': zip,
                    'country_id': country_id,
                    'city_id': city_id,
                    'additional': additional,
                },
                success:function(data){
                    console.log(data)
                }
            });
    }

    // Store Shipping Address
    function AddShippingAddress(){
        var f_name = $('.add-shipping-form input[name="ship_f_name"]').val();
        var l_name = $('.add-shipping-form input[name="ship_l_name"]').val();
        var company = $('.add-shipping-form input[name="ship_company"]').val();
        var address = $('.add-shipping-form input[name="ship_address"]').val();
        var email = $('.add-shipping-form input[name="ship_email"]').val();
        var phone = $('.add-shipping-form input[name="ship_phone"]').val();
        var zip = $('.add-shipping-form input[name="ship_zip"]').val();
        var country_id = $('.add-shipping-form select[name="ship_country_id"]').val();
        var city_id = $('.add-shipping-form select[name="ship_city_id"]').val();
        var additional = $('.add-shipping-form input[name="ship_additional"]').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('store.shipping')}}',
                type: 'POST',
                data: {
                    'l_name': l_name,
                    'f_name': f_name,
                    'company': company,
                    'address': address,
                    'email': email,
                    'phone': phone,
                    'zip': zip,
                    'country_id': country_id,
                    'city_id': city_id,
                    'additional': additional,
                },
                success:function(data){
                    Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                    });
                }
            });
    }


    // Add Shipping Address
    $('.add-shipping-btn').on('click', function(){
        if (validateShippingForm()) {
            $('.shipping-error').html('')
            // Store Billing Address
            AddShippingAddress()
            $('.add-shipping-form').toggleClass('show d-none')

        } else {
            // If form is invalid, display a validation message
            $('.shipping-error').html('Please fill out all required fields before proceeding.')
        }
    })

    // Delete Shipping Address
    $('.delete-shipping').click(function(e) {
            e.preventDefault();
            var shippingId = $(this).data('id');
            var shipid = '#ship'+shippingId;
            var url = "{{ route('delete.shipping.address') }}";
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    shipping_id: shippingId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $(shipid).remove();
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
    });

    // Validate Form
    function validateForm() {
        var isValid = true;

        // Loop through each input element
        $('.billing-form input[name="f_name"], .billing-form input[name="l_name"], .billing-form input[name="address"], .billing-form input[name="email"], .billing-form input[name="phone"], .billing-form input[name="zip"], .billing-form select').each(function() {
            // Check if the input value is empty
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).addClass('is-invalid'); // Add a class to highlight the empty input
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        return isValid;
    }

    // Validate Shipping Form
    function validateShippingForm(){
        var isValid = true;

        $('.add-shipping-form input[name="ship_f_name"], .add-shipping-form input[name="ship_l_name"], .add-shipping-form input[name="ship_address"], .add-shipping-form input[name="ship_email"], .add-shipping-form input[name="ship_phone"], .add-shipping-form input[name="ship_zip"], .add-shipping-form select').each(function() {
            // Check if the input value is empty
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).addClass('is-invalid'); // Add a class to highlight the empty input
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        return isValid;

    }

    // Toggle Shipping Form
    $('#ship_input').change(function() {
        if ($(this).is(':checked')) {
            $('#shipping-show').removeClass('d-none');
        } else {
            $('#shipping-show').addClass('d-none');
        }
    });
    // Toggle Add Shipping Form
    $('.add-shipping').on('click', function(){
        $('.add-shipping-form').toggleClass('show d-none');
    });


    // Update Shipping Address

    function UpdateShippingCharge(discount){
        var shipping_id = $('.all-shipping-address input[name="shipping_id"]:checked').val();
        if(shipping_id){
            var url = "{{ route('get.shipping.details') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    shipping_id: shipping_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.city_id == 8486){
                        $('.shipping-charge').html('TK '+70)
                        UpdateTotal(70,discount)
                    }
                    else{
                        $('.shipping-charge').html('TK '+100)
                        UpdateTotal(100,discount)
                    }
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });

        }
        else{
            var billing_city = '{{ Auth::guard('customer')->user()->BillingAddress->city_id }}';
            if(billing_city == 8486){
                $('.shipping-charge').html('TK '+70)
                UpdateTotal(70,discount)
            }
            else{
                $('.shipping-charge').html('TK '+100)
                UpdateTotal(100,discount)
            }
        }
    }
    function UpdateTotal(charge,discount) {
        $('.total-discount').html(discount)
        var subtotal = parseFloat('{{ $subtotal }}'); // Parse subtotal as float
        subtotal -= discount;
        var total = parseFloat(charge) + subtotal; // Calculate total charge
        $('.total').html('TK ' + total.toFixed(2)); // Update total charge on the page
    }

    // Place Order
    function StoreOrder(){
        $carts_count = '{{ $carts->count() }}';


        var subtotal = '{{ $subtotal }}';
        var payment_type = $('.order-type input[name="payment_type"]:checked').val();
        // Charge
        var charge = 0;

        // Shipping
        var shipping_id = $('.all-shipping-address input[name="shipping_id"]:checked').val();
        if($carts_count != 0){
            if($('.order-type input[name="payment_type"]:checked').val()){
                $('.order-checkbox').css('color', 'black');
                $('.order-type-err').html('');

                if($('.order-type input[name="payment_type"]:checked').val() == 1){
                    $('.place-order').prop('disabled', true).html('Processing <i class="fa fa-spinner fa-spin"></i>');
                    $('.place-order').css('cursor', 'not-allowed');

                        if(shipping_id){
                            var url = "{{ route('get.shipping.details') }}";
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: {
                                    shipping_id: shipping_id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if(response.city_id == 8486){
                                        charge = 70;
                                        AddOrder(charge)
                                    }
                                    else{
                                        charge = 100;
                                        AddOrder(charge)
                                    }
                                },
                                error: function(xhr) {
                                    // Handle error
                                    console.log(xhr.responseText);
                                }
                            });

                        }
                        else{
                            var billing_city = '{{ Auth::guard('customer')->user()->BillingAddress->city_id }}';
                            if(billing_city == 8486){
                                charge = 70;
                                AddOrder(charge)
                            }
                            else{
                                charge = 100;
                                AddOrder(charge)
                            }
                        }
                }
                else if($('.order-type input[name="payment_type"]:checked').val() == 2){
                    $('.place-order').prop('disabled', true).html('Processing <i class="fa fa-spinner fa-spin"></i>');
                    $('.place-order').css('cursor', 'not-allowed');

                        if(shipping_id){
                            var url = "{{ route('get.shipping.details') }}";
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: {
                                    shipping_id: shipping_id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if(response.city_id == 8486){
                                        charge = 70;
                                        AddOrder(charge)
                                    }
                                    else{
                                        charge = 100;
                                        AddOrder(charge)
                                    }
                                },
                                error: function(xhr) {
                                    // Handle error
                                    console.log(xhr.responseText);
                                }
                            });

                        }
                        else{
                            var billing_city = '{{ Auth::guard('customer')->user()->BillingAddress->city_id }}';
                            if(billing_city == 8486){
                                charge = 70;
                                AddOrder(charge)
                            }
                            else{
                                charge = 100;
                                AddOrder(charge)
                            }
                        }
                }
                else if($('.order-type input[name="payment_type"]:checked').val() == 3){
                    $('.place-order').prop('disabled', true).html('Processing <i class="fa fa-spinner fa-spin"></i>');
                    $('.place-order').css('cursor', 'not-allowed');

                        if(shipping_id){
                            var url = "{{ route('get.shipping.details') }}";
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: {
                                    shipping_id: shipping_id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if(response.city_id == 8486){
                                        charge = 70;
                                        AddOrder(charge)
                                    }
                                    else{
                                        charge = 100;
                                        AddOrder(charge)
                                    }
                                },
                                error: function(xhr) {
                                    // Handle error
                                    console.log(xhr.responseText);
                                }
                            });

                        }
                        else{
                            var billing_city = '{{ Auth::guard('customer')->user()->BillingAddress->city_id }}';
                            if(billing_city == 8486){
                                charge = 70;
                                AddOrder(charge)
                            }
                            else{
                                charge = 100;
                                AddOrder(charge)
                            }
                        }
                }
            }
            else{
                $('.order-checkbox').css('color', 'red');
                $('.order-type-err').html('please choose payment method');

            }
        }
        else{
            $('.order-type-err').html('You Dont have Cart Product');
        }


        // Store Order
        function AddOrder(charge){
            var coupon_id = $('.coupon_id').html()
            $.ajax({
                url: '{{ route('store.order') }}',
                type: 'POST',
                data: {
                    sub_total: subtotal,
                    charge: charge,
                    payment_type: payment_type,
                    coupon_id: coupon_id,
                    shipping_id: shipping_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response)
                    if(payment_type == 1){
                        window.location.href = "{{ route('order.success', '') }}/" + response.order_id;
                    }
                    else if(payment_type == 2){
                        var data = JSON.stringify(response);
                        sessionStorage.setItem('data', data);
                        // Redirect to a different route with data in URL
                        window.location.href = "/pay?data=" + encodeURIComponent(data);
                    }
                    else if(payment_type == 3){
                        var data = JSON.stringify(response);
                        sessionStorage.setItem('data', data);
                        // Redirect to a different route with data in URL
                        window.location.href = "/stripe/json?data=" + encodeURIComponent(data);
                    }
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
    }

    // Coupon
    $('.coupon-apply').on('click', function(){
        var coupon = $('.coupon input[name="coupon"]').val();
        if(coupon == ''){
            $('.coupon input[name="coupon"]').addClass('is-invalid');
            $('.coupon-err').html('Please enter your coupon');
        }
        else{
            $.ajax({
                url: '{{ route('get.coupon') }}',
                type: 'POST',
                data: {
                    coupon: coupon,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.message){
                        alert(response.message)
                    }
                    if(response.coupon.validity < response.currentDate){
                        alert('coupon validity is expired')
                    }else{
                        var subtotal = '{{ $subtotal }}';
                        if(response.coupon.type == 0){
                            var discount = (subtotal * response.coupon.amount) / 100;
                            UpdateShippingCharge(discount);
                            $('.coupon_id').html(response.coupon.id)
                        }else{
                            UpdateShippingCharge(response.coupon.amount);
                            $('.coupon_id').html(response.coupon.id)
                        }
                    }


                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
        }
    })




</script>
@endsection
