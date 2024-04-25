@extends('layouts.master')
@section('content')
  <!-- breadcrumb start -->
  <section class="about-breadcrumb">
    <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="about-l">
                        <ul class="about-link">
                            <li class="go-home"><a href="index1.html">Home</a></li>
                            <li class="about-p"><span>Address</span></li>
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
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="col">
                <div class="order-history">
                    <div class="profile">
                        <div class="order-pro">
                            <div class="pro-img">
                                <a href="javascript:void(0)"><img width="100" height="100" src="{{ Auth::guard('customer')->user()->photo ? asset(Auth::guard('customer')->user()->photo) : 'https://shorturl.at/gqrx3' }}" alt="img" ></a>
                            </div>
                            <div class="order-name">
                                <h4>{{ Auth::guard('customer')->user()->f_name .' '. Auth::guard('customer')->user()->l_name }}</h4>
                                <span>Joined {{ Auth::guard('customer')->user()->created_at->format('d-M-y') }}</span>
                            </div>
                        </div>
                        <div class="order-his-page">
                            <ul class="profile-ul">
                                <li class="profile-li"><a href="order-history.html"><span>Orders</span> <span class="pro-count">5</span></a></li>
                                <li class="profile-li"><a href="{{ route('customer.profile') }}">Profile</a></li>
                                <li class="profile-li"><a href="{{ route('customer.address') }}" class="active">Address</a></li>
                                <li class="profile-li"><a href="{{ route('customer.log.out') }}" >Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="profile-address">
                        <form action="{{ route('customer.address.update') }}" method="POST">
                            @csrf
                            <div class="pro-add-title">
                                <h4>Contact address</h4>
                            </div>
                            <ul class="add-label-input">
                                <li>
                                    <label class="mb-2">Country *</label>
                                    <select class="form-select country_id" name="country_id" id="" onchange="getCity(this.value)">
                                        <option selected value="" disabled>Select Country</option>
                                        @foreach ($countries as $country)
                                        <option {{ Auth::guard('customer')->user()->country_id == $country->id ? 'selected': '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->has('country') ? '<strong class="text-danger">' . $errors->first('country') . '</strong>' : '' !!}
                                </li>
                                <li>
                                    <label class="mb-2">City *</label>
                                    <select name="city_id" class="form-select city_id" id="">
                                        @if (Auth::guard('customer')->user()->city_id)
                                        <option selected value="{{ Auth::guard('customer')->user()->city_id }}">{{ Auth::guard('customer')->user()->City->name }}</option>
                                        @else
                                        <option value="" selected>Select City</option>
                                        @endif
                                    </select>
                                    {!! $errors->has('city') ? '<strong class="text-danger">' . $errors->first('city') . '</strong>' : '' !!}
                                </li>
                            </ul>
                            <ul class="add-label-input">
                                <li>
                                    <label>Address </label>
                                    <input type="text" name="address" placeholder="Enter Address" value="{{ Auth::guard('customer')->user()->address }}">
                                </li>
                            </ul>
                            <ul class="pro-submit">
                                <li>
                                    <input type="checkbox" name="--">
                                    <label>Same as contact address</label>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-style1">Update address</button>
                                </li>
                            </ul>
                        </form>
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
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".country_id").select2();
    $(".city_id").select2();

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
</script>
@endsection
