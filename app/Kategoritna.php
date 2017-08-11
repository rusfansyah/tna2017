<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
class Kategoritna extends Model
{
    //
    protected $table= 'kategori_tna';
    public $timestamps = false;

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}
