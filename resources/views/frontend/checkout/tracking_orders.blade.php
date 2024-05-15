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
                            <li class="about-p"><span>Traking</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->
<!-- Order complete start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="track-area">
                    <div class="track-price">
                        <ul class="track-order">
                            <li>
                                <h4>Your order id is: {{ $orderId->order_id }}</h4>
                            </li>
                            <li><span class="track-status">Status:</span>

                                @if ($orderId->status == 1)
                                    <span style="font-size: 16px; font-weight: bold; color:#187203;" class="">Placed</span>
                                @elseif ($orderId->status == 2)
                                    <span style="font-size: 16px; font-weight: bold;" class="text-info">In progress</span>
                                @elseif ($orderId->status == 3)
                                    <span style="font-size: 16px; font-weight: bold" class="text-secondary">Picked by courier</span>
                                @elseif ($orderId->status == 4)
                                    <span style="font-size: 16px; font-weight: bold" class="text-primary">On the way</span>
                                @elseif ($orderId->status == 5)
                                    <span style="font-size: 16px; font-weight: bold" class="text-warning">Ready To Pickup</span>
                                @elseif ($orderId->status == 6)
                                    <span style="font-size: 16px; font-weight: bold" class="text-success">Delivered</span>
                                @elseif ($orderId->status == 0)
                                    <span style="font-size: 16px; font-weight: bold" class="text-danger">Cancelled</span>
                                @endif
                        </li>
                        </ul>
                    </div>
                    <div class="track-main">
                        @if ($orderId->status == 0)
                        <div class="track">
                            <div class="step active">
                                <span class="icon bg-danger"><i style="font-size: 20px; line-height: 43px; color: white" class="fa fa-times-circle"></i></span>
                                <span class="text">Order confirmed</span>
                            </div>
                            <div class="step active">
                                <span class="icon bg-danger"><i style="font-size: 20px; line-height: 43px; color: white" class="fa fa-times-circle"></i></span>
                                <span class="text">Proccesing</span>
                            </div>
                            <div class="step active">
                                <span class="icon bg-danger"><i style="font-size: 20px; line-height: 43px; color: white" class="fa fa-times-circle"></i></span>
                                <span class="text">Picked by courier</span>
                            </div>
                            <div class="step active">
                                <span class="icon bg-danger"><i style="font-size: 20px; line-height: 43px; color: white" class="fa fa-times-circle"></i></span>
                                <span class="text"> On the way </span>
                            </div>
                            <div class="step active">
                                <span class="icon bg-danger"><i style="font-size: 20px; line-height: 43px; color: white" class="fa fa-times-circle"></i></span>
                                </span> <span class="text">Ready for pickup</span>
                            </div>
                            <div class="step active">
                                <span class="icon"><i style="font-size: 20px; line-height: 43px; color: white" class="fa fa-check"></i></span>
                                </span> <span class="text">Cancelled</span>
                            </div>
                        </div>
                        @else
                        <div class="track">
                            <div class="step {{ $orderId->status >= 1? 'active': '' }}">
                                <span class="icon"><i class="fa fa-check"></i></span>
                                <span class="text">Order confirmed</span>
                            </div>
                            <div class="step {{ $orderId->status >= 2? 'active': '' }}">
                                <span class="icon"><i class="fa fa-spinner"></i></span>
                                <span class="text">Proccesing</span>
                            </div>
                            <div class="step {{ $orderId->status >= 3? 'active': '' }}">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <span class="text">Picked by courier</span>
                            </div>
                            <div class="step {{ $orderId->status >= 4? 'active': '' }}">
                                <span class="icon {{ $orderId->status >= 5? 'active': '' }}"><i class="fa fa-truck"></i></span>
                                <span class="text"> On the way </span>
                            </div>
                            <div class="step {{ $orderId->status >= 5? 'active': '' }}">
                                <span class="icon"><i class="fa fa-archive"></i>
                                </span> <span class="text">Ready for pickup</span>
                            </div>
                            <div class="step {{ $orderId->status >= 6? 'active': '' }}">
                                <span class="icon"><i style="font-size: 18px" class="fa fa-check-square"></i>
                                </span> <span class="text">Delivered</span>
                            </div>
                        </div>
                        @if ($orderId->status == 1)
                        <a onclick="CancelOrder()" class="btn btn-danger float-end mt-5">Cancel Order</a>
                        @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Order complete end -->
@endsection
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style.css">
@endsection
@section('script')
<script>
    function CancelOrder(){
        var id = '{{ $orderId->id }}';
            $.ajax({
                url: '{{ route('cancel.order') }}',
                type: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
    }

</script>
@endsection
