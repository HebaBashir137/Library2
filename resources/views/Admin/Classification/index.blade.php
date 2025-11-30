@extends('layout.dashboard')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Classifications</h2>
        <a href="{{ route('classifications.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th width="250px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classifications as $index => $class)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $class->name }}</td>
                <td>
                    <a href="{{ route('classifications.show', $class->id) }}" class="btn btn-info btn-sm">Details</a>
                    <a href="{{ route('classifications.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('classifications.destroy', $class->id) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
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
