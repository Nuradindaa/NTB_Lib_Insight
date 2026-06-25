<?php

namespace App\Models;

use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;

class PengajuanAkun extends Model
{
    protected $table = 'pengajuan_akun';

    protected $fillable = [
        'perpustakaan_id',
        'id_jenis',
        'id_kabupaten',
        'nama_perpustakaan',
        'nama_pengelola',
        'email',
        'no_hp',
        'alasan',
        'status',
        'status_akun',
        'jenis_perpustakaan',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(
            Kabupaten::class,
            'id_kabupaten',
            'id_kabupaten'
        );
    }
}