@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Edit Classification</h2>
    <a href="{{ route('classifications.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('classifications.update', $classification->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Classification Name</label>
            <input type="text" name="name" value="{{ $classification->name }}" class="form-control" required>

            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
