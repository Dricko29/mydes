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
        Schema::create('inventaris_asset_tetaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_asset_id')->constrained('inv_kategori_assets');
            $table->foreignId('asal_id')->constrained('inv_asals');
            $table->foreignId('jenis_asset_id')->constrained('inv_jenis_assets');
            $table->string('nama')->nullable();
            $table->string('kode')->unique();
            $table->string('no_register')->unique();
            $table->string('judul_buku')->nullable();
            $table->string('spesifikasi_buku')->nullable();
            $table->string('asal_daerah')->nullable();
            $table->string('pencipta')->nullable();
            $table->string('jenis_hewan')->nullable();
            $table->string('ukuran_hewan')->nullable();
            $table->string('jenis_tumbuhan')->nullable();
            $table->string('ukuran_tumbuhan')->nullable();
            $table->integer('jumlah');
            $table->year('tahun');
            $table->bigInteger('harga');
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
        Schema::dropIfExists('inventaris_asset_tetaps');
    }
};