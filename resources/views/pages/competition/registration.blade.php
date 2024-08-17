@extends('layouts.auth')

@section('content')
<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
  <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
    <div class="d-flex align-items-center py-2">
      <div class="me-2">
        <a href="{{ route('logout') }}" class="btn bg-light btn-sm">
          <i class="ki-outline ki-entrance-right fs-1 text-gray-800"></i>
          <span>Sign Out</span>
        </a>
      </div>
    </div>
    <div class="py-20">
      <div class="stepper stepper-pills" id="kt_stepper_example_basic">
        <div class="stepper-nav flex-center flex-wrap mb-10">
            <div class="stepper-item mx-md-7 mx-2 my-4 current" data-kt-stepper-element="nav">
                <div class="stepper-wrapper d-flex align-items-center">
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">1</span>
                    </div>
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            Team
                        </h3>
        
                        <div class="stepper-desc fs-md-7 fs-9">
                            Create your team
                        </div>
                    </div>
                </div>
                <div class="stepper-line h-40px"></div>
            </div>
            <div class="stepper-item mx-md-7 mx-2 my-4" data-kt-stepper-element="nav">
                <div class="stepper-wrapper d-flex align-items-center">
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">2</span>
                    </div>
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            Leader
                        </h3>
        
                        <div class="stepper-desc fs-md-7 fs-9">
                          Leader's information
                        </div>
                    </div>
                </div>
                <div class="stepper-line h-40px"></div>
            </div>
        </div>
            <form class="form w-lg-500px mx-auto" method="post" action="{{ route('competition.registration.submit') }}" enctype="multipart/form-data" id="form">
              @csrf
                <div class="mb-5">
                    <div class="flex-column current" data-kt-stepper-element="content">
                        <div class="fv-row mb-10">
                            <label class="form-label">Logo <sub>(optional)</sub></label>
                            <div>
                              <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/svg/avatars/blank.svg') }})"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Logo">
                                    <i class="ki-outline ki-pencil fs-7"></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove logo">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                              </div>
                              @error('avatar')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @else
                              <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                              @enderror
                            </div>
                          </div>
                        <div class="fv-row mb-10">
                            <label class="form-label required">Team Name</label>
                            <input type="text" class="form-control form-control-solid @error('team') is-invalid @enderror" name="team" placeholder="Team Name"  value="{{ old('team') }}"/>
                            @error('team')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                    </div>
                    <div class="flex-column" data-kt-stepper-element="content">
                        <div class="fv-row mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}"/>
                            @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="fv-row mb-3">
                          <label class="form-label required">Phone Number</label>
                          <input type="text" class="form-control form-control-solid @error('phone') is-invalid @enderror" name="phone" placeholder="" value="{{ old('phone') ?? '+62'}}"/>
                          @error('phone')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                        <div class="fv-row mb-3">
                          <label class="form-label required">University</label>
                          <input type="text" class="form-control form-control-solid  @error('university') is-invalid @enderror" name="university" placeholder="Your University" value="{{ old('university') }}"/>
                          @error('university')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                        <div class="fv-row mb-3">
                          <label class="form-label required">Major</label>
                          <input type="text" class="form-control form-control-solid @error('major') is-invalid @enderror" name="major" placeholder="Your Major" value="{{ old('major') }}"/>
                          @error('major')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                    </div>
                </div>        
                <div class="d-flex flex-stack">
                    <div class="me-2">
                        <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                            Back
                        </button>
                    </div>
                    <div>
                        <button id="submit" class="btn btn-primary me-2 flex-shrink-0" id data-kt-stepper-action="submit">
                          <span class="indicator-label" data-kt-translate="sign-in-submit">Submit</span>
                          <span class="indicator-progress">
                            <span data-kt-translate="general-progress">Please wait...</span>
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                            Continue
                        </button>
                    </div>
                </div>
            </form>
      </div>
    </div>
    <div class="m-0">
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  // Stepper lement
  var element = document.querySelector("#kt_stepper_example_basic");

  // Initialize Stepper
  var stepper = new KTStepper(element);

  // Handle next step
  stepper.on("kt.stepper.next", function (stepper) {
      stepper.goNext(); // go next step
  });

  // Handle previous step
  stepper.on("kt.stepper.previous", function (stepper) {
      stepper.goPrevious(); // go previous step
  });
</script>
<script>
  document.getElementById('form').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection