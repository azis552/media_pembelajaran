
<footer class="footer  ">
    <div class="container-fluid ">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4 text-end">
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Irdina</a>
                        for a better web.
                    </div>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Irdina</h5>
                <p></p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                    onclick="sidebarType(this)">Dark</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="d-flex my-3">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="mt-2 mb-5 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div>
            <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free
                Download</a>
            <a class="btn btn-outline-dark w-100"
                href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View
                documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('') }}assets/js/core/popper.min.js"></script>
<script src="{{ asset('') }}assets/js/core/bootstrap.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="{{ asset('') }}assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
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
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.4/js/dataTables.responsive.min.js"></script>
</body>

</html>

{{-- crud kelas --}}
<script>
    $(document).ready(function() {
        $('#form-kelas').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            // Dapatkan CSRF token dari meta tag di halaman
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan CSRF token ke dalam data permintaan
            formData += '&_token=' + csrfToken;
            $.ajax({
                url: '{{ route('kelas.store') }}',
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
                            window.location.href = "{{ route('kelas.index') }}";
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
        $('#form-enrol').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            // Dapatkan CSRF token dari meta tag di halaman
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Tambahkan CSRF token ke dalam data permintaan
            formData += '&_token=' + csrfToken;
            $.ajax({
                url: '{{ route('kelas.join') }}',
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
                            window.location.href = "{{ route('kelas.index') }}";
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

        // modal ubah
        $('.btnUpdate').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $("#modalUbah #id").val(id);
            $("#modalUbah #nama").val(nama);
        });

        // update kelas
        $('#form-ubah-kelas').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            // Dapatkan CSRF token dari meta tag di halaman
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Tambahkan CSRF token ke dalam data permintaan
            formData += '&_token=' + csrfToken;
            id = $("#modalUbah #id").val();
            $.ajax({
                url: "{{ route('kelas.update', ':id') }}".replace(':id', id),
                method: 'POST',
                data: formData + '&_method=PUT',
                success: function(response) {
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Arahkan pengguna ke halaman tertentu setelah mengonfirmasi
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('kelas.index') }}";
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
        $('.btnDelete').click(function(e) {
            e.preventDefault();

            var id = $(this).data('id');

            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah kamu yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ambil CSRF token
                    var token = "{{ csrf_token() }}";

                    // Set header CSRF token dalam permintaan Ajax
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    });
                    $.ajax({
                        url: "{{ route('kelas.destroy', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                        success: function(response) {
                            if (response.message == 'Data berhasil dihapus') {
                                // Data berhasil dihapus
                                // Tampilkan pesan sukses
                                Swal.fire(
                                    'Terhapus!',
                                    'Data telah dihapus.',
                                    'success'
                                ).then(() => {
                                    // Pindah ke halaman lain setelah menutup pesan SweetAlert
                                    window.location.href =
                                        "{{ route('kelas.index') }}";
                                });
                                // Tambahkan kode untuk menghapus elemen dari DOM jika diperlukan
                            } else {
                                // Gagal menghapus data
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal menghapus data.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        });
    });
</script>

{{-- Crud Kuis --}}
<script>
    $(document).ready(function() {
        $('#form-kuis').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[
                0]); // Mengambil semua data formulir menggunakan serialize
            var gambarInput = $('#gambar')[0]; // Menggunakan [0] untuk mengakses objek DOM
            var gambarFiles = gambarInput.files;

            if (gambarFiles.length > 0) {
                var gambar = gambarFiles[0];
                // Lanjutkan dengan prosesnya
            }
            // Mendapatkan token CSRF
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Tambahkan token CSRF ke dalam data permintaan
            formData.append('_token', csrfToken);
            formData.append('gambar', gambar); // Menambahkan file gambar ke FormData
            id = $("#id_kelas").val();
            $.ajax({
                url: '{{ route('kelas.kuis') }}',
                method: 'POST',
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
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
                            window.location.href =
                                "{{ route('kelas.kelola', ':id') }}".replace(':id',
                                    id);
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
        // modal ubah
        $('.btnUpdateKuis').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var waktu = $(this).data('waktu');
            var keterangan = $(this).data('keterangan');
            var kategori = $(this).data('kategori');
            $("#modalUbah #id").val(id);
            var idFoto = $(this).data('gambar');
            // Periksa apakah idFoto tidak kosong
            // Tampilkan foto di div dengan id "fotoContainer"
            $("#nama").val(nama);
            $("#waktu").val(waktu);
            $("#keterangan").val(keterangan);
            $("#kategori").val(kategori);
            $('#fotoKuis').html('<img src="' + idFoto + '" alt="Foto" width="100" height="150">');
        });
        // form ubah kuis
        $('#form-ubah-kuis').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[
                0]); // Mengambil semua data formulir menggunakan serialize
            var gambarInput = $('#gambar_ubah')[0]; // Menggunakan [0] untuk mengakses objek DOM
            var gambarFiles = gambarInput.files;
            if (gambarFiles.length > 0) {
                var gambar = gambarFiles[0];
                // Lanjutkan dengan prosesnya
            }
            // Mendapatkan token CSRF
            // Membuat token CSRF di sisi klien
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Tambahkan token CSRF ke dalam data permintaan
            formData.append('_token', csrfToken);
            formData.append('_method', 'PUT');
            formData.append('gambar', gambar); // Menambahkan file gambar ke FormData
            id_kuis = $("#modalUbah #id").val();
            id = $("#id_kelas").val();
            $.ajax({
                url: "{{ route('kuis.update', ':id') }}".replace(':id', id_kuis),
                method: 'POST',
                contentType: false,
                processData: false,
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
                            window.location.href =
                                "{{ route('kelas.kelola', ':id') }}".replace(':id',
                                    id);
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
        $('.btnDelete').click(function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var id_kelas = $(this).data('id_kelas')

            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah kamu yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ambil CSRF token
                    var token = "{{ csrf_token() }}";

                    // Set header CSRF token dalam permintaan Ajax
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    });
                    $.ajax({
                        url: "{{ route('kuis.delete', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                        success: function(response) {
                            if (response.message == 'Data berhasil dihapus') {
                                // Data berhasil dihapus
                                // Tampilkan pesan sukses
                                Swal.fire(
                                    'Terhapus!',
                                    'Data telah dihapus.',
                                    'success'
                                ).then(() => {
                                    // Pindah ke halaman lain setelah menutup pesan SweetAlert
                                    window.location.href =
                                        "{{ route('kelas.kelola', ':id') }}"
                                        .replace(':id',
                                            id_kelas);
                                });
                                // Tambahkan kode untuk menghapus elemen dari DOM jika diperlukan
                            } else {
                                // Gagal menghapus data
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal menghapus data.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        });
    });
</script>

{{-- Crud Soal --}}
<script>
    $(document).ready(function() {
        $('#form-soal').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[
                0]); // Mengambil semua data formulir menggunakan serialize
            
            var gambarInput = $('#gambar')[0]; // Menggunakan [0] untuk mengakses objek DOM
            var gambarFiles = gambarInput.files;
            if (gambarFiles.length > 0) {
                var gambar = gambarFiles[0];
                // Lanjutkan dengan prosesnya
            }
            // Mendapatkan token CSRF
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Tambahkan token CSRF ke dalam data permintaan
			
            var jawabanBenar = $('#jawaban_tambah').val();
            var value_JawabanBenar = $('#'+jawabanBenar).val();
			
            formData.append('jawaban_benar', value_JawabanBenar);
            formData.append('_token', csrfToken);
            formData.append('gambar', gambar); // Menambahkan file gambar ke FormData
            id = $("#id_kuis").val();
            $.ajax({
                url: '{{ route('soal.kuis') }}',
                method: 'POST',
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
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
                            window.location.href =
                                "{{ route('kuis.soal', ':id') }}".replace(':id',
                                    id);
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
        // modal ubah
        $('.btnUpdateSoal').on('click', function() {
            var id = $(this).data('id');
            $("#modalUbah #id").val(id);
            var idFoto = $(this).data('gambar');
            // Periksa apakah idFoto tidak kosong
            var soal = $(this).data('soal'); // Ambil nilai atribut data-soal
            var jawaban1 = $(this).data('jawaban1'); // Ambil nilai atribut data-jawaban1
            var jawaban2 = $(this).data('jawaban2'); // Ambil nilai atribut data-jawaban2
            var jawaban3 = $(this).data('jawaban3'); // Ambil nilai atribut data-jawaban3
            var jawaban4 = $(this).data('jawaban4'); // Ambil nilai atribut data-jawaban4
            var jawaban5 = $(this).data('jawaban5'); // Ambil nilai atribut data-jawaban5
            var jawaban_benar = $(this).data('jawaban_benar'); // Ambil nilai atribut data-jawaban_benar
            $("#soal").text(soal);
            $("#jawaban1").val(jawaban1);
            $("#jawaban2").val(jawaban2);
            $("#jawaban3").val(jawaban3);
            $("#jawaban4").val(jawaban4);
            $("#jawaban5").val(jawaban5);
            var jawaban_benar_terpilih;
            if(jawaban_benar == jawaban1) {
                jawaban_benar_terpilih = 'jawaban1';
            } else if(jawaban_benar == jawaban2) {
                jawaban_benar_terpilih = 'jawaban2';
            } else if(jawaban_benar == jawaban3) {
                jawaban_benar_terpilih = 'jawaban3';
            } else if(jawaban_benar == jawaban4) {
                jawaban_benar_terpilih = 'jawaban4';
            } else if(jawaban_benar == jawaban5) {
                jawaban_benar_terpilih = 'jawaban5';
            }

            $(".jawaban_benar").val(jawaban_benar_terpilih);

            $('#fotoKuis').html('<img src="' + idFoto + '" alt="Foto" width="100" height="150">');
        });
        // form ubah kuis
        $('#form-ubah-soal').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[
                0]); // Mengambil semua data formulir menggunakan serialize
            var gambarInput = $('#gambar_ubah')[0]; // Menggunakan [0] untuk mengakses objek DOM
            var gambarFiles = gambarInput.files;
            if (gambarFiles.length > 0) {
                var gambar = gambarFiles[0];
                // Lanjutkan dengan prosesnya
            }
            // Mendapatkan token CSRF
            // Membuat token CSRF di sisi klien
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var jawabanBenar = $('#jawaban').val();
            var value_JawabanBenar = $('#'+jawabanBenar).val();
            formData.append('jawaban_benar', value_JawabanBenar);
            // Tambahkan token CSRF ke dalam data permintaan
            formData.append('_token', csrfToken);
            formData.append('_method', 'PUT');
            formData.append('gambar', gambar); // Menambahkan file gambar ke FormData
            id_soal = $("#modalUbah #id").val();
            id = $("#id_kuis").val();
            $.ajax({
                url: "{{ route('soal.update', ':id') }}".replace(':id', id_soal),
                method: 'POST',
                contentType: false,
                processData: false,
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
                            window.location.href =
                                "{{ route('kuis.soal', ':id') }}".replace(':id',
                                    id);
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

        $('.btnDeleteSoal').click(function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var id_kuis = $(this).data('id_kuis')

            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah kamu yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ambil CSRF token
                    var token = "{{ csrf_token() }}";

                    // Set header CSRF token dalam permintaan Ajax
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    });
                    $.ajax({
                        url: "{{ route('soal.delete', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                        success: function(response) {
                            if (response.message == 'Data berhasil dihapus') {
                                // Data berhasil dihapus
                                // Tampilkan pesan sukses
                                Swal.fire(
                                    'Terhapus!',
                                    'Data telah dihapus.',
                                    'success'
                                ).then(() => {
                                    // Pindah ke halaman lain setelah menutup pesan SweetAlert
                                    window.location.href =
                                        "{{ route('kuis.soal', ':id') }}"
                                        .replace(':id',
                                            id_kuis);
                                });
                                // Tambahkan kode untuk menghapus elemen dari DOM jika diperlukan
                            } else {
                                // Gagal menghapus data
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal menghapus data.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
    $('#tableSoal').DataTable({
        responsive: true
    });
});
    $(document).ready( function () {
  var table = $('#example').DataTable( {
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Semua']]
  } )
} );
</script>