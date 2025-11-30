@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Add New Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back</a>

   <form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Classification</label>
        <select name="classi_id" class="form-control" required>
            <option value="">Select Classification</option>
            @foreach($classifications as $classification)
                <option value="{{ $classification->id }}">{{ $classification->name }}</option>
            @endforeach
        </select>
    </div>
    
    <button class="btn btn-success">Save</button>
</form>

@endsection