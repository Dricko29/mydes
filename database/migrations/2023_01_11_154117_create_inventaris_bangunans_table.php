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
        Schema::create('inventaris_bangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_bangunan_id')->constrained('inv_kategori_bangunans');
            $table->foreignId('kondisi_bangunan_id')->constrained('inv_kondisi_bangunans');
            $table->foreignId('status_tanah_id')->constrained('inv_status_tanahs');
            $table->foreignId('pengguna_barang_id')->constrained('inv_pengguna_barangs');
            $table->foreignId('asal_id')->constrained('inv_asals');
            $table->string('nama')->nullable();
            $table->string('kode')->unique();
            $table->string('no_register')->unique();
            $table->string('bertingkat');
            $table->integer('luas_bangunan');
            $table->integer('luas_tanah');
            $table->string('kode_tanah');
            $table->year('tahun');
            $table->string('no_bangunan')->nullable();
            $table->date('tanggal_dokumen_bangunan')->nullable();
            $table->bigInteger('harga');
            $table->text('lokasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('beton')->default(1);
            $table->boolean('status')->default(1);
            $table->boolean('lihat')->default(1);
            $table->integer('serial')->nullable();
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
        Schema::dropIfExists('inventaris_bangunans');
    }
};