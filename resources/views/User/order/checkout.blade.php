@extends('layout.app')

@section('content')

<div class="purple-card mb-5">
    <h2 class="gradient-text mb-4">📦 Checkout</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cartItems->count() == 0)
        <div class="alert alert-warning">
            Your cart is empty. <a href="{{ route('user.book.index') }}" class="text-purple">Browse books</a>
        </div>
    @else
       <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4 border-purple">
                        <div class="card-header purple-light-bg">
                            <h5 class="mb-0">Shipping Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">Phone Number *</label>
                                <input type="text" 
                                       class="form-control @error('phonenumber') is-invalid @enderror" 
                                       id="phonenumber" 
                                       name="phonenumber" 
                                       value="{{ old('phonenumber') }}" 
                                       required
                                       placeholder="Enter your phone number">
                                @error('phonenumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="Location" class="form-label">Delivery Address *</label>
                                <textarea class="form-control @error('Location') is-invalid @enderror" 
                                          id="Location" 
                                          name="Location" 
                                          rows="3" 
                                          required
                                          placeholder="Enter your complete delivery address">{{ old('Location') }}</textarea>
                                @error('Location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="Note" class="form-label">Order Notes (Optional)</label>
                                <textarea class="form-control" 
                                          id="Note" 
                                          name="Note" 
                                          rows="2"
                                          placeholder="Special instructions for delivery">{{ old('Note') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-purple">
                        <div class="card-header purple-light-bg">
                            <h5 class="mb-0">Order Review</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="purple-light-bg">
                                            <th>Book</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->book->imgurl)
                                                        <img src="{{ asset($item->book->imgurl) }}" 
                                                             alt="{{ $item->book->title }}" 
                                                             class="img-thumbnail me-3" 
                                                             style="width: 60px; height: 80px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center me-3" 
                                                             style="width: 60px; height: 80px;">
                                                            <i class="bi bi-book text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0">{{ $item->book->title }}</h6>
                                                        <small class="text-muted">By {{ $item->book->author }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>${{ number_format($item->book->price, 2) }}</td>
                                            <td>${{ number_format($item->qty * $item->book->price, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card mb-4 border-purple">
                        <div class="card-body">
                            <h5 class="gradient-text mb-3">Order Summary</h5>
                            @php
                                $subtotal = $cartItems->sum(function($item) {
                                    return $item->qty * $item->book->price;
                                });
                                $total = $subtotal;
                            @endphp
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span>$0.00</span>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Total</strong>
                                <strong class="text-purple">${{ number_format($total, 2) }}</strong>
                            </div>
                            
                            <button type="submit" class="btn-purple btn-lg w-100 mb-3">
                                <i class="bi bi-bag-check me-2"></i>Place Order
                            </button>
                            
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-purple w-100">
                                <i class="bi bi-arrow-left me-2"></i>Back to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>

<style>
.border-purple {
    border-color: var(--purple-300) !important;
}

.btn-outline-purple {
    color: var(--purple-600);
    border-color: var(--purple-300);
}

.btn-outline-purple:hover {
    background-color: var(--purple-600);
    border-color: var(--purple-600);
    color: white;
}

.text-purple {
    color: var(--purple-600) !important;
}

.card-header.purple-light-bg {
    background: linear-gradient(135deg, var(--purple-100) 0%, var(--purple-50) 100%);
    color: var(--purple-800);
    border-bottom: 1px solid var(--purple-200);
}
</style>

@endsection