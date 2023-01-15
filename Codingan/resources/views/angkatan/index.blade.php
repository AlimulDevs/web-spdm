@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DATA ANGKATAN</h3>
    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_add'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('failed_add'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="text-left">



            </div>

            <div class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data-viewIndex">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>

        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="example2">
                    <thead class="text-center">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Jumlah Kelas</th>

                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach ($data_angkatan as $da)
                        <tr class="text-center">
                            <td>{{$no}}</td>
                            <td>{{$da->tahun}}</td>
                            <td>{{$da->jumlah_kelas}}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#edit{{$da->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit text-white"></i></a>
                                <a href="/angkatan-delete/{{$da->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash "></i></a>
                            </td>
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah-data-viewIndex">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/angkatan-create" method="post">
                        @csrf
                        <label for="" class="form-label">Tahun</label>
                        <input name="tahun" type="number" class="form-control" required>
                        <label for="" class="form-label">Jumlah Kelas</label>
                        <input name="jumlah_kelas" type="number" class="form-control" required>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @foreach ($data_angkatan as $dta)
    <div class="modal fade" id="edit{{$dta->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/angkatan-edit" method="post">
                        @csrf
                        <input type="hidden" name="id" id="" value="{{$dta->id}}">
                        <label for="" class="form-label">Tahun</label>
                        <input name="tahun" type="number" class="form-control" value="{{$dta->tahun}}">
                        <label for="" class="form-label">Jumlah Kelas</label>
                        <input name="jumlah_kelas" type="number" class="form-control" value="{{$dta->jumlah_kelas}}" required>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning text-white">Edit Data</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
</div>


</div>
@endsection