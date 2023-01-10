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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->foreignId('keluarga_id')->nullable()->constrained();
            $table->string('no_keluarga_sebelumnya')->nullable();
            $table->foreignId('attr_kelamin_id')->constrained();
            $table->foreignId('attr_pendidikan_id')->nullable()->constrained();
            $table->foreignId('attr_pendidikan_keluarga_id')->constrained();
            $table->foreignId('attr_status_id')->constrained();
            $table->foreignId('attr_status_dasar_id')->nullable()->constrained();
            $table->foreignId('attr_agama_id')->constrained();
            $table->foreignId('attr_pekerjaan_id')->constrained();
            $table->foreignId('attr_hubungan_id')->constrained();
            $table->foreignId('attr_hubungan_keluarga_id')->nullable()->constrained();
            $table->foreignId('attr_status_kawin_id')->constrained();
            $table->foreignId('attr_suku_id')->constrained();
            $table->foreignId('attr_golongan_darah_id')->constrained();
            $table->foreignId('attr_warganegara_id')->constrained();
            $table->foreignId('attr_bahasa_id')->constrained();
            $table->string('alamat')->nullable();
            $table->foreignId('dusun_id')->constrained();
            $table->foreignId('rukun_warga_id')->constrained();
            $table->foreignId('rukun_tetangga_id')->constrained();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('ket')->nullable();
            $table->string('paspor')->nullable();
            $table->date('tanggal_paspor')->nullable();
            $table->string('kitas')->nullable();
            $table->string('foto')->nullable();
            $table->string('tlp')->nullable();
            $table->string('email')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_akta_kelahiran')->nullable();
            $table->time('waktu_kelahiran')->nullable();
            $table->string('tempat_dilahirkan')->nullable();
            $table->string('jenis_kelahiran')->nullable();
            $table->string('penolong_kelahiran')->nullable();
            $table->integer('berat_kelahiran')->nullable();
            $table->integer('panjang_kelahiran')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('no_akta_pernikahan')->nullable();
            $table->string('no_akta_perceraian')->nullable();
            $table->date('tanggal_pernikahan')->nullable();
            $table->date('tanggal_perceraian')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->date('tanggal_lapor')->nullable();
            $table->date('tanggal_masuk')->nullable();
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
        Schema::dropIfExists('penduduks');
    }
};