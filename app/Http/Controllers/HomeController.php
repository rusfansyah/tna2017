<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;
use App\Diklatikut;
use App\Diklatbutuh;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_guru=Guru::all()->count();
        $jumlah_mapel=Mapel::all()->count();
        $jumlah_ikut=Diklatikut::all()->count();
        $jumlah_butuh=Diklatbutuh::all()->count();
        // dd($jumlah_guru);
        return view('home',['jumlah_guru'=>$jumlah_guru,'jumlah_mapel'=>$jumlah_mapel,'jumlah_ikut'=>$jumlah_ikut,'jumlah_butuh'=>$jumlah_butuh]);
    }
}
