<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_gaji', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('karyawan_id')->unsigned();
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('gaji_pokok')->default('0');
            $table->bigInteger('transportasi')->default('0');
            $table->bigInteger('uang_makan')->default('0');
            $table->bigInteger('potongan')->default('0');
            $table->bigInteger('total_gaji')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_gaji');
    }
};
