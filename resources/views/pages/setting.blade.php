@extends('layouts.app')

@section('content')
<div class="row gx-5 g-xl-10 g-xl-10">
  <div class="col-xl-12 mb-8">
    <div class="card card-flush">
      <div class="card-body pt-0">
        <form id="submit" method="POST" action="{{ route('setting.update') }}" enctype="multipart/form-data" class="form">
          @csrf
          <div class="card-body border-top p-9">
              <!-- Logo -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label fw-semibold fs-6">Logo</label>
                  <div class="col-lg-8">
                      <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                          <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $setting->logo ? Storage::url($setting->logo) : 'assets/media/svg/avatars/blank.svg' }})"></div>
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
  
              <!-- Competition Name -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Competition Name</label>
                  <div class="col-lg-8">
                      <input type="text" name="competition_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('competition_name') is-invalid @enderror" placeholder="Competition Name" value="{{ old('competition_name', $setting->competition_name) }}"/>
                      @error('competition_name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
  
              <!-- Description -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
                  <div class="col-lg-8 fv-row">
                      <textarea name="description" class="form-control form-control-lg form-control-solid @error('description') is-invalid @enderror" placeholder="Description" rows="3">{{ old('description', $setting->description) }}</textarea>
                      @error('description')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>

              <!-- Registration Period -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Registration Period</label>
                  <div class="col-lg-8">
                      <div class="row">
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="registration_start" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('registration_start') is-invalid @enderror" value="{{ old('registration_start', $setting->registration_start) }}" />
                              @error('registration_start')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="registration_end" class="form-control form-control-lg form-control-solid @error('registration_end') is-invalid @enderror" value="{{ old('registration_end', $setting->registration_end) }}" />
                              @error('registration_end')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
  
              <!-- Submission Period -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Submission Period</label>
                  <div class="col-lg-8">
                      <div class="row">
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="submission_start" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('submission_start') is-invalid @enderror" value="{{ old('submission_start', $setting->submission_start) }}" />
                              @error('submission_start')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="submission_end" class="form-control form-control-lg form-control-solid @error('submission_end') is-invalid @enderror" value="{{ old('submission_end', $setting->submission_end) }}" />
                              @error('submission_end')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
  
              <!-- Qualification Assessment Period -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Qualification Assessment Period</label>
                  <div class="col-lg-8">
                      <div class="row">
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="qualification_start" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('qualification_start') is-invalid @enderror" value="{{ old('qualification_start', $setting->qualification_start) }}" />
                              @error('qualification_start')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="qualification_end" class="form-control form-control-lg form-control-solid @error('qualification_end') is-invalid @enderror" value="{{ old('qualification_end', $setting->qualification_end) }}" />
                              @error('qualification_end')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
  
              <!-- Qualification Announcement -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Qualification Announcement</label>
                  <div class="col-lg-8">
                      <input type="datetime-local" name="qualification_announcement" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('qualification_announcement') is-invalid @enderror" value="{{ old('qualification_announcement', $setting->qualification_announcement) }}" />
                      @error('qualification_announcement')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
  
              <!-- Final Assessment Period -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Final Assessment Period</label>
                  <div class="col-lg-8">
                      <div class="row">
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="final_start" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('final_start') is-invalid @enderror" value="{{ old('final_start', $setting->final_start) }}" />
                              @error('final_start')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                          <div class="col-lg-6 fv-row">
                              <input type="datetime-local" name="final_end" class="form-control form-control-lg form-control-solid @error('final_end') is-invalid @enderror" value="{{ old('final_end', $setting->final_end) }}" />
                              @error('final_end')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
  
              <!-- Final Announcement -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Final Announcement</label>
                  <div class="col-lg-8">
                      <input type="datetime-local" name="final_announcement" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('final_announcement') is-invalid @enderror" value="{{ old('final_announcement', $setting->final_announcement) }}" />
                      @error('final_announcement')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
  
              <!-- Submission Type -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label required fw-semibold fs-6">Submission Type</label>
                  <div class="col-lg-8 fv-row">
                      <div class="d-flex align-items-center mt-3">
                          <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                              <input class="form-check-input" name="submission_type" type="radio" value="text" {{ old('submission_type', $setting->submission_type) == 'text' ? 'checked' : '' }}/>
                              <span class="fw-semibold ps-2 fs-6">Text</span>
                          </label>
                          <label class="form-check form-check-custom form-check-inline form-check-solid">
                              <input class="form-check-input" name="submission_type" type="radio" value="file" {{ old('submission_type', $setting->submission_type) == 'file' ? 'checked' : '' }}/>
                              <span class="fw-semibold ps-2 fs-6">File</span>
                          </label>
                      </div>
                      @error('submission_type')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
  
              <!-- Submission Note -->
              <div class="row mb-6">
                  <label class="col-lg-4 col-form-label fw-semibold fs-6">Submission Note</label>
                  <div class="col-lg-8 fv-row">
                      <textarea name="submission_note" class="form-control form-control-lg form-control-solid @error('submission_note') is-invalid @enderror" placeholder="Note" rows="3">{{ old('submission_note', $setting->submission_note) }}</textarea>
                      @error('submission_note')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
          </div>
  
          <div class="card-footer d-flex justify-content-end py-6 px-9">
              <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
              <button id="submit" class="btn btn-primary me-2 flex-shrink-0">
                  <span class="indicator-label">Save</span>
                  <span class="indicator-progress">
                      <span>Please wait...</span>
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                  </span>
              </button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.getElementById('submit').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection
