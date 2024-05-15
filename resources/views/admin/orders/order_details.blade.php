@extends('layouts.admin_layout')
@section('content')
 <!-- content -->
 <div class="content ">

    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-5 d-flex align-items-center justify-content-between">
                        <span>Order No : <a href="#">#{{ $order->order_id }}</a></span>
                        @if ($order->status == 1)
                            <span class="badge bg-secondary">Placed</span>
                        @elseif ($order->status == 2)
                            <span class="badge bg-info">In proccess</span>
                        @elseif ($order->status == 3)
                            <td style="font-size: 16px; font-weight: bold" class="text-secondary">Picked by courier</td>
                        @elseif ($order->status == 4)
                            <span class="badge bg-primary">On The Way</span>
                        @elseif ($order->status == 5)
                            <span class="badge bg-warning">Ready To Pickup</span>
                        @elseif ($order->status == 6)
                            <span class="badge bg-success">Completed</span>
                        @elseif ($order->status == 0)
                            <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </div>
                    <div class="row mb-5 g-4">
                        <div class="col-md-3 col-sm-6">
                            <p class="fw-bold">Order Created at</p>
                            {{ $order->created_at->format('d/m/Y \a\t h:i A') }}
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <p class="fw-bold">Name</p>
                            {{ $order->Customer->f_name.' '. $order->Customer->l_name }}
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <p class="fw-bold">Email</p>
                            {{ $order->Customer->email }}
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <p class="fw-bold">Contact No</p>
                            {{ $order->Customer->phone }}
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-sm-12">
                            @if ($order->shipping_id)
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-0">Shipping Address</h5>
                                        </div>
                                        <div>Name: {{ $order->ShippingAddress->f_name.' '. $order->ShippingAddress->l_name }}</div>
                                        <div>{{ $order->ShippingAddress->email }}</div>
                                        <div>{{ $order->ShippingAddress->address }}</div>
                                        <div>
                                            <i class="bi bi-telephone me-2"></i> {{ $order->ShippingAddress->phone }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-0">Delivery Address</h5>
                                        </div>
                                        <div>Name: Home</div>
                                        <div>{{ $order->BillingAddress->email }}</div>
                                        <div>{{ $order->BillingAddress->address }}</div>
                                        <div>
                                            <i class="bi bi-telephone me-2"></i> {{ $order->BillingAddress->phone }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0">Billing Address</h5>
                                        <a href="#">Edit</a>
                                    </div>
                                    <div>Name: {{ $order->BillingAddress->f_name.' '. $order->BillingAddress->l_name }}</div>
                                    <div>{{ $order->BillingAddress->email }}</div>
                                    <div>{{ $order->BillingAddress->address }}</div>
                                    <div>
                                        <i class="bi bi-telephone me-2"></i> {{ $order->BillingAddress->phone }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card widget">
                <h5 class="card-header">Order Items</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->Products as $orderproduct)
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="{{ asset($orderproduct->Product->preview_img) }}" class="rounded" width="60" alt="...">
                                        </a>
                                    </td>
                                    <td>{{ $orderproduct->Product->product_name }}</td>
                                    <td>{{ $orderproduct->quantity }}</td>
                                    <td>&#2547; {{ $orderproduct->price }}</td>
                                    <td>&#2547; {{ $orderproduct->price * $orderproduct->quantity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title mb-4">Price</h6>
                    <div class="row justify-content-center mb-3">
                        <div class="col-4 text-end">Sub Total :</div>
                        <div class="col-4">&#2547; {{ $order->total }}.00</div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-4 text-end">Shipping :</div>
                        <div class="col-4">&#2547; {{ $order->charge }}.00</div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-4 text-end">Discount :</div>
                        <div class="col-4">&#2547; {{ $order->discount }}.00</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 text-end">
                            <strong>Total :</strong>
                        </div>
                        <div class="col-4">
                            <strong>&#2547; {{ ($order->total + $order->charge)- $order->discount }}.00</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-4">Invoice</h6>
                    <div class="row justify-content-center mb-3">
                        <div class="col-6 text-end">Invoice No :</div>
                        <div class="col-6">
                            <a href="#">#5355619</a>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-6 text-end">Seller GST :</div>
                        <div class="col-6">12HY87072641Z0</div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-6 text-end">Purchase GST :</div>
                        <div class="col-6">22HG9838964Z1</div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- ./ content -->
@endsection
