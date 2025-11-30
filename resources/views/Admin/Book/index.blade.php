@extends('layout.dashboard')   {{-- Use your main admin layout --}}

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Books List</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Book
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Publisher</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->quantity }}</td>
                <td>${{ $book->price }}</td>
                <td>{{ $book->publisher }}</td>

                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this book?')">
                            <i class="fa fa-trash"></i>
                        </button>

                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
