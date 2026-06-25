<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_akun', function (Blueprint $table) {

            $table->id();

            $table->string('nama_perpustakaan');
            $table->unsignedBigInteger('id_jenis')->nullable();
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis_perpustakaan')->nullOnDelete();
            $table->unsignedBigInteger('id_kabupaten')->nullable();
            $table->foreign('id_kabupaten')->references('id_kabupaten')->on('kabupaten')->nullOnDelete();

            $table->string('nama_pengelola');
            $table->string('email');
            $table->string('no_hp');

            $table->text('alasan')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_akun');
    }
};