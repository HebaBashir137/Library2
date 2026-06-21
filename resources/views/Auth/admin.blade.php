<!-- auth/admin.blade.php -->
@extends('layout.app')

@section('content')
<div class="py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-purple p-4">
                <div class="text-center mb-4">
                    <div class="bg-purple-600 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-lock text-white fs-3"></i>
                    </div>
                    <h2 class="fw-bold">Admin Login</h2>
                    <p class="text-muted">Enter your credentials to access the dashboard</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('admin.checklogin') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-purple-100 border-purple-200">
                                <i class="bi bi-envelope text-purple-600"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-purple-200" 
                                   placeholder="admin@example.com" required>
                        </div>
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-purple-100 border-purple-200">
                                <i class="bi bi-lock text-purple-600"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-purple-200" 
                                   placeholder="Enter password" required>
                        </div>
                        @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <button type="submit" class="btn-purple w-100 py-2">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .border-purple-200 {
        border-color: var(--purple-200) !important;
    }
    
    .form-control:focus {
        border-color: var(--purple-500);
        box-shadow: 0 0 0 0.2rem rgba(168, 85, 247, 0.25);
    }
</style>
@endsection