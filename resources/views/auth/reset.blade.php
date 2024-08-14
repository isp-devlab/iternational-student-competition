@extends('layouts.auth')

@section('content')
<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
  <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
    <div class="d-flex flex-stack py-2">
      <div class="me-2">
        <a href="{{ route('login') }}" class="btn btn-icon bg-light rounded-circle">
          <i class="ki-outline ki-black-left fs-1 text-gray-800"></i>
        </a>
      </div>
    </div>
    <div class="py-20">
      <form class="form w-100" action="{{ route('reset.submit', $token) }}" method="POST" id="authForm">
        @csrf
        <div class="card-body">
          <div class="text-start mb-10">
            <h1 class="text-gray-900 mb-3 fs-3x">Reset Password</h1>
            <div class="text-gray-500 fw-semibold fs-6">Setup your new password</div>
          </div>
          <div class="fv-row mb-8">
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control form-control-solid" value="{{ $user->email }}" readonly/>
          </div>
          <div class="fv-row mb-10" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
              <!--begin::Input wrapper-->
              <div class="position-relative mb-3">
                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="New Password" name="password" autocomplete="off" data-kt-translate="sign-up-input-password" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                  <i class="ki-outline ki-eye-slash fs-2"></i>
                  <i class="ki-outline ki-eye fs-2 d-none"></i>
                </span>
              </div>
              <!--end::Input wrapper-->
              <!--begin::Meter-->
              <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
              </div>
              <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            @error('password')
            <div class="text-sm text-danger">
              {{ $message }}
            </div>
            @else
            <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
            @enderror
            <!--end::Hint-->
          </div>
          <!--end::Input group=-->
          <!--begin::Input group-->
          <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Repeat Password" name="confirm-password" autocomplete="off" data-kt-translate="sign-up-input-confirm-password" />
            <div id="confirm-password-error" class="text-sm text-danger mt-2" style="display:none;">
              The password and its confirm are not the same
            </div>
          </div>
          <div class="d-flex flex-stack">
            <button id="kt_auth_submit" class="btn btn-primary me-2 flex-shrink-0">
              <span class="indicator-label" data-kt-translate="sign-in-submit">Change Password</span>
              <span class="indicator-progress">
                <span data-kt-translate="general-progress">Please wait...</span>
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="m-0">
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.getElementById('authForm').addEventListener('submit', function(event) {
    var password = document.querySelector('input[name="password"]').value;
    var confirmPassword = document.querySelector('input[name="confirm-password"]').value;
    var errorDiv = document.getElementById('confirm-password-error');

    if (password !== confirmPassword) {
        event.preventDefault();
        errorDiv.style.display = 'block';
        return;
    } else {
        errorDiv.style.display = 'none';
    }

    var submitButton = document.getElementById('kt_auth_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection
