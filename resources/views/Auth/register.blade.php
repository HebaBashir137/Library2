@extends('layout.app')

@section('content')
<div class="purple-card mx-auto" style="max-width: 600px;">
    <h2 class="text-center gradient-text mb-4">Create Your Account</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.checkregister') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Full Name</label>
            <input type="text" name="name" class="form-control purple-light-bg" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Email Address</label>
            <input type="email" name="email" class="form-control purple-light-bg" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control purple-light-bg" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control purple-light-bg" required>
        </div>

        <button class="btn-purple w-100 mt-3">Register</button>

        <div class="text-center mt-3">
            <a href="{{ route('user.login') }}" class="purple-accent">Already have an account? Login</a>
        </div>
    </form>
</div>
@endsection
