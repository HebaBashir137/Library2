@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <h2>Edit Type</h2>
    <a href="{{ route('types.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Type Name</label>
            <input type="text" name="name" value="{{ $type->name }}" class="form-control" required>

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Category</label>

            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        @selected($cat->id == $type->category_id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Edition</label>
            <input type="text" name="edition" 
                   value="{{ $type->edition }}" class="form-control" required>

            @error('edition')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
