@extends('layouts.app')

@section('content')
<div class="row gx-5 g-xl-10 g-xl-10">
  <div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-9 pb-0">
      <div class="d-flex flex-wrap flex-sm-nowrap">
        <div class="me-7 mb-4">
          <div class="symbol symbol-lg-60px symbol-fixed position-relative">
            <img src="@if(Auth::user()->team->logo) {{ Storage::url( Auth::user()->team->logo ) }} @else https://ui-avatars.com/api/?bold=true&name={{  Auth::user()->team->name }} @endif" alt="image" />
          </div>
        </div>
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
            <div class="d-flex flex-column">
              <div class="d-flex align-items-center mb-2">
                <span class="text-gray-900  fs-2 fw-bold me-1">{{ Auth::user()->team->name }}</span>
              </div>
              <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                <i class="ki-outline ki-phone fs-4 me-1"></i>{{ Auth::user()->phone_number }}</a>
                <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                <i class="ki-outline ki-sms fs-4 me-1"></i>{{ Auth::user()->email }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
        <li class="nav-item mt-2">
          <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="pages/user-profile/overview.html">Member</a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-active-primary ms-0 me-10 py-5" href="pages/user-profile/projects.html">Submission</a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-active-primary ms-0 me-10 py-5" href="pages/user-profile/campaigns.html">Qualification Score</a>
        </li>
        <li class="nav-item mt-2">
          <a class="nav-link text-active-primary ms-0 me-10 py-5" href="pages/user-profile/documents.html">Final Score</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="row gx-5 g-xl-10 g-xl-10">
  <div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-9 pb-0">
      <div class="d-flex justify-content-end">
        <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary d-flex align-items-center">
          <i class="ki-duotone ki-plus fs-2"></i>
          Add
        </button>
        <div class="modal fade" tabindex="-1" id="add">
          <div class="modal-dialog modal-dialog-centered">
              <form method="POST" action="{{ route('competition.member.store') }}" class="modal-content" id="add">
                @csrf
                  <div class="modal-header">
                      <h3 class="modal-title">Add New Member</h3>
                      <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                      </div>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="required form-label">Name</label>
                      <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Full Name" required/>
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="required form-label">University</label>
                      <input type="text" name="university" class="form-control form-control-solid @error('university') is-invalid @enderror"  value="{{ old('university') }}" placeholder="University" required/>
                      @error('university')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="required form-label">Major</label>
                      <input type="text" name="major" class="form-control form-control-solid @error('major') is-invalid @enderror"  value="{{ old('major') }}" placeholder="Major" required/>
                      @error('major')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                      <button id="add_submit" class="btn btn-primary me-2 flex-shrink-0">
                        <span class="indicator-label" data-kt-translate="sign-in-submit">Save</span>
                        <span class="indicator-progress">
                          <span data-kt-translate="general-progress">Please wait...</span>
                          <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                      </button>
                  </div>
              </form>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table  class="table table-row-dashed fs-6 gy-5">
          <thead>
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
              <th>Name</th>
              <th>University</th>
              <th>Major</th>
              <th>Member type</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($member as $item)     
            <tr>
              <td>
                <div class="d-flex">
                  <div class="fs-6">{{ $item->name }}</div>
                </div>
              </td>
              <td>
                <div class="d-flex">
                  <div class="fs-6">{{ $item->university }}</div>
                </div>
              </td>
              <td>
                <div class="d-flex">
                  <div class="fs-6">{{ $item->major }}</div>
                </div>
              </td>
              <td>
                <div class="d-flex">
                  <div class="fs-6">{{ $item->type }}</div>
                </div>
              </td>
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                  Actions
                  <span class="svg-icon fs-5 m-0 ps-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                      </g>
                    </svg>
                  </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <div class="menu-item px-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}" class="menu-link px-3">Edit</a>
                  </div>
                  @if ($item->type == 'member')
                    <div class="menu-item px-3">
                      <a id="{{ route('competition.member.destroy', $item->id) }}" class="menu-link px-3 btn-del">Hapus</a>
                    </div>
                  @endif
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@foreach ($member as $item)     
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
  <div class="modal-dialog modal-dialog-centered">
      <form method="POST" action="{{ route('competition.member.update', $item->id) }}" class="modal-content" id="update{{$item->id}}">
        @csrf
          <div class="modal-header">
              <h3 class="modal-title">Edit Member</h3>
              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
          </div>
          <div class="modal-body">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="required form-label">Name</label>
                        <input type="text" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror"  value="{{ $item->name }}" placeholder="Full Name" required/>
                        @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="required form-label">University</label>
                        <input type="text" name="university" class="form-control form-control-solid @error('university') is-invalid @enderror"  value="{{ $item->university }}" placeholder="University" required/>
                        @error('university')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="required form-label">Major</label>
                        <input type="text" name="major" class="form-control form-control-solid @error('major') is-invalid @enderror"  value="{{ $item->major }}" placeholder="Major" required/>
                        @error('major')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
          </div>
          <div class="modal-footer">
              <div class="d-flex flex-stack">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button id="update_submit{{$item->id}}" class="btn btn-primary me-2 flex-shrink-0">
                  <span class="indicator-label" data-kt-translate="sign-in-submit">Save</span>
                  <span class="indicator-progress">
                    <span data-kt-translate="general-progress">Please wait...</span>
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                  </span>
                </button>
              </div>
          </div>
      </form>
  </div>
</div>
@endforeach
@endsection

@section('script')
<script>
  document.getElementById('add').addEventListener('submit', function() {
    var submitButton = document.getElementById('add_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });

  @foreach ($member as $item)
  document.getElementById('update{{$item->id}}').addEventListener('submit', function() {
    var submitButton = document.getElementById('update_submit{{$item->id}}');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
  @endforeach
</script>
@endsection
