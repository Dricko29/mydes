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
        Schema::create('log_penduduk_pindahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained();
            $table->date('tanggal_peristiwa');
            $table->date('tanggal_lapor');
            $table->string('tujuan_pindah');
            $table->text('alamat_tujuan');
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
        Schema::dropIfExists('log_penduduk_pindahs');
    }
};