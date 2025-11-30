@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Add New Classification</h2>
    <a href="{{ route('classifications.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('classifications.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Classification Name</label>
            <input type="text" name="name" class="form-control" required>

            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
    </form>

</div>

@endsection


