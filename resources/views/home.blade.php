<!-- home.blade.php -->
@extends('layout.app')

@section('content')
<div class="py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="display-4 fw-bold mb-4">
                Welcome to <span class="gradient-text"></span> Library</span>
            </h1>
            <p class="lead text-muted mb-5">
                Discover thousands of books and manage your reading journey with our elegant library management system.
            </p>
            <div class="d-flex flex-wrap gap-3 mb-5">
                <a href="{{ route('user.book.index') }}" class="btn-purple btn-lg">Browse Books</a>
                
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card-purple p-4 text-center">
                        <div class="mb-3">
                            <div class="bg-purple-100 text-purple-600 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-book fs-4"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1">5,000+</h3>
                        <p class="text-muted mb-0">Books</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-purple p-4 text-center">
                        <div class="mb-3">
                            <div class="bg-purple-100 text-purple-600 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-people fs-4"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1">500+</h3>
                        <p class="text-muted mb-0">Readers</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-purple p-4 text-center">
                        <div class="mb-3">
                            <div class="bg-purple-100 text-purple-600 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-collection fs-4"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1">50+</h3>
                        <p class="text-muted mb-0">Categories</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card-purple p-4">
                <img src="{{ asset('storage/purplepic.jpg') }}" 
                     alt="Modern Library" 
                     class="img-fluid rounded-3">
            </div>
        </div>
    </div>
</div>

<style>
    .btn-outline-purple {
        border: 2px solid var(--purple-600);
        color: var(--purple-600);
        background: transparent;
        font-weight: 600;
    }
    
    .btn-outline-purple:hover {
        background: var(--purple-600);
        color: white;
    }
    
    .bg-purple-100 {
        border: 2px solid var(--purple-600);
        color: var(--purple-600);
        background: transparent;
        font-weight: 600;
    }
    
    .text-purple-600 {
        color: var(--purple-600);
    }
</style>
@endsection