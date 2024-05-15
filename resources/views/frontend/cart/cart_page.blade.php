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
                                <span>Your shopping cart</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcumb end -->
    <!-- cart start -->
    <section class="cart-page section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="cart-total">
                        <div class="cart-price">
                            <span>Subtotal</span>
                            <span class="subtotal"></span>
                        </div>
                        <div class="cart-info">
                            <h4>Shipping info</h4>
                            <form>
                                <select class="form-select charge" name="charge" aria-label="Default select example">
                                    <option value="">---</option>
                                    @foreach ($charges as $charge)
                                    <option data-id="{{ $charge->charge }}" value="{{ $charge->id }}">{{ $charge->location }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="shop-total">
                            <span>Charge</span>
                            <span class="total-amount total-charge"></span>
                        </div>
                        <div class="shop-total">
                            <span>Total</span>
                            <span class="total-amount total"></span>
                        </div>
                        <strong class="text-danger checkout-err"></strong>
                        <a class="check-link btn btn-style1 checkoutbtn">Checkout</a>
                    </div>
                </div>
                @php
                    $carts = Auth::guard('customer')->user()->Cart;
                    $subtotal = 0;
                @endphp
                <div class="col-xl-9 col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="cart-area">
                        <div class="cart-details">
                            <div class="cart-item">
                                <span class="cart-head">My cart:</span>
                                <span class="c-items">{{ $carts->count() }} item</span>
                            </div>
                        </div>
                    </div>
                    @foreach ($carts as $cart)
                    <div class="cart-area cart-item-{{ $cart->id }}" data-cart-id="{{ $cart->id }}">
                        <div class="cart-details">
                            <div class="cart-all-pro">
                                <div class="cart-pro">
                                    <div class="cart-pro-image">
                                        <a href="{{ route('product.details', $cart->Product->slug) }}"><img height="100px" src="{{ asset($cart->Product->preview_img) }}" class="" alt="image"></a>
                                    </div>
                                    <div class="pro-details">
                                        <h4><a href="{{ route('product.details', $cart->Product->slug) }}">{{ $cart->Product->product_name }}</a></h4>
                                        <span class="pro-size"><span class="size">Size:</span> {{ $cart->Size->size_name }}</span>
                                        <span class="pro-size"><span class="size">Color:</span> {{ $cart->Color->color_name }}</span>
                                        <span class="cart-pro-price">TK {{ round($cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount) }}/-</span>
                                    </div>
                                </div>
                                <div class="qty-item">
                                    <div class="center">
                                        <div class="plus-minus">
                                            <span>
                                                <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                                <input type="text" class="quantity_input" name="quantity" value="{{ $cart->quantity }}">
                                                <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                            </span>
                                        </div>
                                        <a href="#" data-cart-id="{{ $cart->id }}" class="pro-remove remove-cart">Remove</a>
                                    </div>
                                </div>
                                <div class="all-pro-price">
                                    <span>TK {{ $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount * $cart->quantity }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $subtotal += $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount * $cart->quantity;
                    @endphp
                    @endforeach
                    <div class="subtotal_hidden d-none">{{ $subtotal }}</div>

                </div>
            </div>
        </div>
    </section>
    <!-- cart end -->
@endsection
@section('link')
<style>
    .is-invalid{
        border: 1px solid red;
    }
</style>

@endsection
@section('script')
<script>
$(document).ready(function() {
    $('.plus-btn').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var input = $(this).siblings('input[name="quantity"]'); // Get the input field

        var currentValue = parseInt(input.val()); // Get the current value
        input.val(currentValue + 1); // Increment the value
        updateTotalPrice(input);
        updateCartQuantity(input);
        updateSubtotal()
    });

    $('.minus-btn').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior

        var input = $(this).siblings('input[name="quantity"]'); // Get the input field
        var currentValue = parseInt(input.val()); // Get the current value
        if (currentValue > 1) {
            input.val(currentValue - 1); // Decrement the value, but not below 1
            updateTotalPrice(input);
            updateCartQuantity(input);
            updateSubtotal()
        }
    });

    // Update value on input change
    $('input[name="quantity"]').on('input', function() {
        var value = parseInt($(this).val());
        if (isNaN(value) || value < 1) {
            $(this).val(1); // Reset to 1 if input is invalid
        }
        updateTotalPrice($(this));
        updateCartQuantity($(this));
        updateSubtotal()
    });

    // Function to update the cart quantity
    function updateCartQuantity(input) {
        var cartId = input.closest('.cart-area').data('cart-id'); // Get the cart ID
        var quantity = input.val(); // Get the new quantity value
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('update.cart.quantity') }}', // Your update cart quantity route
            method: 'POST',
            data: {
                cart_id: cartId,
                quantity: quantity
            },
            success: function(response) {
                console.log(response)
                // Handle success response if needed
            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors to the console
            }
        });
    }

     // Function to update the total price
     function updateTotalPrice(input) {
        var quantity = parseInt(input.val());
        var pricePerUnit = parseFloat(input.closest('.qty-item').siblings('.cart-pro').find('.cart-pro-price').text().replace('TK ', '').replace('/-', ''));
        var totalPrice = quantity * pricePerUnit;
        input.closest('.qty-item').siblings('.all-pro-price').find('span').text('TK ' + totalPrice.toFixed(2));
    }
    function updateSubtotal() {
        var charge = 0;
        var selectedOption = $('.charge option:selected');
        if (selectedOption.length && selectedOption.data('id')) {
            charge = parseFloat(selectedOption.data('id')); // Get the charge value from data-id
        }
        var subtotal = 0;
        $('.all-pro-price span').each(function() {
            subtotal += parseFloat($(this).text().replace('TK ', '').replace('/-', ''));
        });
        // Update Charge
        $('.total-charge').html(charge);

        // Update Subtotal
        $('.subtotal').html('TK ' + subtotal.toFixed(2));
        // Update Total
        subtotal += charge; // Add the charge to the subtotal
        $('.total').html('TK ' + subtotal.toFixed(2));
    }

    updateSubtotal()

    $('.charge').on('change', function(){
        updateSubtotal()
    });
    $('.remove-cart').click(function(e) {
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
                    var input = $(this).siblings('input[name="quantity"]');
                    // For example, you could remove the deleted cart item from the UI
                    $('.cart-item-' + cartId).remove();
                    updateCartCount()
                    updateTotalPrice(input);
                    updateCartQuantity(input);
                    updateSubtotal()
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
    });

    // Validate Charge
    $('.checkoutbtn').on('click', function(){
        if(validateCharge()){
            window.location.href = "{{ route('checkout.page') }}";
        }
        else{
            $('.checkout-err').html('Please select a shipping info')
        }
    })
    function validateCharge(){
        var isValid = true;

        var charge_input = $('.cart-info select[name="charge"]');

        if ($.trim($(charge_input).val()) == '') {
            isValid = false;
            $(charge_input).addClass('is-invalid'); // Add a class to highlight the empty input
        } else {
            $(charge_input).removeClass('is-invalid');
        }

        return isValid;
    }
});
</script>
@endsection
