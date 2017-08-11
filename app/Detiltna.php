<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
class Detiltna extends Model
{
    //
    protected $table= 'detil_tna';
    public $timestamps = false;

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function kategori_tna()
    {
        return $this->belongsTo(Kategoritna::class);
    }
}
