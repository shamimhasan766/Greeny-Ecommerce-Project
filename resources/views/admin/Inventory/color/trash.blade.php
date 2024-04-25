@extends('layouts.admin_layout')
@section('title')
Trash Color
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
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Deleted At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($colors as $sl=>$color)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $color->color_name }}</td>
                        <td style="margin-top: 16px; margin-left:20px; background:{{ $color->color_code }} " class="badge badge-danger">{{ $color->color_code }}</td>
                        <td>{{ $color->deleted_at }}</td>
                        <td>
                            <a title="Restore" href="{{ route('color.restore', $color->id) }}" class="edit btn btn-success btn-icon"><i class="fa-solid fa-rotate-left"></i></a>
                            <a title="Permanent Delete" href="{{ route('color.force.delete', $color->id) }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
