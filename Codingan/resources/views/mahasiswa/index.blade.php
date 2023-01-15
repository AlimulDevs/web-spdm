@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DATA MAHASISWA</h3>
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
    @elseif ($messege= Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="text-left">
                @if (request()->is('mahasiswa-index'))

                @else
                <a class="btn  btn-sm" href="/prodi-byId/{{$prodi_id}}">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                @endif


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
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach ($data_mahasiswa as $dtm)
                        <tr class="text-center">
                            <td>{{$no++}} </td>
                            <td>{{$dtm->nim}}</td>
                            <td>{{$dtm->name}}</td>
                            <td>{{$dtm->kelas}}</td>
                            <td>{{$dtm->prodi}}</td>
                            <td>{{$dtm->angkatan}}</td>
                            <td>
                                <a href="/mahasiswa-detail/{{$dtm->id}}" class="btn btn-sm btn-primary"><i class="fas fa-eye text-white"></i></a>
                                <a href="" data-toggle="modal" data-target="#edit{{$dtm->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit text-white"></i></a>
                                @if (request()->is('mahasiswa-index'))
                                <a href="/mahasiswa-delete/{{$dtm->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                @else
                                <a href="/angkatan-deleteMahasiswa/{{$dtm->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
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
                @if (request()->is('mahasiswa-index'))
                <form action="/mahasiswa-create" method="post">
                    @else
                    <form action="/angkatan-viewIndex/createMahasiswa" method="post">
                        @endif
                        @csrf
                        @if (request()->is('mahasiswa-index'))
                        <label for="prodi" class="form-label">prodi</label>
                        <select name="prodi_id" id="prodi" class="form-select" required>
                            <option value="">--Pilih Prodi--</option>
                            @foreach ($get_prodi as $gp)
                            <option value="{{$gp->id}}">{{$gp->name}}</option>
                            @endforeach

                        </select>
                        <label for="angkatan" class="form-label">angkatan</label>
                        <select name="angkatan_id" id="angkatan" class="form-select" required>
                            <option value="">--Pilih Angkatan--</option>
                            @foreach ($get_angkatan as $ga)
                            <option value="{{$ga->id}}">{{$ga->tahun}}</option>
                            @endforeach

                        </select>
                        @else
                        <input name="prodi_id" type="hidden" value="{{$prodi_id}}">
                        <input name="angkatan_id" type="hidden" value="  {{$angkatan_id}}">
                        @endif
                        <label for="" class="form-label">NIM</label>
                        <input name="nim" type="number" class="form-control" required>
                        <label for="" class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control" required>
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas_id" id="kelas" class="form-select" required>
                            <option value="">--Pilih Kelas--</option>
                            @foreach ($get_kelas as $gl)
                            <option value="{{$gl->id}}">{{$gl->name}}</option>
                            @endforeach

                        </select>
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                            <option value="">--Pilih Jenis Kelamin--</option>

                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-select" required>
                            <option value="">--Pilih Agama--</option>

                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>


                        </select>
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" type="text" class="form-control" required> </textarea>

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
@foreach ($data_mahasiswa as $dtm)
<div class="modal fade" id="edit{{$dtm->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (request()->is('mahasiswa-index'))
                <form action="/mahasiswa-edit" method="post">
                    @else
                    <form action="/angkatan-viewIndex/editMahasiswa" method="post">
                        @endif
                        @csrf
                        <input name="id" type="hidden" value="{{$dtm->id}}">
                        @if (request()->is('mahasiswa-index'))
                        @else
                        <input name="prodi_id" type="hidden" value="{{$prodi_id}}">
                        <input name="angkatan_id" type="hidden" value="  {{$angkatan_id}}">
                        @endif
                        <label for="" class="form-label">NIM</label>
                        <input name="nim" type="number" class="form-control" value="{{$dtm->nim}}" disabled>
                        <label for="" class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control" value="{{$dtm->name}}" required>
                        <label for=" kelas" class="form-label">Kelas</label>
                        <select name="kelas_id" id="kelas" class="form-select">
                            <option value="{{$dtm->kelas_id}}">{{$dtm->kelas}}</option>
                            @foreach ($get_kelas as $gl)
                            <option value="{{$gl->id}}">{{$gl->name}}</option>
                            @endforeach

                        </select>
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="{{$dtm->jenis_kelamin}}">{{$dtm->jenis_kelamin}}</option>

                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-select">
                            <option value="{{$dtm->agama}}">{{$dtm->agama}}</option>

                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>


                        </select>
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" type="text" class="form-control"> {{$dtm->alamat}}</textarea>

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
@endsection