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
                            <li class="about-p"><span>Order history</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->
<!-- order history start -->
<section class="order-histry-area section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="order-history">
                    <div class="profile">
                        <div class="order-pro">
                            <div class="pro-img">
                                <a href="javascript:void(0)"><img width="100" height="100" src="{{ Auth::guard('customer')->user()->photo ? asset(Auth::guard('customer')->user()->photo) : 'https://shorturl.at/gqrx3' }}" alt="img" ></a>
                            </div>
                            <div class="order-name">
                                <h4>Andrew louise</h4>
                                <span>Joined april 06, 2021</span>
                            </div>
                        </div>
                        @include('frontend.customer.partials.menus')
                    </div>
                    <div class="order-info">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date purchased</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr onclick="window.location='{{ route('tracking.order', $order->order_id) }}';" style="cursor: pointer">
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->created_at->format('d-M-y') }}</td>
                                            @if ($order->status == 1)
                                                <td style="font-size: 16px; font-weight: bold; color:#187203;" class="">Placed</td>
                                            @elseif ($order->status == 2)
                                                <td style="font-size: 16px; font-weight: bold;" class="text-info">In progress</td>
                                            @elseif ($order->status == 3)
                                                <td style="font-size: 16px; font-weight: bold" class="text-secondary">Picked by courier</td>
                                            @elseif ($order->status == 4)
                                                <td style="font-size: 16px; font-weight: bold" class="text-primary">On the way</td>
                                            @elseif ($order->status == 5)
                                                <td style="font-size: 16px; font-weight: bold" class="text-warning">Ready To Pickup</td>
                                            @elseif ($order->status == 6)
                                                <td style="font-size: 16px; font-weight: bold" class="text-success">Delivered</td>
                                            @elseif ($order->status == 0)
                                            <td style="font-size: 16px; font-weight: bold" class="text-danger">Cancelled</td>
                                            @endif
                                        <td>TK {{ ($order->total + $order->charge) - $order->discount }} <span style="margin-left: 8px"><a href="{{ route('invoice.download', $order->order_id) }}" class="btn btn-success btn-sm">Download Invoice</a></span></td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <td>78A643CD409</td>
                                    <td>April 08, 2021</td>
                                    <td class="canceled">Canceled</td>
                                    <td>$760.50</td>
                                </tr>
                                <tr>
                                    <td>34VB5540K83</td>
                                    <td>April 11, 2021</td>
                                    <td class="process">In progress</td>
                                    <td>$760.50</td>
                                </tr>
                                <tr>
                                    <td>78A643CD409</td>
                                    <td>April 15, 2021</td>
                                    <td class="delayed">Delayed</td>
                                    <td>$760.50</td>
                                </tr>
                                <tr>
                                    <td>78A643CD409</td>
                                    <td>April 18, 2021</td>
                                    <td class="delivered">Delivered</td>
                                    <td>$760.50</td>
                                </tr>
                                <tr>
                                    <td>78A643CD409</td>
                                    <td>April 21, 2021</td>
                                    <td class="delivered">Delivered</td>
                                    <td>$760.50</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order history end -->

@endsection
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/responsive.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .placed{
        color: palevioletred;
    }
</style>
@endsection
