@extends('layout.app')

@section('title', 'My Orders')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">My Orders</h1>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if($orders->isEmpty())
        <div class="text-center py-5">
            <h3>No orders yet</h3>
            <p class="text-muted">Start shopping to place your first order!</p>
            <a href="{{ route('user.book.index') }}" class="btn btn-primary">Browse Books</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>{{ $order->orederItems->count() }} item(s)</td>
                        <td>${{ number_format($order->totalprice, 2) }}</td>
                        <td>
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
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                View Details
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
         {{-- Remove or comment out the links() call --}}
            {{-- {{ $orders->links() }} --}}

            {{-- Optional: Show simple message for large results --}}
            @if($orders->count() > 10)
                <div class="text-center mt-4">
                    <small class="text-muted">Showing all {{ $orders->count() }} orders</small>
                </div>
            @endif
        </div>
    @endif
</div>
@endsection