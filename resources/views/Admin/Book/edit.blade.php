@extends('layout.dashboard')

@section('content')

<div class="container mt-4">
    <h2>Edit Book</h2>

    <div class="card p-4">

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Book Name</label>
                <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="number" name="type_id" class="form-control" value="{{ $book->type_id }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ $book->quantity }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" name="price" class="form-control" value="{{ $book->price }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image (URL)</label>
                <input type="text" name="image" class="form-control" value="{{ $book->image }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}">
            </div>

            <button class="btn btn-warning" type="submit">Update Book</button>

        </form>

    </div>
</div>

@endsection
