@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Types</h2>
        <a href="{{ route('types.create') }}" class="btn btn-primary">Add New Type</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Edition</th>
                <th width="230px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $index => $type)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->category->name ?? 'N/A' }}</td>
                <td>{{ $type->edition }}</td>

                <td>
                    <a href="{{ route('types.show', $type->id) }}" class="btn btn-info btn-sm">Details</a>
                    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('types.destroy', $type->id) }}" 
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
