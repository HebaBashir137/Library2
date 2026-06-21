@extends('layout.app')

@section('title', 'Order Details')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Order Details</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Orders
        </a>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                  <h5>Order #{{ str_pad($myOrder->id, 6, '@', STR_PAD_LEFT) }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orederItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->book->cover_image)
                                                <img src="{{ asset('storage/' . $item->book->cover_image) }}" 
                                                     alt="{{ $item->book->title }}" 
                                                     class="img-thumbnail me-3" 
                                                     style="width: 60px; height: 80px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center me-3" 
                                                     style="width: 60px; height: 80px;">
                                                    <i class="fas fa-book text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-0">{{ $item->book->title }}</h6>
                                                <small class="text-muted">By {{ $item->book->author }}</small>
                                                <br>
                                                <small>ISBN: {{ $item->book->isbn }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->book->price, 2) }}</td>
                                    <td>${{ number_format($item->quantity * $item->book->price, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Order Summary</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Order Status:</strong>
                        </div>
                        <div class="col-6 text-end">
                            @php
                                $statusColors = [
                                    'pending' => 'warning',
                                    'processing' => 'info',
                                    'shipped' => 'primary',
                                    'delivered' => 'success',
                                    'cancelled' => 'danger'
                                ];
                                $color = $statusColors[$order->status] ?? 'secondary';
                            @endphp
                            <span class="badge bg-{{ $color }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Order Date:</strong>
                        </div>
                        <div class="col-6 text-end">
                            {{ $order->created_at->format('F d, Y') }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Items:</strong>
                        </div>
                        <div class="col-6 text-end">
                            {{ $order->orederItems->count() }}
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row mb-2">
                        <div class="col-6">
                            Subtotal:
                        </div>
                        <div class="col-6 text-end">
                            ${{ number_format($order->totalprice, 2) }}
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <div class="col-6">
                            Shipping:
                        </div>
                        <div class="col-6 text-end">
                            $0.00
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-6">
                            <strong>Total:</strong>
                        </div>
                        <div class="col-6 text-end">
                            <strong>${{ number_format($order->totalprice, 2) }}</strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Shipping Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Phone:</strong><br>
                        {{ $order->phonenumber }}
                    </div>
                    
                    <div class="mb-3">
                        <strong>Address:</strong><br>
                        {{ $order->Location }}
                    </div>
                    
                    @if($order->Note)
                    <div>
                        <strong>Order Notes:</strong><br>
                        {{ $order->Note }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection