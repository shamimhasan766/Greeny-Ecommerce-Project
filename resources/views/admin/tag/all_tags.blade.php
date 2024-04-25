@extends('layouts.admin_layout')
@section('content')
<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a>
                    <i class="bi bi-globe2 small me-2"></i> Ecommerce
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Tags</li>
        </ol>
    </nav>
</div>


<div class="table-responsive">
    @if (session('delete'))
        <div class="alert alert-danger">{{ session('delete') }}</div>
    @endif
    <table class="table table-custom table-lg mb-0" id="customers">
        <thead>
        <tr>
            <th>
                <input class="form-check-input select-all" type="checkbox" data-select-all-target="#customers" id="defaultCheck1">
            </th>
            <th>SL</th>
            <th>Tag Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tags as $sl=>$tag)
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="">{{ $sl+1 }}</a>
                </td>
                <td>{{ $tag->tag_name }}</td>
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->updated_at }}</td>
                <td>
                <a title="Delete {{ $tag->tag_name }}" href="{{ route('delete.tag', $tag->id) }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
