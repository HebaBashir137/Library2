@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Add New Book</h2>

    <div class="card p-4">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Book Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="" name="type_id" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image (URL)</label>
                <input type="text" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Create Book</button>
        </form>
    </div>

</div>
@endsection
