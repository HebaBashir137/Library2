@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="gradient-text">Browse Books</h2>

    <div class="d-flex align-items-center gap-3">
        {{-- My Cart Button --}}
        @auth
            <a href="{{ route('cart.index') }}" class="btn-purple px-4 py-2" style="border-radius: 12px;">
                <i class="bi bi-cart3 me-1"></i> My Cart
            </a>
        @endauth

        {{-- Search Bar --}}
        <form action="{{ route('user.book.search') }}" method="GET" class="d-flex" style="max-width: 350px;">
            <input
                type="text"
                name="title"
                class="form-control purple-light-bg"
                placeholder="Search by title..."
                value="{{ request('title') }}">
            <button class="btn-purple ms-2 px-4">Search</button>
        </form>
    </div>
</div>

{{-- Books list --}}
@if(isset($books) && $books->count() > 0)
    <div class="row g-4">
        @foreach($books as $book)
            <div class="col-md-4 col-lg-3">
                <div class="purple-card h-100 text-center">
                    {{-- Book Image --}}
                    <img
                        src="{{ $book->imgurl }}"
                        class="img-fluid rounded mb-3"
                        alt="Book Image"
                        style="height: 230px; object-fit: cover; width: 100%;">
                    
                    {{-- Title --}}
                    <h5 class="gradient-text fw-bold mb-1">
                        {{ $book->title }}
                    </h5>
                    
                    {{-- Author --}}
                    <p class="text-muted small mb-1">{{ $book->author ?? 'Unknown Author' }}</p>
                    
                    {{-- Description --}}
                    <p class="text-muted small">
                        {{ Str::limit($book->description, 90) }}
                    </p>
                    
                    {{-- View Details --}}
                    <a href="{{ route('books.show', $book->id) }}" class="btn-purple w-100 mt-2">
                        View Details
                    </a>

                    {{-- Add to Cart --}}
                    @auth
                        <form method="POST" action="{{ route('cart.store') }}" class="mt-2">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="btn-purple w-100 py-2" style="border-radius: 15px;">
                                <i class="bi bi-cart-plus me-1"></i> Add to Cart
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-purple w-100 py-2 mt-2" style="border-radius: 15px;">
                            Login to Add to Cart
                        </a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
@else
    <div class="purple-card text-center">
        <h4 class="gradient-text">No books found</h4>
        <p class="text-muted">Try searching with another keyword.</p>
    </div>
@endif
@endsection