<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanAkreditasi extends Model
{
    protected $table = 'pengajuan_akreditasi';

    protected $fillable = [
        'user_id',
        'id_akreditasi',
        'nama_perpustakaan',
        'akreditasi_lama',
        'akreditasi_baru',
        'tahun_terbit',
        'tahun_berakhir',
        'dokumen_bukti',
        'keterangan',
        'status',
    ];
}