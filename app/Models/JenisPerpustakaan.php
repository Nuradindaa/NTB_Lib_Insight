<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPerpustakaan extends Model
{
    protected $table = 'jenis_perpustakaan';

    protected $primaryKey = 'id_jenis';

    public $timestamps = false;
}