@extends('layout.dashboard')

@section('content')
<div class="container-fluid py-4">
    <h1 class="fw-bold mb-4">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Publisher</label>
            <input type="text" name="publisher" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Type</label>
            <select name="type_id" class="form-select">
                <option value="">Select Type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-purple">Save Book</button>
        </div>
    </form>
</div>
@endsection
