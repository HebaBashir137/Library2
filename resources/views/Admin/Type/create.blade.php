@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Add New Type</h2>
    <a href="{{ route('types.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('types.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Type Name</label>
            <input type="text" name="name" class="form-control" required>

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Select Category</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach

            </select>

            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Edition</label>
            <input type="text" name="edition" class="form-control" required>

            @error('edition')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
    </form>

</div>
@endsection
