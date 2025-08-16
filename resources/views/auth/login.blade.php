@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 fw-bold text-primary">Welcome Back 👋</h3>
                <p class="text-center text-muted mb-4">Login to your account to continue</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="form-floating mb-3">
                        <input id="email" type="email"
                            class="form-control rounded-3 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="name@example.com">
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-floating mb-3">
                        <input id="password" type="password"
                            class="form-control rounded-3 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password"
                            placeholder="********">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox"
                            name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg rounded-3">
                            Login
                        </button>
                    </div>

                    {{-- Forgot Password --}}
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="text-decoration-none fw-semibold" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
