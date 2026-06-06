<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkreditasiPerpustakaan extends Model
{
    protected $table = 'akreditasi_perpustakaan';

    protected $primaryKey = 'id_akreditasi';

    public $timestamps = false;

    protected $guarded = [];
}