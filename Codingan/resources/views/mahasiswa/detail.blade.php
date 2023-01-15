@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DETAIL DATA MAHASISWA</h3>


    <div class="card  center-auto justify-content-center">
        <div class="card-header">
            <div class="text-right">

            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    @foreach ($data_mahasiswa as $dtm)


                    <tr>
                        <th>Name</th>
                        <th>:</th>
                        <th>{{$dtm->name}}</th>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <th>:</th>
                        <th>{{$dtm->nim}}</th>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>:</th>
                        <th>{{$dtm->jenis_kelamin}}</th>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <th>:</th>
                        <th>{{$dtm->agama}}</th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <th>{{$dtm->alamat}}</th>
                    </tr>
                    <tr>
                        <th>Prodi</th>
                        <th>:</th>
                        <th>{{$dtm->prodi}}</th>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <th>:</th>
                        <th>{{$dtm->angkatan}}</th>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <th>{{$dtm->kelas}}</th>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>
@endsection