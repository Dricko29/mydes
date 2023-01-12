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
        Schema::create('inventaris_tanahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_tanah_id')->constrained('inv_kategori_tanahs');
            $table->foreignId('hak_tanah_id')->constrained('inv_hak_tanahs');
            $table->foreignId('penggunaan_id')->constrained('inv_penggunaans');
            $table->foreignId('pengguna_barang_id')->constrained('inv_pengguna_barangs');
            $table->foreignId('asal_id')->constrained('inv_asals');
            $table->string('nama')->nullable();
            $table->string('kode')->unique();
            $table->string('no_register')->unique();
            $table->integer('luas');
            $table->year('tahun');
            $table->string('no_sertifikat')->nullable();
            $table->date('tanggal_sertifikat')->nullable();
            $table->bigInteger('harga');
            $table->text('alamat')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('inventaris_tanahs');
    }
};