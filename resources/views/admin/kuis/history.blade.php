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
                            <th>Kuis</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->kuis }}</td>
                                <td>{{ $i->score }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
