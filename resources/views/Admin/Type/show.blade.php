@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Type Details</h2>
    <a href="{{ route('types.index') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card">
        <div class="card-header bg-dark text-white">
            Type Information
        </div>

        <div class="card-body">
            <p><strong>ID:</strong> {{ $type->id }}</p>
            <p><strong>Name:</strong> {{ $type->name }}</p>
            <p><strong>Category:</strong> {{ $type->category->name ?? 'N/A' }}</p>
            <p><strong>Edition:</strong> {{ $type->edition }}</p>
            <p><strong>Created At:</strong> {{ $type->created_at->format('Y-m-d') }}</p>
            <p><strong>Updated At:</strong> {{ $type->updated_at->format('Y-m-d') }}</p>
        </div>
    </div>

</div>
@endsection
