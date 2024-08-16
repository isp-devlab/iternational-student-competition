
@if (session()->has('success'))

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var myToast = new bootstrap.Toast(document.getElementById('success'));
      myToast.show();
  });
</script>
<div class="position-fixed bottom-0 end-0 mt-5 me-5" style="z-index: 9999;">
  <div class="toast align-items-center bg-dark" id="success" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex px-5 py-4">
      <div class="toast-body text-white fs-6">
        {{ session('success') }}
      </div>
      <button type="button" class="btn-close me-2 m-auto bg-white p-2" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>


@elseif (session()->has('error'))

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var myToast = new bootstrap.Toast(document.getElementById('error'));
      myToast.show();
  });
</script>
<div class="position-fixed bottom-0 end-0 mt-5 me-5" style="z-index: 9999;">
  <div class="toast align-items-center bg-danger" id="error" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex px-5 py-4">
      <div class="toast-body text-white fs-6">
        {{ session('error') }}
      </div>
      <button type="button" class="btn-close me-2 m-auto bg-white p-2" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

@endif

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(event) {
      if (event.target.classList.contains('btn-del')) {
        var link = event.target.id;
        var myModal = new bootstrap.Modal(document.getElementById('delete'));
        myModal.show();
        document.querySelector('.btn-delete-oke').addEventListener('click', function() {
          // Tampilkan modal loading

          var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
          loadingModal.show();

          // Arahkan ke halaman yang dituju setelah menampilkan loading
          window.location.replace(link);
        });
      }
    });
  });
</script>

<!-- Modal Konfirmasi Delete -->
<div class="modal modal-delete" id="delete" data-bs-backdrop="static">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content shadow rounded">
      <div class="modal-body p-4 text-center py-8">
        <h5 class="mb-2">Confirm!</h5>
        <p class="mb-0">Are you sure delete this?</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button type="button" class="btn-delete-oke btn btn-lg btn-secondary bg-transparent text-dark fs-6 text-decoration-none col-6 m-0 rounded-0 border-end">Delete</button>
        <button type="button" class="btn btn-lg btn-secondary bg-transparent text-dark fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Loading -->
<div class="modal" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered bg-transparent shadow-none">
    <div class="modal-content bg-transparent shadow-none">
      <div class="modal-body text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-3">Please wait...</p>
      </div>
    </div>
  </div>
</div>
