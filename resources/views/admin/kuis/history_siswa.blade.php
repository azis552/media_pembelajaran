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

                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kuis</th>
                            <th>Score</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($data as $item)
                            @foreach ($item as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i['user'] }}</td>
                                <td>{{ $i['nama_kuis'] }}</td>
                                <td>{{ $i['nilai'] }}</td>
                                <td>{{ $i['tgl'] }}</td>
                                <td>
                                    <a href="{{ route('kuis.history.detail', [$i['id_kuis'], $i['tgl'], $i['id_user']]) }}" class="btn btn-primary" >Detail Jawaban</a>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                       
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
