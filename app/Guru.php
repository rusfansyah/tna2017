<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Jenjang;
use App\Mapel;
use App\Diklatikut;
use App\Diklatbutuh;
use App\Hasiltna;
class Guru extends Authenticatable
{
    //
    protected $table= 'guru';
    public $timestamps = false;

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function diklat_ikut()
    {
        return $this->hasMany(Diklatikut::class);
    }

    public function diklat_butuh()
    {
        return $this->hasMany(Diklatbutuh::class);
    }

    public function hasil_tna()
    {
        return $this->hasMany(Hasiltna::class);
    }
}
