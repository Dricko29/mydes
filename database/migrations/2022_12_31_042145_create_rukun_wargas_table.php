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
        Schema::create('rukun_wargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dusuns_id')->constrained();
            $table->string('nama_rw');
            $table->string('kode_rw')->unique();
            $table->string('nama_krw');
            $table->string('nik_krw')->unique();
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
        Schema::dropIfExists('rukun_wargas');
    }
};