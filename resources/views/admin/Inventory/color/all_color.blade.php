@extends('layouts.admin_layout')
@section('title')
    All Colors
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        @if (session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif
        <div class="card">
            <div class="card-header"><h3>Color List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($colors as $sl=>$color)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $color->color_name }}</td>
                        <td style="margin-top: 16px; margin-left:20px; background:{{ $color->color_code }} " class="badge badge-danger">{{ $color->color_code }}</td>
                        <td><a href="{{ route('color.change.status', $color->id) }}" class="btn btn-{{ $color->status == 0 ? 'danger' : 'success' }}">{{ $color->status == 0 ? 'deactive' : 'active' }}</a></td>
                        <td>{{ $color->created_at }}</td>
                        <td>{{ $color->updated_at }}</td>
                        <td>
                            <a href="{{ route('color.delete', $color->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
