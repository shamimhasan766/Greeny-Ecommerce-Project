@extends('layouts.admin_layout')
@section('title')
Add Color
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card h-auto">
            @if (session('color_success'))
                <div class="alert alert-success">{{ session('color_success') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-header"><h3>Add Color</h3></div>
            <div class="card-body">
                <form action="{{ route('color.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Color Name</label>
                        <input type="text" name="color_name" value="{{ old('color_name') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choose Color</label>
                        <input type="color" name="color_code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Add Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
