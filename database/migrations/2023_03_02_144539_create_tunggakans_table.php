<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunggakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunggakans', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('nama_siswa');
            $table->string('nama_kelas');
            $table->string('bulan');
            $table->string('total_tunggakan');
            $table->string('sisa_tunggakan');
            $table->string('sisa_bulan');
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
        Schema::dropIfExists('tunggakans');
    }
}
