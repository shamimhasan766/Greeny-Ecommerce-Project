@extends('layouts.admin_layout')
@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header"><h4>Customer List</h4></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>PP</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>started at</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($customers as $sl=>$customer)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>
                                    <img height="50" src="{{ asset($customer->photo ?? 'uploads/customer/photo/default-avatar.jpg') }}" alt="">
                                </td>
                                <td>{{ $customer->f_name.' '. $customer->l_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->created_at->format('d-M-&')}}</td>
                                <td>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
