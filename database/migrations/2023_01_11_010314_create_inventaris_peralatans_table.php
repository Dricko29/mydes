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
        Schema::create('inventaris_peralatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_peralatan_id')->constrained('inv_kategori_peralatans');
            $table->foreignId('pengguna_barang_id')->constrained('inv_pengguna_barangs');
            $table->foreignId('asal_id')->constrained('inv_asals');
            $table->string('nama')->nullable();
            $table->string('kode')->unique();
            $table->string('no_register')->unique();
            $table->string('merk')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('bahan')->nullable();
            $table->string('no_pabrik')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('no_polisi')->nullable();
            $table->string('bpkb')->nullable();
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
        Schema::dropIfExists('inventaris_peralatans');
    }
};