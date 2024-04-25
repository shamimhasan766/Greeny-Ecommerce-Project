@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">Add Brand</div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Brand Name</label>
                        <input type="text" name="name" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">logo</label>
                        <input type="file" name="logo" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block m-auto">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
