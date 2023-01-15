@extends('template.index')

@section('content')



<div class="container">
    <h2 class="text-center display-4">PENCARIAN DATA</h2>
    <form action="/pencarian-1" method="get">
        @csrf
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row ml-5 mt-2">

                    <div class="col-3">
                        <div class="form-group">
                            <label>Prodi</label>
                            <select class="form-select" style="width: 100%;" name="prodi">
                                <option value="">--Pilih Prodi--</option>
                                @foreach ($get_prodi as $gp)
                                <option value="{{$gp->id}}">{{$gp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Angkatan</label>
                            <select class="form-select" style="width: 100%;" name="angkatan">
                                <option value="">--Pilih Angkatan--</option>
                                @foreach ($get_angkatan as $ga)
                                <option value="{{$ga->id}}">{{$ga->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-select" style="width: 100%;" name="kelas">
                                <option value="">--Pilih Kelas--</option>
                                @foreach ($get_kelas as $gk)
                                <option value="{{$gk->id}}">{{$gk->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group ml-auto">

                            <button type="submit" class="btn btn-primary " style="margin-top: 30px;"> <i class="fas fa-search"></i> </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </form>
    <form action="pencarian-2" method="get">
        @csrf
        <div class="row ml-5 mt-2">
            <div class="col-8 ml-5">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary " style="margin-top: 30px;"> <i class="fas fa-search"></i> </button>
            </div>
        </div>

    </form>

</div>
@if (request()->is('pencarian-1'))


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
                        <a href="/angkatan-deleteMahasiswa/{{$dtm->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>


                @endforeach
            </tbody>

        </table>
    </div>
</div>
@elseif(request()->is('pencarian-2'))

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
                        <a href="/angkatan-deleteMahasiswa/{{$dtm->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>


                @endforeach
            </tbody>

        </table>
    </div>
</div>
@else
@endif
@endsection