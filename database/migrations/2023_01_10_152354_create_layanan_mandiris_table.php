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
        Schema::create('layanan_mandiris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('no_keluarga');
            $table->string('email')->unique();
            $table->string('no_tlp')->unique();
            $table->string('password');
            $table->text('dokumen')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('layanan_mandiris');
    }
};