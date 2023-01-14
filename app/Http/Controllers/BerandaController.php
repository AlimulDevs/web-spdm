<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class BerandaController extends BaseController
{
    public function index()
    {
        $data_jurusan = DB::table('tb_prodi')->get();
        return view('beranda.index', compact("data_jurusan"));
    }
}
