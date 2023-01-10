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
        Schema::create('rukun_tetanggas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rukun_wargas_id')->constrained();
            $table->string('nama_rt');
            $table->string('kode_rt')->unique();
            $table->string('nama_krt');
            $table->string('nik_krt')->unique();
            $table->foreignId('attr_kelamins_id')->constrained();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rukun_tetanggas');
    }
};