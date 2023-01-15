@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DATA PRODI</h3>
    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_create'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible " role="alert">

        <strong class="text-white">{{$messege}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="text-right">
                <a href="/prodi-createIndex" class="btn btn-primary text-auto"><i class="fas fa-plus"></i>Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="example2">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Prodi</th>
                            <th>Kepala Prodi</th>
                            <th>Logo Prodi</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach ($data_prodi as $dp)


                        <tr class="text-center float-center ">
                            <td class="col-3">{{$no++}}</td>
                            <td class="col-3">{{strtoupper($dp->name)}}</td>
                            <td class="col-3">{{strtoupper($dp->kepala_prodi)}}</td>
                            <td class="col-3"><img width="50px" height="50px" src=" {{$dp->logo}}" alt=""></td>
                            <td>
                                <a href="/prodi-editIndex/{{$dp->id}}" class="btn btn-sm btn-warning mb-1"><i class="fas fa-edit text-white"></i></a>
                                <a href="/prodi-delete/{{$dp->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

</div>
@endsection