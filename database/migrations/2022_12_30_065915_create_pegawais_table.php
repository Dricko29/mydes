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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('nipd')->nullable()->unique();
            $table->string('nip')->nullable()->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->foreignId('attr_kelamin_id')->constrained();
            $table->foreignId('attr_pendidikan_keluarga_id')->constrained();
            $table->foreignId('attr_agama_id')->constrained();
            $table->foreignId('jabatan_id')->constrained();
            $table->string('no_skp')->nullable();
            $table->date('tanggal_skp')->nullable();
            $table->string('no_skb')->nullable();
            $table->date('tanggal_skb')->nullable();
            $table->string('masa_jabatan');
            $table->boolean('status')->default(1);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
};