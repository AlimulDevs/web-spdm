@extends('template.index')

@section('content')



<div class="container">
    <a href="/" class="text-dark"><i class="fas fa-arrow-left "></i> Kembali</a>
    <div class="text-center">
        <img class="bg-primary" src="{{$data_prodi->logo}}" alt="" width="100px" height="100px">
        <h3 class="r text-secondary">{{$data_prodi->name}}</h3>
    </div>

    <div class="text-right">

    </div>

    <div class="row mt-3 p-5">

        @foreach ($data_angkatan as $da)

        <a href="/angkatan-viewIndex/{{$data_prodi->id}}/{{$da->id}}" class="">
            <div class="card d-flex justify-content-center" style="height: 80px;">
                <div class="row ms-3 mt-3">

                    <div class="col-1 card d-flex justify-content-center align-items-center bg-primary" style="height: 60px;"> <i class="fas fa-users fa-2x"></i></div>
                    <div class="col text-start">
                        <div class="row-1">
                            <div class="col text-bold text-black">Angkatan Tahun{{$da->tahun}}</div>
                            <div class="col text-bold text-black">{{$da->jumlah_kelas}} Kelas</div>
                        </div>
                    </div>
                    <div class="col-1 d-flex  align-items-center mb-3 mr-auto">
                        <i class="fas fa-arrow-right fa-3x"></i>
                    </div>
                </div>
            </div>
        </a>



        @endforeach



    </div>

</div>

</div>
@endsection