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
            <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
            <li class="breadcrumb-item active" aria-current="page">Trash</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        @if (session('restored'))
        <div class="alert alert-success">{{ session('restored') }}</div>
        @endif
        @if (session('force_delete'))
            <div class="alert alert-warning">{{ session('force_delete') }}</div>
        @endif
        <div class="d-md-flex">
            <div class="d-md-flex gap-4 align-items-center">
                <form class="mb-3 mb-md-0">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>Sort by</option>
                                <option value="desc">Desc</option>
                                <option value="asc">Asc</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <button class="btn btn-outline-light" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="dropdown ms-auto">
                <a href="#" data-bs-toggle="dropdown"
                   class="btn btn-primary dropdown-toggle"
                   aria-haspopup="true" aria-expanded="false">Actions</a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">Action</a>
                    <a href="#" class="dropdown-item">Another action</a>
                    <a href="#" class="dropdown-item">Something else here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-custom table-lg mb-0" id="customers">
        <thead>
        <tr>
            <th>
                <input class="form-check-input select-all" type="checkbox" data-select-all-target="#customers" id="defaultCheck1">
            </th>
            <th>SL</th>
            <th>Sub Category Name</th>
            <th>Slug</th>
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
                <td>{{ $subcategory->name }}</td>
                <td>{{ $subcategory->slug }}</td>
                <td class="text-end">
                    <td>
                        <a title="Restore" href="{{ route('restore.subcategory', $subcategory->id) }}" class="edit btn btn-success btn-icon"><i class="fa-solid fa-rotate-left"></i></a>
                        <a title="Permanent Delete" href="{{ route('force.delete.subcategory', $subcategory->id) }}" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<nav class="mt-4" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
@endsection

