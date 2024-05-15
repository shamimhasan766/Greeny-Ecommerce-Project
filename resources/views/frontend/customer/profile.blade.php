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
                            <li class="about-p"><span>Profile</span></li>
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
                        @include('frontend.customer.partials.menus')
                    </div>
                    <div class="profile-form">
                        <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <ul class="pro-input-label">
                                <li>
                                    <img height="200" class="d-block m-auto" src="{{ Auth::guard('customer')->user()->photo ? asset(Auth::guard('customer')->user()->photo) : 'https://shorturl.at/gqrx3' }}" alt="" id="blah">
                                    <input type="file" name="picture" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    {!! $errors->has('picture') ? '<strong class="text-danger">' . $errors->first('picture') . '</strong>' : '' !!}
                                </li>
                            </ul>
                            <ul class="pro-input-label">
                                <li>
                                    <label>First name</label>
                                    <input type="text" name="f_name" placeholder="First name" value="{{ Auth::guard('customer')->user()->f_name }}">
                                    {!! $errors->has('f_name') ? '<strong class="text-danger">' . $errors->first('f_name') . '</strong>' : '' !!}
                                </li>
                                <li>
                                    <label>Last name</label>
                                    <input type="text" name="l_name" placeholder="Last name" value="{{ Auth::guard('customer')->user()->l_name }}">
                                    {!! $errors->has('l_name') ? '<strong class="text-danger">' . $errors->first('l_name') . '</strong>' : '' !!}
                                </li>
                            </ul>
                            <ul class="pro-input-label">
                                <li>
                                    <label>Email address</label>
                                    <input type="email" name="email" placeholder="Email address" required value="{{ Auth::guard('customer')->user()->email }}">
                                    {!! $errors->has('email') ? '<strong class="text-danger">' . $errors->first('email') . '</strong>' : '' !!}
                                </li>
                                <li>
                                    <label>Phone number</label>
                                    <input type="tel" name="phone" placeholder="Phone number" value="{{ Auth::guard('customer')->user()->phone }}">
                                    {!! $errors->has('phone') ? '<strong class="text-danger">' . $errors->first('phone') . '</strong>' : '' !!}
                                </li>
                            </ul>
                            <ul class="pro-input-label">
                                <li>
                                    <label>Old password</label>
                                    <input type="password" name="old_password" placeholder="New password">
                                    {!! session()->has('old_password') ? '<strong class="text-danger">' . session('old_password') . '</strong>' : '' !!}
                                </li>
                                <li>
                                    <label>New password</label>
                                    <input type="password" name="password" placeholder="New password">
                                    {!! $errors->has('password') ? '<strong class="text-danger">' . $errors->first('password') . '</strong>' : '' !!}
                                </li>
                                <li>
                                    <label>Confirm password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm password">
                                </li>
                            </ul>
                            <ul class="pro-submit">
                                <li>
                                    <input type="checkbox" name="name">
                                    <label>Subscribe me to newsletter</label>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-style1">Update profile</button>
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

@endsection

