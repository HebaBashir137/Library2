@extends('layout.app')

@section('content')
<div class="purple-card mx-auto" style="max-width: 500px;">
    <h2 class="text-center gradient-text mb-4">User Login</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('user.checklogin') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control purple-light-bg" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control purple-light-bg" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn-purple w-100 mt-3" >Login</button>

        <div class="text-center mt-3">
            <a href="{{ route('user.register') }}" class="purple-accent">Create an account</a>
        </div>
    </form>
</div>
@endsection
