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

            $table->integer('id_akreditasi');

            $table->string('nama_perpustakaan');

            $table->string('akreditasi_lama');

            $table->string('akreditasi_baru');

            $table->year('tahun_terbit');

            $table->year('tahun_berakhir');

            $table->string('dokumen_bukti');

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
