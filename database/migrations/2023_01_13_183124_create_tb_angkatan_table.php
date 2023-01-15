<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAngkatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_angkatan', function (Blueprint $table) {
            $table->id();
            $table->integer("tahun")->nullable();
            $table->integer("jumlah_kelas")->nullable();
            $table->bigInteger("angkatan")->index();
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
        Schema::dropIfExists('tb_angkatan');
    }
}
