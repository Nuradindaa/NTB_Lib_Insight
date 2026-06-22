<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';

    protected $primaryKey = 'id_kabupaten';

    public $timestamps = false;

    public function perpustakaanSekolah()
{
    return $this->hasMany(
        PerpustakaanSekolah::class,
        'id_kabupaten',
        'id_kabupaten'
    );
}
}