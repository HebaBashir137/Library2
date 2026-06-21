@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <div class="top-bar-royal mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title-royal mb-2">Classifications</h1>
            <div class="breadcrumb-royal">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <span class="separator">/</span>
                <span>Classifications</span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <form action="{{ route('classifications.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Search classifications..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn-purple">Search</button>
            </form>
            <a href="{{ route('classifications.create') }}" class="btn-purple">
                <i class="fas fa-plus me-2"></i> Add Classification
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="royal-card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classifications as $classification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $classification->name }}</td>
                            <td>{{ $classification->description ?? '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('classifications.show', $classification->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('classifications.edit', $classification->id) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('classifications.destroy', $classification->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this classification?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($classifications->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">No classifications found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
