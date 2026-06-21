<!-- Admin/Book/show.blade.php -->
@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <div class="top-bar-royal mb-4">
        <div>
            <h1 class="page-title-royal mb-2">Book Details</h1>
            <div class="breadcrumb-royal">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <span class="separator">/</span>
                <a href="{{ route('books.index') }}">Books</a>
                <span class="separator">/</span>
                <span>Details</span>
            </div>
        </div>
        <a href="{{ route('books.index') }}" class="btn-purple">
            <i class="fas fa-arrow-left me-2"></i> Back to Books
        </a>
    </div>

    <div class="royal-card">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    @if($book->imgurl)
                        <img src="{{ $book->imgurl }}" 
                             alt="{{ $book->title }}" 
                             class="img-fluid rounded shadow-lg"
                             style="max-height: 300px;">
                    @else
                        <div class="bg-purple-100 rounded d-flex align-items-center justify-content-center" 
                             style="height: 300px;">
                            <i class="fas fa-book text-purple-600" style="font-size: 5rem;"></i>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h2 class="fw-bold mb-2">{{ $book->title }}</h2>
                        <div class="badge bg-purple-100 text-purple-700 px-3 py-1 rounded-pill">
                            {{ $book->type?->name ?? 'No Type' }}
                        </div>
                    </div>
                    <div class="text-end">
                        <h3 class="text-purple-700 fw-bold">${{ number_format($book->price, 2) }}</h3>
                        <small class="text-muted">Price</small>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="info-card mb-3">
                            <label class="text-muted small mb-1">Author</label>
                            <p class="fw-semibold mb-0">{{ $book->author ?? 'Not specified' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card mb-3">
                            <label class="text-muted small mb-1">Publisher</label>
                            <p class="fw-semibold mb-0">{{ $book->publisher ?? 'Not specified' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card mb-3">
                            <label class="text-muted small mb-1">Quantity in Stock</label>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold fs-5 me-2">{{ $book->quantity }}</span>
                                @if($book->quantity == 0)
                                    <span class="badge bg-danger">Out of Stock</span>
                                @elseif($book->quantity < 5)
                                    <span class="badge bg-warning">Low Stock</span>
                                @else
                                    <span class="badge bg-success">In Stock</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card mb-3">
                            <label class="text-muted small mb-1">Type Category</label>
                            <p class="fw-semibold mb-0">{{ $book->type?->category->name ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-top pt-4">
                    <div class="d-flex gap-2">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i> Edit Book
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this book?')">
                                <i class="fas fa-trash me-2"></i> Delete Book
                            </button>
                        </form>
                        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="fas fa-list me-2"></i> View All Books
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .info-card {
        background: var(--purple-50);
        padding: 15px;
        border-radius: 10px;
        border-left: 4px solid var(--purple-500);
    }
    
    .bg-purple-100 {
        background-color: var(--purple-100);
    }
    
    .text-purple-700 {
        color: var(--purple-700);
    }
</style>
@endsection