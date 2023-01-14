@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DATA JURUSAN</h3>
    <div class="text-right">

    </div>

    <div class="row mt-3">

        @foreach ($data_jurusan as $dj )


        <div class="col-md-3">
            <div class="card">
                <div class="card-body product-box">

                    <div class="product-images" align="center">
                        <img class="image" width="200" src="{{$dj->logo}}" />
                    </div>
                    <div class="mt-1">
                        <div class="label label-warning-light"><a href="" class="btn btn-warning btn-sm text-white btn-xs">Mahasiswa : 78</a></div>
                        <a target="_blank" href="" class="text-secondary text-bold">{{$dj->name}}</a>

                        <div class="small m-t-xs">
                            <p class="">Kepala Prodi : {{$dj->kepala_prodi}}</p>
                        </div>
                        <div class="">

                            <a target="_blank" href="" class="btn btn-sm btn-outline-success ">Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

</div>
@endsection