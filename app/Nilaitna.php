<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
use App\Mapel;
use App\Nilaitna;
class Nilaitna extends Model
{
    //
    protected $table= 'nilai_tna';
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kategori_tna()
    {
        return $this->belongsTo(Kategoritna::class);
    }
}
