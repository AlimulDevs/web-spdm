@extends('template.index')

@section('content')



<div class="container">
    <h3 class="text-center text-secondary">DATA PRODI</h3>


    <div class="card  center-auto justify-content-center">
        <div class="card-header">
            <div class="text-right">
                <a href="/prodi-index" class="btn btn-primary text-auto"><i class="fas fa-eye"></i> Lihat Data</a>
            </div>
        </div>
        <div class="card-body">
            <form action="/prodi-edit" method="post" enctype="multipart/form-data">
                @foreach ($data_prodi as $dp)


                @csrf
                <input type="hidden" value="{{$dp->id}}" name="id">
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Name Prodi</label>
                    </div>
                    <div class="col-8"><input value="{{$dp->name}}" name="name" class="form-control" type="text" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Kepala Prodi</label>
                    </div>
                    <div class="col-8"><input value="{{$dp->kepala_prodi}}" name="kepala_prodi" class="form-control" type="text" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Logo Prodi</label>
                    </div>
                    <div class="col-2">
                        <img src="{{$dp->logo}}" width="100px" alt="">
                    </div>
                    <div class="col-6"><input name="logo" class="form-control" type="file"></div>
                </div>
                <div class="mt-3 ml-auto ">
                    <input type="submit" class="btn btn-warning text-white" value="Edit Data">
                </div>
            </form>
            @endforeach
        </div>
    </div>

</div>

</div>
@endsection