@extends('layouts.app')

@section('content')
<div class="row gx-5 g-xl-10 g-xl-10">
  <div class="col-xl-12 mb-8">
    <div class="card card-flush">
      <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <div>
          <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary d-flex align-items-center"><i class="ki-duotone ki-plus fs-2"></i>
            Add
          </button>
          <div class="modal fade" tabindex="-1" id="add">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('announcement.store') }}" class="modal-content" id="add">
                  @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Add New Announcement</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="required form-label">Title</label>
                        <input type="text" name="title" class="form-control form-control-solid @error('title') is-invalid @enderror"  value="{{ old('title') }}" placeholder="Title" required/>
                        @error('title')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="required form-label">Content</label>
                        <div id="kt_docs_quill_basic" class="@error('content') is-invalid @enderror">
                          {!! old('content') !!}
                        </div>
                        <input type="hidden" name="content" id="content">
                        @error('content')
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
        <form method="GET" class="card-title">
          <input type="hidden" name="page" value="{{ request('page', 1) }}">
          <div class="d-flex align-items-center position-relative my-1">
            <input type="text"  class="form-control form-control-solid  ps-5 rounded-0" name="q" value="{{ request('q') }}" placeholder="Search" />
          </div>
          <button class="btn btn-primary btn-icon ms-2" type="submit" id="button-addon2">
            <span class="svg-icon svg-icon-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </span>
          </button>
        </form>
      </div>
      <div class="card-body pt-0">
        <div class="table-responsive">
          <table  class="table table-row-dashed fs-6 gy-5">
            <thead>
              <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                <th>date</th>
                <th>Title</th>
                <th>Content</th>
                <th class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              @if ($announcement->total() == 0)
                <tr class="max-w-10px">
                  <td colspan="4" class="text-center">
                    No data available in table
                  </td>
                </tr>
              @else
                @foreach ($announcement as $item)     
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div class="fs-6 text-muted">{{ $item->created_at }}</div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex">
                        <div class="fs-6 fw-bold">{{ $item->title }}</div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex">
                        <div class="fs-6">{!! $item->content !!}</div>
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
                        <div class="menu-item px-3">
                          <a id="{{ route('announcement.destroy', $item->id) }}" class="menu-link px-3 btn-del">Hapus</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="d-flex flex-stack flex-wrap my-3">
          <div class="fs-6 fw-semibold text-gray-700">
              Showing {{ $announcement->firstItem() }} to {{ $announcement->lastItem() }} of {{ $announcement->total() }}  records
          </div>
          <ul class="pagination">
              @if ($announcement->onFirstPage())
                  <li class="page-item previous">
                      <a href="#" class="page-link"><i class="previous"></i></a>
                  </li>
              @else
                  <li class="page-item previous">
                      <a href="{{ $announcement->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
                  </li>
              @endif
      
              @php
                  // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                  $start = max($announcement->currentPage() - 2, 1);
                  $end = min($start + 4, $announcement->lastPage());
              @endphp
      
              @if ($start > 1)
                  <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                  <li class="page-item disabled">
                      <span class="page-link">...</span>
                  </li>
              @endif
      
              @foreach ($announcement->getUrlRange($start, $end) as $page => $url)
                  <li class="page-item{{ ($page == $announcement->currentPage()) ? ' active' : '' }}">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endforeach
      
              @if ($end < $announcement->lastPage())
                  <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                  <li class="page-item disabled">
                      <span class="page-link">...</span>
                  </li>
              @endif
      
              @if ($announcement->hasMorePages())
                  <li class="page-item next">
                      <a href="{{ $announcement->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
                  </li>
              @else
                  <li class="page-item next">
                      <a href="#" class="page-link"><i class="next"></i></a>
                  </li>
              @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach ($announcement as $item)     
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
  <div class="modal-dialog modal-dialog-centered">
      <form method="POST" action="{{ route('announcement.update', $item->id) }}" class="modal-content" id="update{{$item->id}}">
        @csrf
          <div class="modal-header">
              <h3 class="modal-title">Edit Announcement</h3>
              <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                  <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="required form-label">Title</label>
              <input type="text" name="title" class="form-control form-control-solid @error('title') is-invalid @enderror"  value="{{ $item->title }}" placeholder="Full title" required/>
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="required form-label">Content</label>
              <div id="kt_docs_quill_basic_{{ $item->id }}" class="@error('content') is-invalid @enderror">
                {!! $item->content !!}
              </div>
              <input type="hidden" name="content" id="content_{{ $item->id }}">
              @error('content')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
              <div class="d-flex flex-stack">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button id="update_submit_{{ $item->id }}" class="btn btn-primary me-2 flex-shrink-0">
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
  var quill = new Quill('#kt_docs_quill_basic', {
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['code-block']
        ]
    },
    placeholder: 'Type your text here...',
    theme: 'snow'
  });

  document.getElementById('add').addEventListener('submit', function() {
    // Salin konten Quill ke input hidden
    document.getElementById('content').value = quill.root.innerHTML;

    var submitButton = document.getElementById('add_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });

  @foreach ($announcement as $item)
    var quillEdit{{ $item->id }} = new Quill('#kt_docs_quill_basic_{{ $item->id }}', {
      modules: {
          toolbar: [
              [{ header: [1, 2, false] }],
              ['bold', 'italic', 'underline'],
              ['code-block']
          ]
      },
      placeholder: 'Type your text here...',
      theme: 'snow'
    });

    document.getElementById('update{{$item->id}}').addEventListener('submit', function(event) {
      // Salin konten Quill ke input hidden
      document.getElementById('content_{{ $item->id }}').value = quillEdit{{ $item->id }}.root.innerHTML;

      var submitButton = document.getElementById('update_submit_{{ $item->id }}');
      submitButton.querySelector('.indicator-label').style.display = 'none';
      submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
      submitButton.setAttribute('disabled', 'disabled');
    });
  @endforeach

</script>
@endsection
