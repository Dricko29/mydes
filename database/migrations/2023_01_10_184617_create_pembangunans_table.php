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
        Schema::create('pembangunans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('volume');
            $table->string('waktu')->nullable();
            $table->foreignId('sumber_dana_id')->nullable()->constrained();
            $table->string('tahun_anggaran')->nullable();
            $table->bigInteger('sb_pemerintah')->nullable()->default(0);
            $table->bigInteger('sb_provinsi')->nullable()->default(0);
            $table->bigInteger('sb_kab_kot')->nullable()->default(0);
            $table->bigInteger('sb_swadaya')->nullable()->default(0);
            $table->bigInteger('anggaran')->default(0);
            $table->tinyInteger('sifat')->default(1);
            $table->string('pelaksana')->nullable();
            $table->text('lokasi');
            $table->text('manfaat')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('pembangunans');
    }
};