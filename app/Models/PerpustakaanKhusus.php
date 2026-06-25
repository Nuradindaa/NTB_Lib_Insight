<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;

class PerpustakaanKhusus extends Model
{
    protected $table = 'perpustakaan_khusus';

    protected $fillable = [
        'nama_perpustakaan',
        'nomor_pokok',
        'lembaga_induk',
        'subjenis',
        'alamat',
        'id_kabupaten',
        'id_kecamatan',
        'id_kelurahan',
        'nomor',
        'jumlah_per_kabupaten',
        'desa_kelurahan',
        'kecamatan',
    ];

    public $timestamps = false;

    public function kabupaten()
    {
        return $this->belongsTo(
            Kabupaten::class,
            'id_kabupaten',
            'id_kabupaten'
        );
    }
}