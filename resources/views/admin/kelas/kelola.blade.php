@extends('admin.template.master')
@section('content')
    <style>
        .bg-gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
        }
    </style>
    <!-- Modal Ubah-->
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nama Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-ubah-kuis" enctype="multipart/form-data">
                        <label for="">Kuis</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" name="id_kelas" id="id_kelas" value="{{$kelas->id}}">
                        <input type="text" id="nama" class="form-control" name="nama">
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori">
                        <label for="">Waktu (menit)</label>
                        <input type="number" class="form-control" name="waktu" id="waktu">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                        <label for="">Gambar</label>
                        <div id="fotoKuis"></div>
                        <input type="file" class="form-control" name="gambar_ubah" id="gambar_ubah">
                        
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kuis Kelas {{ $kelas->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-kuis" enctype="multipart/form-data">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
                        <label for="">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori">
                        <label for="">Waktu (menit)</label>
                        <input type="number" class="form-control" name="waktu" id="waktu">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <input type="hidden" name="id_kelas" id="id_kelas" value="{{$kelas->id}}">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="card" style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <div class="card-header" style="margin-bottom: -50px">
                <div class="row">
                    <div class="col">
                        <h4>Kelas : 
                            {{ $kelas->nama }}
                        </h4>
                    </div>
                    <div class="col text-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah
                        </button>


                    </div>

                </div>

            </div>
            <div class="card-body ">
                @if ($kuis->isEmpty())
                    <div class="card mb-3"
                        style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  background-image: linear-gradient(to right, #4d36cd, #FFFFFF);">
                        <div class="card-body">
                            <h4>Anda Belum Memiliki Kuis, Silahkan Tambahkan atau  <button class="btn btn-success">Tambah Kuis</button> </h4>
                        </div>
                    </div>
                @endif
                @foreach ($kuis as $i)
                    <div class="card mb-3"
                        style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  background-image: linear-gradient(to right, #4d36cd, #FFFFFF);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('storage/images_kuis/' . $i->gambar) }}" width="100" height="150" alt="">
                                </div>
                                <div class="col" style="color: #fff">
                                    <h5 style="color: #FFFFFF">{{ $i->nama }}</h5>
                                    <p><b>{{ $i->keterangan }}</b> | Kategori : {{ $i->kategori }} | Waktu : {{ $i->waktu }} </p>
                                </div>
                                <div class="col text-end">
                                    @if ($hak_akses == 'teacher')
                                    <button type="button" class="btn btn-warning btnUpdateKuis" data-bs-toggle="modal"
                                    data-bs-target="#modalUbah" data-id="{{ $i->id }}"
                                    data-nama="{{ $i->nama }}"
                                    data-waktu="{{ $i->waktu }}"
                                    data-gambar="{{ asset('storage/images_kuis/' . $i->gambar) }}" 
                                    data-keterangan="{{ $i->keterangan }}"
                                    data-kategori="{{ $i->kategori }}">
                                    Update
                                </button>
                                <a href="{{ route('kuis.soal',$i->id) }}" class="btn btn-primary">
                                    Soal
                                </a>
                                <a href="{{ route('play.kuis',$i->id) }}" class="btn btn-success">
                                    Play
                                </a>
                                <a href="{{ route('history.kuis.siswa', $i->id) }}" class="btn btn-success" >History Siswa</a>
                                <button class="btn btn-danger btnDelete" data-id="{{ $i->id }}" data-id_kelas="{{ $kelas->id }}">
                                    Hapus
                                </button>
                                    @else
                                    <a href="{{ route('play.kuis',$i->id) }}" class="btn btn-primary">
                                        Play
                                    </a>
                                    @endif
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
