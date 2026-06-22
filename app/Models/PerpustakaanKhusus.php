<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerpustakaanKhusus extends Model
{
    protected $table = 'perpustakaan_khusus';

    protected $guarded = [];

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