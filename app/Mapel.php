<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
use App\Mapel;
class Mapel extends Model
{
    //
    protected $table= 'mapel';
    public $timestamps = false;
}
