@extends('layouts.admin_layout')
@section('title')
    Add Size
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card h-auto">
            @if (session('size_success'))
                <div class="alert alert-success">{{ session('size_success') }}</div>
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
            <div class="card-header"><h3>Add Size</h3></div>
            <div class="card-body">
                <form action="{{ route('size.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Size Name</label>
                        <input type="text" name="size_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Add Size</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
