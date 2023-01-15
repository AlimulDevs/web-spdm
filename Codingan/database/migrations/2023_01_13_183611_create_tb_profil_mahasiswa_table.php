<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProfilMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profil_mahasiswa', function (Blueprint $table) {
            $table->id()->unsigned(false);
            $table->string("name")->nullable();
            $table->string("jenis_kelamin")->nullable();
            $table->string("agama")->nullable();
            $table->string("alamat")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_profil_mahasiswa');
    }
}
