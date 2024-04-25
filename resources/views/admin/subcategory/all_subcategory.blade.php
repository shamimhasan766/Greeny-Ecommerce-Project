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
            <li class="breadcrumb-item active" aria-current="page">All Sub Category</li>
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
            <th>Sub Category Name</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $sl=>$subcategory)
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="">{{ $sl+1 }}</a>
                </td>
                <td>{{ $subcategory->subcategory }}</td>
                <td>{{ $subcategory->Category->name }}</td>
                <td>{{ $subcategory->slug }}</td>
                <td><a href="{{ route('change.subcategory.status', $subcategory->id) }}" class="btn btn-{{ $subcategory->status == 0 ? 'danger' : 'success' }}">{{ $subcategory->status == 0 ? 'deactive' : 'active' }}</a></td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown"
                            class="btn btn-floating"
                            aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('edit.category', $subcategory->id) }}" class="dropdown-item">Edit</a>
                                <a href="{{ route('delete.subcategory', $subcategory->id) }}" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('link')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
@endsection
@section('script')
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('.table');
    </script>
@endsection
