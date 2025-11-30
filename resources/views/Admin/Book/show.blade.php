@extends('layout.dashboard')

@section('content')

<div class="container mt-4">

    <h2>Book Details</h2>

    <div class="card p-4">

        <p><strong>Name:</strong> {{ $book->name }}</p>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Type ID:</strong> {{ $book->type_id }}</p>
        <p><strong>Quantity:</strong> {{ $book->quantity }}</p>
        <p><strong>Price:</strong> ${{ $book->price }}</p>
        <p><strong>Publisher:</strong> {{ $book->publisher }}</p>

        @if($book->image)
            <p><strong>Image:</strong></p>
            <img src="{{ $book->image }}" width="150" class="img-thumbnail">
        @endif

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back</a>

    </div>

</div>

@endsection
