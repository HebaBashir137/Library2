@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Classification Details</h2>

    <a href="{{ route('admin.classifications.index') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card">
        <div class="card-header bg-dark text-white">
            Classification Information
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $classification->id }}</p>
            <p><strong>Name:</strong> {{ $classification->name }}</p>
            <p><strong>Created At:</strong> {{ $classification->created_at->format('Y-m-d') }}</p>
            <p><strong>Updated At:</strong> {{ $classification->updated_at->format('Y-m-d') }}</p>
        </div>
    </div>

</div>
@endsection
