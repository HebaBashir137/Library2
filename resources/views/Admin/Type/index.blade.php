<!-- Admin/Type/index.blade.php -->
@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <div class="top-bar-royal mb-4">
        <div>
            <h1 class="page-title-royal mb-2">Types Management</h1>
            <div class="breadcrumb-royal">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <span class="separator">/</span>
                <span>Types</span>
            </div>
        </div>
        <div class="control-royal">
            <form action="{{ route('types.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" 
                       placeholder="Search types..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn-purple">Search</button>
            </form>
            <a href="{{ route('types.create') }}" class="btn-purple">
                <i class="fas fa-plus me-2"></i> Add Type
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
                        <th>Category</th>
                        <th>Edition</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $index => $type)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $type->name }}</strong></td>
                        <td>{{ $type->category->name ?? '-' }}</td>
                        <td>{{ $type->edition }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('types.show', $type->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('types.edit', $type->id) }}" 
                                   class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('types.destroy', $type->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Delete this type?')">
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