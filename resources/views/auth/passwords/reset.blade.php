@extends('layouts.login')

@section('header')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="text-center">
  <h3 class="login-title">{{ __('Reset Email') }}</h3>
  <p>{{ __('Please enter your email and also your password 2 times to reset your password') }}</p>
</div>

<form method="POST" action="{{ route('password.update') }}">
  @csrf

  <input type="hidden" name="token" value="{{ $token }}">

  <div class="form-group mb-3">
    <label for="email">{{ __('E-Mail Address') }}</label>
    <input id="email" placeholder="Enter your email here" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="password">{{ __('Password') }}</label>
    <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group mb-4">
    <label for="password-confirm">{{ __('Confirm Password') }}</label>
    <input placeholder="Confirmation password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
  </div>

  <div class="d-grid gap-3 gap-lg-4 col-md-8 mx-auto">
    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
  </div>
</form>
@endsection
