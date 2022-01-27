@extends('layouts.login')

@section('header')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="text-center">
  <h3 class="login-title">{{ __('Restricted Area') }}</h3>
  <p>{{ __('Please enter your account information to authenticate for processing data.') }}</p>
</div>

<form method="POST" action="{{ route('login') }}">
  @csrf

  <div class="form-group mb-3">
    <label for="email" class="col-form-label text-md-right">{{ __('Your Email') }}</label>
    <input id="email" type="email" placeholder="{{ __('Enter your email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group form-password">
    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
    <input id="password" type="password" placeholder="{{ __('Enter your password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <button class="btn btn-link" type="button"><i id="icon" class="fa-solid fa-eye"></i></button>

    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="d-flex justify-content-between my-3">

    <div class="form-group">
      <div class="custom-control form-check custom-checkbox">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} value="true" />
        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
      </div>
    </div>

    <div class="text-end text-xl-start">
      <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
    </div>

  </div>

  <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-block btn-primary fw-bold px-4 py-2">{{ __('Log Me In') }}</button>
  </div>

  @if(Route::has('register'))
  <div class="text-center mt-3">
    <a href="{{ route('register') }}">{{ __('Register') }}</a>
  </div>
  @endif
</form>
@endsection

@section('footer')
<script src="{{ asset('js/login.js') }}"></script>
@endsection
