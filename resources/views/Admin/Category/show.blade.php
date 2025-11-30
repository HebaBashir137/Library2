@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Category Details</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back</a>

   <div class="card-body">
    <p><strong>ID:</strong> {{ $category->id }}</p>
    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Classification:</strong> {{ $category->classi->name ?? 'N/A' }}</p>
    <p><strong>Created At:</strong> {{ $category->created_at->format('Y-m-d') }}</p>
    <p><strong>Updated At:</strong> {{ $category->updated_at->format('Y-m-d') }}</p>
</div>

</div>
@endsection
