@extends('layout.dashboard')

@section('content')

<div class="container mt-4">
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input value="{{ $book->title }}" type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <input value="{{ $book->author }}" type="text" name="author" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type_id" class="form-control">
                <option value="">-- Select Type --</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" 
                        {{ $book->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" value="{{ $book->quantity }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" step="0.01" name="price" value="{{ $book->price }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Publisher</label>
                <input type="text" name="publisher" value="{{ $book->publisher }}" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>

            @if($book->imgurl)
                <img src="{{ $book->imgurl }}" width="120" class="rounded mb-2">
            @else
                <p class="text-muted">No image uploaded</p>
            @endif

            <input type="file" name="image" class="form-control mt-2">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>

    </form>
</div>

@endsection
