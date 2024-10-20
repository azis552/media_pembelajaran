@extends('admin.template.master')
@section('content')
    <style>
        .bg-gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
        }
    </style>
    <script>
        window.onload = function() {
            // Menghapus data dari localStorage setelah halaman dimuat
            localStorage.removeItem('remainingTime'); // Hapus waktu yang tersisa
            localStorage.removeItem('activeQuestion'); // Hapus soal terakhir yang dibuka

            // Hapus semua jawaban yang dipilih
            const questionCount = 10; // Ganti dengan jumlah soal yang Anda miliki
            for (let i = 0; i < questionCount; i++) {
                localStorage.removeItem(`jawaban_${i}`); // Hapus jawaban dari localStorage
                localStorage.removeItem(`kesulitan_${i}`); // Hapus tingkat kesulitan
                localStorage.removeItem(`locked_${i}`); // Hapus status kunci
            }

            // Periksa apakah item masih ada di localStorage
            console.log('remainingTime:', localStorage.getItem('remainingTime'));
            console.log('activeQuestion:', localStorage.getItem('activeQuestion'));
        };
    </script>


    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="card" style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <div class="card-header" style="margin-bottom: -50px">
                <div class="row">
                    <div class="col">
                        <h4>History Kuis
                        </h4>
                    </div>
                    <div class="col text-end">
                        <!-- Button trigger modal -->



                    </div>

                </div>

            </div>
            <div class="card-body ">

                <table id="tableSoal" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th>Jawaban Benar</th>
                            <th>Jawaban Peserta</th>
                            <th>Kesimpulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                           
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->soal }}</td>
                                <td>{{ $item->jawaban_benar }}</td>
                                <td>
                                    {{ $item->jawaban }}
                                </td>
                                <td>
                                    {{ $item->jawaban_benar == $item->jawaban ? 'Benar' : 'Salah' }}
                                </td>
                            </tr>
                            
                        @endforeach
                       
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
