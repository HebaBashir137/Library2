@extends('layout.app')

@section('content')

<div class="purple-card mb-5">
    <h2 class="gradient-text mb-4">🛒 Your Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cartItems->count() == 0)
        <p class="text-center fs-5 text-muted">Your cart is empty.</p>
    @else

    <div class="table-responsive">
        @if($cartItems->count() > 0)
        <table class="table align-middle">
            <thead class="purple-light-bg">
                <tr class="text-center">
                    <th>Book</th>
                    <th>Title</th>
                    <th>Qty</th>
                    <th>Available</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cartItems as $item)
                <tr class="text-center">
                    
                    <!-- Book Image -->
                    <td>
                        <img src="{{ $item->book->imgurl ?? '/default-book.png' }}" 
                             alt="Book" 
                             width="65" 
                             class="rounded shadow-sm">
                    </td>

                    <!-- Book Title -->
                    <td class="fw-semibold">
                        {{ $item->book->title }}
                    </td>

                    <!-- Quantity -->
                    <td class="fw-bold">{{ $item->qty }}</td>

                    <!-- Available Stock -->
                 <td>{{ $item->book->quantity - $item->qty }}</td>
                    <!-- Actions -->
                    <td>

                        <!-- Increase Qty -->
                        <form action="{{ route('cart.increase') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $item->book_id }}">
                            <button class="btn btn-sm btn-purple">+</button>
                        </form>

                        <!-- Decrease Qty -->
                        <form action="{{ route('cart.decrease') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $item->book_id }}">
                            <button class="btn btn-sm btn-outline-danger px-3">−</button>
                        </form>

                        <!-- Remove Item -->
                        <form action=" {{ route('cart.destroy', $item->book_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="book_id" value="{{ $item->book_id }}">
                            <button class="btn btn-sm btn-outline-dark px-3">
                                <i class="bi bi-trash"></i>
                                remove
                            </button>
                        </form>

                    </td>
                    

                </tr>
                @endforeach
            </tbody>
        </table>


          <div class="text-end mt-4">
    <h4>Total: ${{ number_format($cartItems->sum('total'), 4) }}</h4>
    <div>   

    </div>
    <hr>

    <a href="{{ route('checkout') }}" class="btn-purple btn-lg">Proceed to Checkout</a>

    
    <div class="text-end mt-4">
    @php
        $total = $cartItems->sum(function($item) {
            return $item->qty * ($item->book->price ?? 0);
        });
    @endphp
    <h4>Total: ${{ number_format($total, 2) }}</h4>
    <a href="{{ route('checkout') }}" class="btn-purple btn-lg">Proceed to Checkout</a>
</div>
    @endif
        </div>

        @endif
    </div>
</div>

@endsection
