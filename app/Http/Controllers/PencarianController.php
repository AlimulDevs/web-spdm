<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PencarianController extends Controller
{
    public function index()
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }
        $get_kelas = DB::table("tb_kelas")->get();
        $get_prodi = DB::table("tb_prodi")->get();
        $get_angkatan = DB::table("tb_angkatan")->get();

        return view('pencarian', compact("get_kelas", "get_prodi", "get_angkatan"));
    }

    public function pencarian1(Request $request)
    {
        $data_mahasiswa = DB::table("tb_mahasiswa")
            ->join("tb_prodi", "tb_mahasiswa.prodi_id", "=", "tb_prodi.id")
            ->join("tb_profil_mahasiswa", "tb_mahasiswa.id", "=", "tb_profil_mahasiswa.mahasiswa_id")
            ->join("tb_angkatan", "tb_mahasiswa.angkatan_id", "=", "tb_angkatan.id")
            ->join("tb_kelas", "tb_mahasiswa.kelas_id", "=", "tb_kelas.id")
            ->select(
                "tb_prodi.name as prodi",
                "tb_mahasiswa.nim as nim",
                "tb_mahasiswa.id as id",
                "tb_profil_mahasiswa.name as name",
                "tb_profil_mahasiswa.jenis_kelamin as jenis_kelamin",
                "tb_profil_mahasiswa.agama as agama",
                "tb_profil_mahasiswa.alamat as alamat",
                "tb_kelas.name as kelas",
                "tb_kelas.id as kelas_id",
                "tb_angkatan.tahun as angkatan"
            )->where("kelas_id", $request->kelas)
            ->where("prodi_id", $request->prodi)
            ->where("angkatan_id", $request->angkatan)->get();

        $get_kelas = DB::table("tb_kelas")->get();
        $get_prodi = DB::table("tb_prodi")->get();
        $get_angkatan = DB::table("tb_angkatan")->get();

        return view("pencarian", compact("data_mahasiswa", "get_kelas", "get_prodi", "get_angkatan"));
    }
    public function pencarian2(Request $request)
    {
        $data_mahasiswa = DB::table("tb_mahasiswa")
            ->join("tb_prodi", "tb_mahasiswa.prodi_id", "=", "tb_prodi.id")
            ->join("tb_profil_mahasiswa", "tb_mahasiswa.id", "=", "tb_profil_mahasiswa.mahasiswa_id")
            ->join("tb_angkatan", "tb_mahasiswa.angkatan_id", "=", "tb_angkatan.id")
            ->join("tb_kelas", "tb_mahasiswa.kelas_id", "=", "tb_kelas.id")
            ->select(
                "tb_prodi.name as prodi",
                "tb_mahasiswa.nim as nim",
                "tb_mahasiswa.id as id",
                "tb_profil_mahasiswa.name as name",
                "tb_profil_mahasiswa.jenis_kelamin as jenis_kelamin",
                "tb_profil_mahasiswa.agama as agama",
                "tb_profil_mahasiswa.alamat as alamat",
                "tb_kelas.name as kelas",
                "tb_kelas.id as kelas_id",
                "tb_angkatan.tahun as angkatan"
            )->where("tb_profil_mahasiswa.name", "like", "%" . $request->name . "%")
            ->get();

        $get_kelas = DB::table("tb_kelas")->get();
        $get_prodi = DB::table("tb_prodi")->get();
        $get_angkatan = DB::table("tb_angkatan")->get();

        return view("pencarian", compact("data_mahasiswa", "get_kelas", "get_prodi", "get_angkatan"));
    }
}
