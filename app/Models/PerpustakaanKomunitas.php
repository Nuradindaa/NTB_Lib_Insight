<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;

class PerpustakaanKomunitas extends Model
{
    protected $table = 'perpustakaan_komunitas';

    protected $fillable = [
        'nama_perpustakaan',
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