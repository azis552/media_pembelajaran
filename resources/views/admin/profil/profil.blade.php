@extends('admin.template.master')
@section('content')
    <style>
        .bg-gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
        }
    </style>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="card" style="border: 1px solid #ccc; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <div class="card-header" style="margin-bottom: -50px">
                <div class="row">
                    Profil
                </div>
            </div>
            <div class="card-body ">
                <form action="{{route('update.profile', Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" value="" id="">
                
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
        </div>
    </div>
@endsection
