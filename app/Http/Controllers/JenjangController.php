<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;
class JenjangController extends Controller
{
  public function index()
  {
    $jenjangs=Jenjang::all();
    //dd($jenjangs);
    // $jenjangs = Jenjang::paginate(8);
    // dd($jenjangs);
    return view('jenjang/home',['jenjangs'=>$jenjangs]);
  }

  public function create(){
    return view('/jenjang/create');
  }

  public function store(Request $request){
    $this->validate($request,[
    'jenjang_sekolah' =>  'required'

    ]);
    $jenjang=new Jenjang;
    $jenjang->jenjang_sekolah = $request->jenjang_sekolah;
    $jenjang->save();
    return redirect('/jenjang')->with('alert', 'Data berhasil ditambahkan!');
  }

  public function edit($id)
  {
    $jenjang=Jenjang::find($id);
    return view('jenjang/edit',['jenjang'=>$jenjang]);
  }

  public function show($id){
    $jenjang=jenjang::find($id);
    return view('jenjang/single',['jenjang'=>$jenjang]);
  }

  public function update(Request $request,$id){
    $jenjang=Jenjang::find($id);
    $jenjang->jenjang_sekolah = $request->jenjang_sekolah;
    $jenjang->save();
    return redirect('/jenjang')->with('alert', 'Data berhasil diubah!');
  }

  public function delete($id)
  {
    $jenjang=jenjang::find($id);
    $jenjang->delete();
    return redirect('/jenjang')->with('alert', 'Data berhasil dihapus!');
  }
}
