<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
use App\Detiltna;
class Kategoritna extends Model
{
    //
    protected $table= 'kategori_tna';
    public $timestamps = false;

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
    public function detil_tna()
    {
        return $this->hasMany(Detiltna::class);
    }
}
