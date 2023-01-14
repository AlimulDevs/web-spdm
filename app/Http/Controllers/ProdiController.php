<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProdiController extends BaseController
{
    public function index()
    {
        $data_prodi = DB::table('tb_prodi')->get();
        return view('prodi.index', compact("data_prodi"));
    }

    public function createIndex()
    {
        $data_prodi = DB::table('tb_prodi')->get();
        return view('prodi.create', compact("data_prodi"));
    }


    public function editIndex($id)
    {
        $data_prodi = DB::table('tb_prodi')->where("id", $id)->get();
        return view('prodi.edit', compact("data_prodi"));
    }


    public function create(Request $request)
    {
        $logo = $request->file('logo');
        if ($logo == null) {
            return redirect('/createIndex')->with("failed", "failed Create Data");
        }
        $nameLogo = time() . $logo->getClientOriginalName();
        if ($logo->getClientMimeType() == 'application/pdf') {
            return redirect('/createIndex')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'logo-prodi';

        // upload file
        $logo->move($tujuan_upload, $nameLogo);
        $nameLogo = url('/logo-prodi/' . $nameLogo);

        DB::table('tb_prodi')->insert([
            "name" => strtoupper($request->name),
            "kepala_prodi" => strtoupper($request->kepala_prodi),
            "logo" => $nameLogo,
        ]);
        return redirect('/prodi-index')->with("success_create", "Berhasil Menambahkan Data");
    }


    public function delete($id)
    {

        $data = DB::table("tb_prodi")->where("id", $id)->first();
        $baseUrl     = url('/');

        $delfil = str_replace($baseUrl, "", $data->logo);
        File::delete($delfil);
        DB::table("tb_prodi")->where("id", $id)->delete();

        return redirect("/prodi-index",)->with("success_delete", "Berhasil Menghapus Data");
    }
}
