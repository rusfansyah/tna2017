<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Jenjang;
use App\Mapel;
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
}
