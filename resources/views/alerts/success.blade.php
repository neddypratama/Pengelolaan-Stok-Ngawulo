@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success', // Ikon untuk alert, bisa diubah jadi 'error', 'warning', dll.
                title: 'Berhasil',
                text: '{{ session('status') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

{{-- @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Login Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif --}}
