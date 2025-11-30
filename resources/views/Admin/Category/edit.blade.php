@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Edit Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Classification</label>
            <select name="classi_id" class="form-control" required>
                <option value="">Select Classification</option>
                @foreach($classifications as $classification)
                    <option value="{{ $classification->id }}" 
                        {{ $category->classi_id == $classification->id ? 'selected' : '' }}>
                        {{ $classification->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection