@extends('admin.template.master')
@section('content')
    <style>
        .bg-gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
        }
    </style>
    <!-- Modal Ubah-->
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nama </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-ubah-soal" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <label for="">Soal</label>
                        <textarea name="soal" id="soal" class="form-control" cols="30" rows="10"></textarea>
                        <label for="">Gambar</label>
                        <div id="fotoKuis"></div>
                        <input type="file" class="form-control" name="gambar_ubah" id="gambar_ubah">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="pilihan_a">Pilihan A:</label>
                                    <input type="text" class="form-control" id="jawaban1" name="jawaban1"
                                        placeholder="Masukkan pilihan A">
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_b">Pilihan B:</label>
                                    <input type="text" class="form-control" id="jawaban2" name="jawaban2"
                                        placeholder="Masukkan pilihan B">
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_c">Pilihan C:</label>
                                    <input type="text" class="form-control" id="jawaban3" name="jawaban3"
                                        placeholder="Masukkan pilihan C">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="pilihan_d">Pilihan D:</label>
                                    <input type="text" class="form-control" id="jawaban4" name="jawaban4"
                                        placeholder="Masukkan pilihan D">
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_d">Pilihan E:</label>
                                    <input type="text" class="form-control" id="jawaban5" name="jawaban5"
                                        placeholder="Masukkan pilihan E">
                                </div>
                                <div class="form-group">
                                    <label for="jawaban_benar">Jawaban Benar:</label>
                                    <select class="form-control jawaban_benar" id="jawaban" >
                                        <option value="jawaban1">A</option>
                                        <option value="jawaban2">B</option>
                                        <option value="jawaban3">C</option>
                                        <option value="jawaban4">D</option>
                                        <option value="jawaban5">E</option>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="id_kuis" id="id_kuis"
                            value="{{ $kuis->id }}">
                            </div>
                        </div>
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
    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Soal {{ $kuis->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-soal" enctype="multipart/form-data">
                        <label for="">Soal</label>
                        <textarea name="soal" id="soal" class="form-control" cols="30" rows="10"></textarea>
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="pilihan_a">Pilihan A:</label>
                                    <input type="text" class="form-control" id="jawaban1tambah" name="jawaban1"
                                        placeholder="Masukkan pilihan A">
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_b">Pilihan B:</label>
                                    <input type="text" class="form-control" id="jawaban2tambah" name="jawaban2"
                                        placeholder="Masukkan pilihan B">
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_c">Pilihan C:</label>
                                    <input type="text" class="form-control" id="jawaban3tambah" name="jawaban3"
                                        placeholder="Masukkan pilihan C">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="pilihan_d">Pilihan D:</label>
                                    <input type="text" class="form-control" id="jawaban4tambah" name="jawaban4"
                                        placeholder="Masukkan pilihan D">
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_d">Pilihan E:</label>
                                    <input type="text" class="form-control" id="jawaban5tambah" name="jawaban5"
                                        placeholder="Masukkan pilihan E">
                                </div>
                                <div class="form-group">
                                    <label for="jawaban_benar">Jawaban Benar:</label>
                                    <select class="form-control jawaban_benar" id="jawaban_tambah">
                                        <option value="jawaban1tambah">A</option>
                                        <option value="jawaban2tambah">B</option>
                                        <option value="jawaban3tambah">C</option>
                                        <option value="jawaban4tambah">D</option>
                                        <option value="jawaban5tambah">E</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="id_kuis" id="id_kuis"
                            value="{{ $kuis->id }}">

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
                        <h4>Kuis :
                            {{ $kuis->nama }}
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
                @if ($soal->isEmpty())
                    <div class="card mb-3"
                        style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  background-image: linear-gradient(to right, #4d36cd, #FFFFFF);">
                        <div class="card-body">
                            <h4>Anda Belum Memiliki Soal, Silahkan Tambahkan atau <button class="btn btn-success">Tambah
                                    Soal</button> </h4>
                        </div>
                    </div>
                @endif
                <table id="tableSoal" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban Benar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soal as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->soal }}</td>
                                <td>
                                    @if ($i->gambar != null)
                                        <img src="{{ asset('storage/images_kuis/' . $i->gambar) }}" width="100"
                                            height="150" alt="">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>{{ $i->jawaban_benar }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btnUpdateSoal" data-bs-toggle="modal"
                                        data-bs-target="#modalUbah" data-id="{{ $i->id }}"
                                        data-soal="{{ $i->soal }}"
                                        data-gambar="{{ asset('storage/images_kuis/' . $i->gambar) }}"
                                        data-jawaban1="{{ $i->jawaban1 }}"
                                        data-jawaban2="{{ $i->jawaban2 }}"
                                        data-jawaban3="{{ $i->jawaban3 }}"
                                        data-jawaban4="{{ $i->jawaban4 }}"
                                        data-jawaban5="{{ $i->jawaban5 }}"
                                        data-jawaban_benar="{{ $i->jawaban_benar }}"
                                        >
                                        Update
                                    </button>
                                    <button class="btn btn-danger btnDeleteSoal" data-id="{{ $i->id }}"
                                        data-id_kuis="{{ $kuis->id }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
