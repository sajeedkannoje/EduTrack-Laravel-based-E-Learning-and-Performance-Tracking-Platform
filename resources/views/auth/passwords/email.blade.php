@extends('layouts/fullLayoutMaster')

@section('title', 'Forgot Password')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
<style>
  html .content.app-content{
    margin-left:0 !important;
  }
  .card{
    padding:0 !important;
    margin:0 !important;
  }
  .reset-btn, .back-to-login-btn {
    font-size:20px;
  }
  .back-to-login-btn a {
    transition: 0.3s ease;
  }
  .back-to-login-btn a:hover {
    color:black !important;
  }
</style>
@endsection

@section('content')
<div class="auth-wrapper auth-basic px-2">
  <div class="auth-inner my-2">
    <!-- Forgot Password basic -->
    <div class="card mb-0">
      <div class="card-body">

        <a href="javascript:void(0);" class="brand-logo">
          <img src="{{ asset('images/logo/logo.png') }}" alt="website logo">
          {{-- <h2 class="brand-text text-primary ms-1">Vuexy</h2> --}}
        </a>

        <h4 class="card-title mb-1">Forgot Password? </h4>
        <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
        @if (session('status'))
        <div class=" alert alert-success" role="alert">
          {{session('status')}}
        </div>
        @endif
        <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="mb-1">
            <label for="forgot-password-email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="forgot-password-email" name="email" value="{{ old('email') }}" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autofocus />
             @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary w-100 reset-btn" tabindex="2">Send reset link</button>
        </form>

        <p class="text-center mt-2 back-to-login-btn">
          @if (Route::has('login'))
          <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
          @endif
        </p>
      </div>
    </div>
    <!-- /Forgot Password basic -->
  </div>
</div>
@endsection
