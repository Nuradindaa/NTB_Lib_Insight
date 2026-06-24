<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pengajuan_akun', function ($table) {

            $table->unsignedBigInteger('perpustakaan_id')->nullable();

            $table->string('jenis_perpustakaan')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_akun', function (Blueprint $table) {
            //
        });
    }
};
