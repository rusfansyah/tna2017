<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
use App\Detiltna;
class Jenjang extends Model
{
    //
    protected $table= 'jenjang';
    public $timestamps = false;

    public function kategori_tna()
    {
        return $this->hasMany(Kategoritna::class);
    }
}
