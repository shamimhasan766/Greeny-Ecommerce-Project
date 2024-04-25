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
                                <li class="about-p"><span>Login</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- login start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="col">
                    <div class="login-area">
                        <div class="login-box">
                            <h1>Login</h1>
                            <p>Please login below account detail</p>
                            <form action="{{ route('login.customer') }}" method="POST">
                                @csrf
                                <label>Email address</label>
                                <input type="text" name="email" placeholder="Email address">
                                {!! $errors->has('email') ? '<strong class="text-danger">' . $errors->first('email') . '</strong>' : '' !!}
                                <label class="d-block">Password</label>
                                <input type="password" name="password" placeholder="Password">
                                {!! $errors->has('password') ? '<strong class="text-danger">' . $errors->first('password') . '</strong>' : '' !!}
                                <button type="submit" class="btn-style1 mt-2 float-end">Sign in</button>
                                <a href="forgot-password.html" class="re-password">Forgot your password?</a>
                            </form>
                        </div>
                        <div class="login-account">
                            <h4>Don't have an account?</h4>
                            <a href="{{ route('customer.register') }}" class="ceate-a">Create account</a>
                            <div class="login-info">
                                <a href="terms-conditions.html" class="terms-link"><span>*</span> Terms & conditions.</a>
                                <p>Your privacy and security are important to us. For more information on how we use your data read our <a href="privacy-policy.html">privacy policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login end -->
@endsection
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/') }}/style.css">
@endsection
