<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkreditasiPerpustakaan extends Model
{
    protected $table = 'akreditasi_perpustakaan';

    protected $primaryKey = 'id_akreditasi';

    public $timestamps = false;

    protected $fillable = [
        'id_kabupaten',
        'id_jenis',
        'nama_perpustakaan',
        'nilai_akreditasi',
        'tahun_terbit',
        'jangka_waktu',
        'tahun_berakhir',
        'status',
    ];
}