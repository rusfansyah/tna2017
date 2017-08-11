<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detiltna;
use App\Kategoritna;
class DetiltnaController extends Controller
{
    //
    public function index()
    {
      $detiltna = Detiltna::paginate(8);
      return view('detil_tna/home',['detiltnas'=>$detiltna]);
    }
    public function create(){
      $kategoritna=Kategoritna::all();
      return view('/detil_tna/create',['kategoritna'=>$kategoritna]);
    }

    public function store(Request $request){
      $this->validate($request,[
        'detil_tna'              =>  'required',
        'kategori_tna_id'        =>  'required'

      ]);
      $detiltna=new Detiltna;
      $detiltna->detil_tna               = $request->detil_tna;
      $detiltna->kategori_tna_id         = $request->kategori_tna_id;
      $detiltna->save();
      // $detiltna=Guru::find($guru->id);
      // dd($gurus);
      return redirect('/detil_tna')->with('alert', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
      $detiltna=Detiltna::find($id);
      $kategoritna=Kategoritna::all();
      return view('detil_tna/edit',['detiltna'=>$detiltna,'kategoritna'=>$kategoritna]);
    }

    public function update(Request $request,$id){
      $detiltna=Detiltna::find($id);
      $detiltna->detil_tna               = $request->detil_tna;
      $detiltna->kategori_tna_id         = $request->kategori_tna_id;
      $detiltna->save();
      return redirect('/detil_tna')->with('alert', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
      $detiltna=Detiltna::find($id);
      $detiltna->delete();
      return redirect('/detil_tna')->with('alert', 'Data berhasil dihapus!');
    }
}
