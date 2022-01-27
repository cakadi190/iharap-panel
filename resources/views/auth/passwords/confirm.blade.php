@extends('layouts.login')

@section('header')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="text-center">
  <h3 class="login-title">{{ __('Confirm Password') }}</h3>
  <p>{{ __('Please confirm your password before continuing.') }}</p>
</div>

<form method="POST" action="{{ route('password.confirm') }}">
  @csrf

  <div class="form-group">
    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="d-grid gap-2 col-6 mx-auto">
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
      {{ __('Forgot Your Password?') }}
    </a>
    @endif
  </div>
</form>
@endsection
