<!-- Admin/Type/create.blade.php -->
@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <div class="top-bar-royal mb-4">
        <div>
            <h1 class="page-title-royal mb-2">Add New Type</h1>
            <div class="breadcrumb-royal">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <span class="separator">/</span>
                <a href="{{ route('types.index') }}">Types</a>
                <span class="separator">/</span>
                <span>Add New</span>
            </div>
        </div>
        <a href="{{ route('types.index') }}" class="btn-purple">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>
    </div>

    <div class="royal-card">
        <form action="{{ route('types.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">Type Name *</label>
                    <input type="text" name="name" class="form-control" required>
                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-semibold">Category *</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-semibold">Edition *</label>
                    <input type="text" name="edition" class="form-control" required>
                    @error('edition')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('types.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn-purple">
                    <i class="fas fa-check-circle me-2"></i> Save Type
                </button>
            </div>
        </form>
    </div>
</div>
@endsection