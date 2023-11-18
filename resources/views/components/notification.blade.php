@if (session('success'))
  <script>
    // Show Notification
    document.addEventListener('DOMContentLoaded', function() {
      iziToast.success({
        title: 'Success',
        message: `{{ session('success') }}`,
        position: 'topRight',
      });
    });
  </script>
@endif

@if (session('error'))
  <script>
    // Show Notification
    document.addEventListener('DOMContentLoaded', function() {
      iziToast.error({
        title: 'Error',
        message: `{{ session('error') }}`,
        position: 'topRight',
      });
    });
  </script>
@endif
