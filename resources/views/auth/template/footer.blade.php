<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}assets/js/core/popper.min.js"></script>
<script src="{{ asset('') }}assets/js/core/bootstrap.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('') }}assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
<!-- Masukkan ini di bagian bawah file blade Anda -->
<script>
    $(document).ready(function() {
        $('#register').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            // Dapatkan CSRF token dari meta tag di halaman
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan CSRF token ke dalam data permintaan
            formData += '&_token=' + csrfToken;
            $.ajax({
                url: '{{ route('login.register') }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Arahkan pengguna ke halaman tertentu setelah mengonfirmasi
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                },
                error: function(xhr) {
                    // Tampilkan pesan error jika terjadi kesalahan
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Terjadi kesalahan!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
        $('#form-login').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            // Dapatkan CSRF token dari meta tag di halaman
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan CSRF token ke dalam data permintaan
            formData += '&_token=' + csrfToken;
            $.ajax({
                url: "{{ route('login_check') }}",
                method: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message,
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Arahkan pengguna ke halaman dashboard setelah login berhasil
                            window.location.href = '/dashboard';
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Oops...',
                        text: 'Login gagal. Silakan coba lagi.',
                        icon: 'error'
                    });
                }
            });
        });
    });
</script>
