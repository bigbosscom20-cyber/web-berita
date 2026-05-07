@extends('layouts.auth')

@section('content')
<h4 class="text-gray-800 mb-4">{{ __('Login') }}</h4>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login Gagal!</strong>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="{{ __('Enter Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Login') }}
    </button>

    <hr>
</form>

<div class="text-center">
    @if (Route::has('password.request'))
        <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
    @endif
</div>

<div class="text-center">
    @if (Route::has('register'))
        <p class="small">
            {{ __('Don\'t have an account?') }}
            <a href="{{ route('register') }}">{{ __('Register!') }}</a>
        </p>
    @endif
</div>

<div class="alert alert-info mt-3" style="font-size: 12px;">
    <strong>Demo Credentials:</strong><br>
    Email: <code>test@example.com</code><br>
    Password: <code>password</code>
</div>
@endsection
