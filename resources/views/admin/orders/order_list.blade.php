@extends('layouts.admin_layout')
@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header"><h4>Order List</h4></div>
                <div class="card-body">
                    <table class="table table-borderd">
                        <tr>
                            <th>SL</th>
                            <th>Order_id</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($orders as $sl=>$order)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ ($order->total + $order->charge)- $order->discount }}</td>

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

                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('order.status.change', $order->id) }}" method="POST">
                                        @csrf
                                    <!-- Example single danger button -->
                                    <div class="btn-group dropend">
                                        <button style="background: #6c757d; border: #6c757d; color: white;" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                          Change Status
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li><button class="dropdown-item" value="1" name="status">Placed</button></li>
                                            <li><button class="dropdown-item" value="2" name="status">In proccess</button></li>
                                            <li><button class="dropdown-item" value="3" name="status">Picked by courier</button></li>
                                            <li><button class="dropdown-item" value="4" name="status">On the way</button></li>
                                            <li><button class="dropdown-item" value="5" name="status">Ready To Pickup</button></li>
                                            <li><button class="dropdown-item" value="6" name="status">Delivered</button></li>
                                            <li><button class="dropdown-item" value="0" name="status">Cancel</button></li>
                                        </ul>
                                      </div>
                                    </form>
                                    <div>

                                        <a href="{{ route('order.details.view', $order->id) }}" style="margin: 6px 0px 0px 7px" class="btn btn-sm btn-primary">View</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
