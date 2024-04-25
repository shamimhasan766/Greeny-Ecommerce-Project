@extends('layouts.admin_layout')
@section('title')
All Sizes
@endsection
@section('content')
<div class="row">
    @if (session('delete'))
        <div class="alert alert-danger">{{ session('delete') }}</div>
    @endif
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header"><h3>Size List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Size Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sizes as $sl=>$size)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $size->size_name }}</td>
                        <td><a href="{{ route('size.change.status', $size->id) }}" class="btn btn-{{ $size->status == 0 ? 'danger' : 'success' }}">{{ $size->status == 0 ? 'deactive' : 'active' }}</a></td>
                        <td>{{ $size->created_at }}</td>
                        <td>{{ $size->updated_at }}</td>
                        <td>
                            <a href="{{ route('size.delete', $size->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
