<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_penduduk_matis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained();
            $table->string('tempat_kematian');
            $table->time('waktu_kematian')->nullable();
            $table->string('penyebab_kematian');
            $table->string('penerang_kematian');
            $table->string('anak_ke')->nullable();
            $table->string('no_akta_kematian')->nullable();
            $table->date('tanggal_peristiwa');
            $table->date('tanggal_lapor');
            $table->text('ket');
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_penduduk_matis');
    }
};