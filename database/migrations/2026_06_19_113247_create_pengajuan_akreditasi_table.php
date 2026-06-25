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
        Schema::create('pengajuan_akreditasi', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            $table->unsignedBigInteger('id_akreditasi')->nullable();
            $table->foreign('id_akreditasi')->references('id_akreditasi')->on('akreditasi_perpustakaan')->nullOnDelete();

            $table->string('nama_perpustakaan');

            $table->string('akreditasi_lama')->nullable();

            $table->string('akreditasi_baru');

            $table->year('tahun_terbit');

            $table->year('tahun_berakhir');

            $table->string('dokumen_bukti')->nullable();

            $table->text('keterangan')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_akreditasi');
    }
};
