@extends('admin.template.master')
@section('content')
    <style>
        .bg-gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
        }
    </style>
    {{-- Join Kelas --}}
    <div class="modal fade" id="exampleModalJoin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Kode Enrol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-enrol">
                        <label for="">Kode Enrol</label>
                        <input type="hidden" id="id" name="id">
                        <input type="text" id="enrol" class="form-control" name="enrol">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Ubah-->
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nama Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-ubah-kelas">
                        <label for="">Kelas</label>
                        <input type="hidden" id="id" name="id">
                        <input type="text" id="nama" class="form-control" name="nama">

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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-kelas">
                        <label for="">Kelas</label>
                        <input type="text" class="form-control" name="nama">

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
                        <h4>Kelas</h4>
                    </div>
                    <div class="col text-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModalJoin">
                            Join Kelas
                        </button>


                    </div>

                </div>

            </div>
            <div class="card-body ">
                @if ($data->isEmpty())
                    <div class="card mb-3"
                        style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  background-image: linear-gradient(to right, #4d36cd, #FFFFFF);">
                        <div class="card-body">
                            <h4>Anda Belum Memiliki Kelas, Silahkan Tambahkan atau
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalJoin">
                                    Join Kelas
                                </button>
                            </h4>
                        </div>
                    </div>
                @endif
                @foreach ($data as $i)
                    <div class="card mb-3"
                        style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  background-image: linear-gradient(to right, #4d36cd, #FFFFFF);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col" style="color: #fff">
                                    <h5 style="color: #FFFFFF">{{ $i->kelas }}</h5>
                                    <p><b>{{ $i->hak_akses }}</b> | Kode Enrol : {{ $i->enrol }} </p>
                                </div>
                                <div class="col">
                                </div>
                                <div class="col text-end">
                                    @if ($i->hak_akses == 'teacher')
                                        <button type="button" class="btn btn-warning btnUpdate" data-bs-toggle="modal"
                                            data-bs-target="#modalUbah" data-id="{{ $i->id }}"
                                            data-nama="{{ $i->kelas }}">
                                            Update
                                        </button>
                                        <a href="{{ route('kelas.kelola', $i->id) }}" class="btn btn-primary">
                                            Kelola
                                        </a>
                                        <button class="btn btn-danger btnDelete" data-id="{{ $i->id }}">
                                            Hapus
                                        </button>
                                    @else
                                        <a href="{{ route('kelas.kelola', $i->id) }}" class="btn btn-primary">
                                            Kuis
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
