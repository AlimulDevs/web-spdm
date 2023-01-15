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
            <form action="/prodi-create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Name Prodi</label>
                    </div>
                    <div class="col-8"><input name="name" class="form-control" type="text" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Kepala Prodi</label>
                    </div>
                    <div class="col-8"><input name="kepala_prodi" class="form-control" type="text" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <label for="" class="form-label">Logo Prodi</label>
                    </div>
                    <div class="col-8"><input name="logo" class="form-control" type="file" required></div>
                </div>
                <div class="mt-3 ml-auto ">
                    <input type="submit" class="btn btn-success" value="Tambah Data">
                </div>
            </form>
        </div>
    </div>

</div>

</div>
@endsection