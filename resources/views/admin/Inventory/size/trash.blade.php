@extends('layouts.admin_layout')
@section('title')
    Size Trash
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            @if (session('restored'))
                <div class="alert alert-success">{{ session('restored') }}</div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <div class="card-header"><h3>Color List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Size Name</th>
                        <th>Deleted At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sizes as $sl=>$size)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $size->size_name }}</td>
                        <td>{{ $size->deleted_at }}</td>
                        <td>
                            <a title="Restore" href="{{ route('size.restore', $size->id) }}" class="edit btn btn-success btn-icon"><i class="fa-solid fa-rotate-left"></i></a>
                            <a title="Permanent Delete" href="{{ route('size.force.delete', $size->id) }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
