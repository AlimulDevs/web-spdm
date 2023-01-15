<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AngkatanController extends Controller
{

    public function index()
    {
        $data_angkatan = DB::table("tb_angkatan")->orderBy('tahun', 'asc')->get();

        return view('angkatan.index', compact("data_angkatan"));
    }
    public function create(Request $request)
    {
        DB::table("tb_angkatan")->insert([
            "tahun" => $request->tahun,
            "jumlah_kelas" => $request->jumlah_kelas,
        ]);

        return redirect('/angkatan-index',)->with("success_add", "Berhasil Menambahkan Data");
    }
    public function edit(Request $request)
    {
        DB::table("tb_angkatan")->where("id", $request->id)->update([
            "tahun" => $request->tahun,
            "jumlah_kelas" => $request->jumlah_kelas,
        ]);

        return redirect('/angkatan-index',)->with("success_edit", "Berhasil Mengubah Data");
    }
    public function delete($id)
    {
        $get_mahasiswa = DB::table("tb_mahasiswa")->get();

        foreach ($get_mahasiswa as $gm) {
            DB::table('tb_profil_mahasiswa')->where("mahasiswa_id", $gm->id)->delete();
        }


        DB::table("tb_mahasiswa")->where("angkatan_id", $id)->delete();
        DB::table("tb_angkatan")->where("id", $id)->delete();

        return redirect('/angkatan-index',)->with("success_delete", "Berhasil Menghapus Data");
    }


    public function viewIndex($prodi_id, $angkatan_id)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "anda belum login");
        }
        $get_angkatan = DB::table("tb_angkatan")->where("id", $angkatan_id)->first();

        $get_mahasiswa = DB::table("tb_mahasiswa")->where("prodi_id", $prodi_id)->where("angkatan_id", $angkatan_id)->first();
        $get_kelas = DB::table("tb_kelas")->take($get_angkatan->jumlah_kelas)->get();

        $data_mahasiswa = DB::table("tb_mahasiswa")->where("prodi_id", "=", $prodi_id)->where("angkatan_id", "=", $angkatan_id)

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
            )->get();

        return view('mahasiswa.index', compact("data_mahasiswa", "prodi_id", "angkatan_id", "get_kelas"));
    }


    public function deleteMahasiswa($id)
    {
        $getMahasiswa = DB::table("tb_mahasiswa")->where("id", $id)->first();

        DB::table("tb_profil_mahasiswa")->where("mahasiswa_id", $id)->delete();
        DB::table("tb_mahasiswa")->where("id", $id)->delete();

        return redirect("/angkatan-viewIndex/$getMahasiswa->prodi_id/$getMahasiswa->angkatan_id");
    }



    public function createMahasiswa(Request $request)
    {

        $validate_mahasiswa = DB::table("tb_mahasiswa")->where("nim", $request->nim)->first();

        if ($validate_mahasiswa != null) {
            return redirect("/angkatan-viewIndex/$request->prodi_id/$request->angkatan_id")->with("failed_add", "Gagal Menambahkan Data, NIM sudah ada");
        }

        DB::table("tb_mahasiswa")->insert([
            "nim" => $request->nim,
            "prodi_id" => $request->prodi_id,
            "angkatan_id" => $request->angkatan_id,
            "kelas_id" => $request->kelas_id,

        ]);
        $get_mahasiswa = DB::table('tb_mahasiswa')->get()->last();
        DB::table("tb_profil_mahasiswa")->insert([
            "mahasiswa_id" => $get_mahasiswa->id,
            "name" => $request->name,
            "jenis_kelamin" => $request->jenis_kelamin,
            "agama" => $request->agama,
            "alamat" => $request->alamat,


        ]);

        return redirect("/angkatan-viewIndex/$request->prodi_id/$request->angkatan_id")->with("success_add", "Berhasil Menambahkan Data");
    }
    public function editMahasiswa(Request $request)
    {



        DB::table("tb_mahasiswa")->where("id", $request->id)->update([

            "kelas_id" => $request->kelas_id,

        ]);

        DB::table("tb_profil_mahasiswa")->where("mahasiswa_id", $request->id)->update([

            "name" => $request->name,
            "jenis_kelamin" => $request->jenis_kelamin,
            "agama" => $request->agama,
            "alamat" => $request->alamat,


        ]);

        return redirect("/angkatan-viewIndex/$request->prodi_id/$request->angkatan_id")->with("success_edit", "Berhasil Mengubah Data");
    }
}
