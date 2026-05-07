@extends('layouts.auth')

@section('content')
<h4 class="text-gray-800 mb-4">{{ __('Create Account') }}</h4>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="name" class="form-label">{{ __('Full Name') }}</label>
        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="{{ __('Full Name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="{{ __('Enter Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control form-control-user" placeholder="{{ __('Repeat Password') }}" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('Register Account') }}
    </button>

    <hr>
</form>

<div class="text-center">
    <p class="small">
        {{ __('Already have an account?') }}
        <a href="{{ route('login') }}">{{ __('Login!') }}</a>
    </p>
</div>
@endsection
