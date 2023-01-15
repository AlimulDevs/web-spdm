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
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }
        $data_prodi = DB::table('tb_prodi')->get();
        return view('prodi.index', compact("data_prodi"));
    }
    public function prodiByID($id)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }
        $data_prodi = DB::table('tb_prodi')->where("id", $id)->first();
        $data_angkatan = DB::table('tb_angkatan')->get();
        return view('prodi.prodi', compact("data_prodi", "data_angkatan"));
    }

    public function createIndex()
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }
        $data_prodi = DB::table('tb_prodi')->get();
        return view('prodi.create', compact("data_prodi"));
    }


    public function editIndex($id)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }
        $data_prodi = DB::table('tb_prodi')->where("id", $id)->get();
        return view('prodi.edit', compact("data_prodi"));
    }


    public function create(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }


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
        $nameLogo = url("/" . $tujuan_upload . "/" . $nameLogo);


        DB::table('tb_prodi')->insert([
            "name" => strtoupper($request->name),
            "kepala_prodi" => strtoupper($request->kepala_prodi),
            "logo" => $nameLogo,
        ]);
        return redirect('/prodi-index')->with("success_create", "Berhasil Menambahkan Data");
    }

    public function edit(Request $request)
    {

        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }

        $data_prodi = DB::table("tb_prodi")->where("id", $request->id)->first();
        $basePath = url('/');
        $delfil = str_replace("$basePath/", "", $data_prodi->logo);


        $logo = $request->file('logo');
        if ($logo == null) {
            DB::table('tb_prodi')->where("id", $request->id)->update([
                "name" => strtoupper($request->name),
                "kepala_prodi" => strtoupper($request->kepala_prodi),

            ]);
            return redirect('/prodi-index')->with("success_edit", "Berhasil Mengubah Data");
        }

        File::delete($delfil);
        $nameLogo = time() . $logo->getClientOriginalName();
        if ($logo->getClientMimeType() == 'application/pdf') {
            return redirect('/createIndex')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'logo-prodi';

        // upload file
        $logo->move($tujuan_upload, $nameLogo);
        $nameLogo = url("/" . $tujuan_upload . "/" . $nameLogo);

        DB::table('tb_prodi')->where("id", $request->id)->update([
            "name" => strtoupper($request->name),
            "kepala_prodi" => strtoupper($request->kepala_prodi),
            "logo" => $nameLogo,
        ]);
        return redirect('/prodi-index')->with("success_edit", "Berhasil Menambahkan Data");
    }


    public function delete($id)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }

        $data = DB::table("tb_prodi")->where("id", $id)->first();
        $basePath = url('/');
        $delfil = str_replace("$basePath/", "", $data->logo);
        File::delete($delfil);
        DB::table("tb_prodi")->where("id", $id)->delete();

        return redirect("/prodi-index",)->with("success_delete", "Berhasil Menghapus Data");
    }
}
