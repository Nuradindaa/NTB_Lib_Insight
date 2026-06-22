<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerpustakaanKomunitas extends Model
{
    protected $table = 'perpustakaan_komunitas';

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