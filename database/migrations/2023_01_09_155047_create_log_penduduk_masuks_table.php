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
        Schema::create('log_penduduk_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('log_penduduk_masuks');
    }
};