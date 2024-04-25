@extends('layouts.admin_layout')
@section('title')Product View @endsection
@section('content')
<div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="slick-wrapper">
                                <div class="slider-for mb-3">
                                    @foreach ($product->Gallery as $gallery)

                                    <div class="slick-slide-item">
                                        <img src="{{ asset($gallery->gallery_path) }}" class="w-100 rounded"
                                        alt="image">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="slick-nav-wrapper">
                                    <div class="slider-nav">
                                        @foreach ($product->Gallery as $gallery)

                                        <div class="slick-slide-item m-2">
                                            <img src="{{ asset($gallery->gallery_path) }}" class="w-100 rounded"
                                            alt="image">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="d-flex justify-content-between align-items-start mt-4 mt-md-0">
                                <div>
                                    <div class="small text-muted mb-2">{{ $product->Category->name }} Products</div>
                                    <h2>{{ $product->product_name }}</h2>
                                    <p>
                                        <span class="badge bg-success">In stock</span>
                                    </p>

                                    <div class="d-flex gap-3 mb-3 align-items-center">
                                        <h4 class="text-muted mb-0">
                                            <del>$699,99</del>
                                        </h4>
                                        <h4 class="mb-0">$499,90</h4>
                                    </div>
                                    <div class="d-flex gap-2 mb-3">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-muted"></i>
                                        <span>(3)</span>
                                    </div>
                                    <p>Features:</p>
                                    <p>{!! $product->short_desc !!}</p>
                                </div>
                                <a href="#" class="btn btn-icon flex-shrink-0">
                                    <i class="bi bi-heart-fill text-danger"></i> 50
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                               aria-controls="description" aria-selected="true">Descriptions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="additional-tab" data-bs-toggle="tab" href="#additional" role="tab"
                               aria-controls="additional" aria-selected="true">Additional Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                               aria-controls="reviews" aria-selected="false">Reviews (3)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sss-tab" data-bs-toggle="tab" href="#sss" role="tab"
                               aria-controls="sss" aria-selected="false">SSS</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                             aria-labelledby="description-tab">
                        {!! $product->long_desc !!}
                        </div>
                        <div class="tab-pane fade" id="additional" role="tabpanel"
                             aria-labelledby="additional-tab">
                        {!! $product->additional_info !!}
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-5">
                                        <div class="display-6">4.0</div>
                                        <div class="d-flex gap-2 my-3">
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                                            <i class="bi bi-star-fill icon-lg text-muted"></i>
                                            <span>(3)</span>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush mb-4">
                                        <div class="list-group-item d-flex px-0">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-text bg-purple rounded-circle">R</span>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Rodger Stutely</h5>
                                                <div class="d-flex gap-2 mb-3">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-muted"></i>
                                                </div>
                                                <div>I love your products. It is very easy and fun to use this panel. I would
                                                    recommend it
                                                    to
                                                    everyone.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex px-0">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-text bg-orange rounded-circle">C</span>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Corly Hailston</h5>
                                                <div class="d-flex gap-2 mb-3">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div>I love your products. It is very easy and fun to use this panel. I would
                                                    recommend it
                                                    to
                                                    everyone.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex px-0">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/images/user/man_avatar2.jpg" class="rounded-circle" alt="image">
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Hurleigh Smallcomb</h5>
                                                <div class="d-flex gap-2 mb-3">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div>I love your products. It is very easy and fun to use this panel. I would
                                                    recommend it
                                                    to
                                                    everyone.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Comment:</label>
                                            <textarea rows="3" class="form-control" placeholder="Your opinion on the product"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Rate:</label>
                                            <div class="d-flex align-items-center">
                                                <div class="rating-example"></div>
                                                <div class="live-rating ms-3"></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="button" id="button-addon2">Send Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sss" role="tabpanel" aria-labelledby="sss-tab">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            How are the delivery processes carried out?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">It has survived not only five centuries, but
                                            also the leap into electronic typesetting, remaining essentially
                                            unchanged. It was popularised in the 1960s with the release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently
                                            with desktop publishing software like Aldus PageMaker including
                                            versions of Lorem Ipsum.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                            Is there a payment option at the door?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                         aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">It has survived not only five centuries, but
                                            also the leap into electronic typesetting, remaining essentially
                                            unchanged. It was popularised in the 1960s with the release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently
                                            with desktop publishing software like Aldus PageMaker including
                                            versions of Lorem Ipsum.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                            How many can I order at the same time?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                         aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">It has survived not only five centuries, but
                                            also the leap into electronic typesetting, remaining essentially
                                            unchanged. It was popularised in the 1960s with the release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently
                                            with desktop publishing software like Aldus PageMaker including
                                            versions of Lorem Ipsum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('admin/dist/js/examples/product-detail.js') }}"></script>
<script src="{{ asset('admin/libs/rating/jquery.rating.min.js') }}"></script>
@endsection
@section('link')
<link rel="stylesheet" href="{{ asset('admin/libs/rating/rating.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('admin/libs/slick/slick-theme.css') }}">
@endsection
