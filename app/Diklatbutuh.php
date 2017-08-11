<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
use App\Mapel;
use App\Diklatbutuh;
class Diklatbutuh extends Model
{
    //
    protected $table= 'diklat_butuh';
    public $timestamps = false;
}
