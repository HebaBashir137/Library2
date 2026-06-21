<!-- Admin/Category/index.blade.php -->
@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <div class="top-bar-royal mb-4">
        <div>
            <h1 class="page-title-royal mb-2">Categories Management</h1>
            <div class="breadcrumb-royal">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <span class="separator">/</span>
                <span>Categories</span>
            </div>
        </div>
        <div class="control-royal">
            <form action="{{ route('categories.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" 
                       placeholder="Search categories..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn-purple">Search</button>
            </form>
            <a href="{{ route('categories.create') }}" class="btn-purple">
                <i class="fas fa-plus me-2"></i> Add Category
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="royal-card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Classification</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->classi->name ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('categories.show', $category->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" 
                                   class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Delete this category?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection