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
                                <li class="about-p"><span>Register</span></li>
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
                <div class="col">
                    <div class="register-area">
                        <div class="register-box">
                            <h1>Create account</h1>
                            <p>Please register below account detail</p>
                            <form action="{{ route('store.customer') }}" method="POST">
                                @csrf
                                <input type="text" name="f_name" placeholder="First name">
                                {!! $errors->has('f_name') ? '<strong class="text-danger">' . $errors->first('f_name') . '</strong>' : '' !!}

                                <input type="text" name="l_name" placeholder="Last name">
                                {!! $errors->has('l_name') ? '<strong class="text-danger">' . $errors->first('l_name') . '</strong>' : '' !!}

                                <input type="email" name="email" placeholder="Email address">
                                {!! $errors->has('email') ? '<strong class="text-danger">' . $errors->first('email') . '</strong>' : '' !!}

                                <input type="password" name="password" placeholder="Password">
                                {!! $errors->has('password') ? '<strong class="text-danger">' . $errors->first('password') . '</strong>' : '' !!}

                                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                <button type="submit" class="btn-style1 mt-2 float-end">Create</button>
                            </form>
                        </div>
                        <div class="register-account">
                            <h4>Already an account holder?</h4>
                            <a href="{{ route('customer.login') }}" class="ceate-a">Log in</a>
                            <div class="register-info">
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
