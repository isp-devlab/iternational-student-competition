@extends('layouts.auth')

@section('content')
<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
  <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
    <div class="d-flex flex-stack py-2">
      <div class="me-2">
        <a href="{{ route('index') }}" class="btn btn-icon bg-light rounded-circle">
          <i class="ki-outline ki-black-left fs-1 text-gray-800"></i>
        </a>
      </div>
    </div>
    <div class="py-20">
      <form class="form w-100" action="{{ route('login') }}" method="POST" id="loginForm">
        @csrf
        <div class="card-body">
          <div class="text-start mb-10">
            <h1 class="text-gray-900 mb-3 fs-3x">Sign In</h1>
            <div class="text-gray-500 fw-semibold fs-6">Enter your credentials to access your account.</div>
          </div>
          <div class="fv-row mb-8">
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{ old('email') }}" />
            @error('email')
            <div class="text-sm text-danger">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="fv-row mb-3">
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control form-control-solid @error('password') is-invalid @enderror" />
            @error('password')
            <div class="text-sm text-danger">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
            <div></div>
            <a href="{{ route('forgot') }}" class="link-primary">Forgot Password ?</a>
          </div>
          <div class="d-flex flex-stack">
            <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0">
              <span class="indicator-label" data-kt-translate="sign-in-submit">Sign In</span>
              <span class="indicator-progress">
                <span data-kt-translate="general-progress">Please wait...</span>
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="m-0 text-center">
      <span class="text-gray-500 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Already a member ?</span>
      <a href="authentication/layouts/fancy/sign-in.html" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign In</a>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.getElementById('loginForm').addEventListener('submit', function() {
    var submitButton = document.getElementById('kt_sign_in_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection