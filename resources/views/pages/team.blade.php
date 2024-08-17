@extends('layouts.app')

@section('content')
<div class="row gx-5 g-xl-10 g-xl-10">
  <div class="col-xl-12 mb-8">
    <div class="card card-flush">
      <div class="card-header align-items-center py-5 gap-2 gap-md-5 justify-content-end">
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
                <th>Team</th>
                <th>Submission</th>
                <th>Qualification Score</th>
                <th>Final Score</th>
                <th class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              @if ($team->total() == 0)
                <tr class="max-w-10px">
                  <td colspan="3" class="text-center">
                    No data available in table
                  </td>
                </tr>
              @else
                @foreach ($team as $item)     
                  <tr>
                    <td class="d-flex align-items-center">
                      <div class="symbol-group symbol-hover me-3">
                        <div class="symbol symbol-45px symbol-circle" data-bs-toggle="tooltip" title="{{ $item->name }}">
                          <img src="@if($item->logo) {{  Storage::url($item->logo) }} @else https://ui-avatars.com/api/?bold=true&name={{ $item->name }} @endif" alt="">
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <span class="text-gray-800 fw-bold mb-1">{{ $item->name }}</span>
                        {{-- <span class="text-muted fs-7">{{ $item->email }}</span> --}}
                      </div>
                    </td>
                    <td>
                      <div class="d-flex">
                        {{-- <div class="fs-6 fw-bold">{{ $item->role }}</div> --}}
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
                          <a id="{{ route('user.destroy', $item->id) }}" class="menu-link px-3 btn-del">Hapus</a>
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
              Showing {{ $team->firstItem() }} to {{ $team->lastItem() }} of {{ $team->total() }}  records
          </div>
          <ul class="pagination">
              @if ($team->onFirstPage())
                  <li class="page-item previous">
                      <a href="#" class="page-link"><i class="previous"></i></a>
                  </li>
              @else
                  <li class="page-item previous">
                      <a href="{{ $team->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
                  </li>
              @endif
      
              @php
                  // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                  $start = max($team->currentPage() - 2, 1);
                  $end = min($start + 4, $team->lastPage());
              @endphp
      
              @if ($start > 1)
                  <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                  <li class="page-item disabled">
                      <span class="page-link">...</span>
                  </li>
              @endif
      
              @foreach ($team->getUrlRange($start, $end) as $page => $url)
                  <li class="page-item{{ ($page == $team->currentPage()) ? ' active' : '' }}">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endforeach
      
              @if ($end < $team->lastPage())
                  <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                  <li class="page-item disabled">
                      <span class="page-link">...</span>
                  </li>
              @endif
      
              @if ($team->hasMorePages())
                  <li class="page-item next">
                      <a href="{{ $team->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
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

@endsection

@section('script')
<script>
  document.getElementById('add').addEventListener('submit', function() {
    var submitButton = document.getElementById('add_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });

</script>
@endsection
