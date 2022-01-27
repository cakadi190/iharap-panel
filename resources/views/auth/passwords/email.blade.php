@extends('layouts.login')

@section('header')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="text-center mb-4">
  <h3 class="login-title">{{ __('Reset password') }}</h3>
  <p>{{ __('Please confirm your email before reset your password.') }}</p>
</div>

@if (session('status'))
<div class="alert alert-success alert-solid" role="alert">
  {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
  @csrf

  <div class="mb-3">
    <label for="email">{{ __('E-Mail Address') }}</label>
    <input id="email" placeholder="Enter your E-Mail address here." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="d-grid gap-3 gap-lg-4 col-md-8 mx-auto">
    <button type="submit" class="btn btn-primary">{{ __('Recovery My Account') }}</button>
    <a href="{{ route('login') }}" class="btn btn-link">Back to Login</a>
  </div>
</form>
@endsection
