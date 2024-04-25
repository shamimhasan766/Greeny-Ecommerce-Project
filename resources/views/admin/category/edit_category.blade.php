@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-header text-center">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update.category', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            <div class="mb-5">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                                @error('name')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <img height="200" src="{{ asset($category->photo) }}" alt="" id="blah">
                                <input type="file" name="photo" class="form-control mt-2" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                @error('photo')
                                    <div class="strong text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        <div class="col-lg-6 m-auto">
                            <div class="mb-5">
                                <button class="btn btn-success d-block m-auto">Update Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
