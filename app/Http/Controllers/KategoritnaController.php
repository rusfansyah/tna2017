<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
class KategoritnaController extends Controller
{
    //
    public function index()
    {
      $kategoritna = Kategoritna::paginate(8);
      return view('kategori_tna/home',['kategoritnas'=>$kategoritna]);
  }
  public function create(){
    $kategoritna=Kategoritna::all();
    $jenjang=Jenjang::all();
    return view('/kategori_tna/create',['kategoritnas'=>$kategoritna],['jenjang'=>$jenjang]);
  }

  public function store(Request $request){
    $this->validate($request,[
      'kategori_tna'       =>  'required|unique:kategori_tna,kategori_tna,NULL,id,jenjang_id,' . $request->jenjang_id,
      'jenjang_id'         =>  'required'
    ]);

    $kategoritna=new Kategoritna;
    $kategoritna->kategori_tna    = $request->kategori_tna;
    $kategoritna->jenjang_id      = $request->jenjang_id;
    $kategoritna->save();
    return redirect('/kategori_tna')->with('alert', 'Berhasil ditambahkan!');
  }

  public function show($id){
    $kategoritna=Kategoritna::find($id);
    $jenjang=Jenjang::all();
    return view('kategori_tna/single',['kategoritna'=>$kategoritna, 'jenjang'=>$jenjang]);
  }

  public function edit($id)
  {
    $kategoritna=Kategoritna::find($id);
    $jenjang=Jenjang::all();
    return view('kategori_tna/edit',['kategoritna'=>$kategoritna, 'jenjang'=>$jenjang]);
  }
  public function update(Request $request,$id){
    $kategoritna=Kategoritna::find($id);
    $kategoritna->kategori_tna  = $request->kategori_tna;
    $kategoritna->jenjang_id    = $request->jenjang_id;
    $kategoritna->save();
    return redirect('/kategori_tna')->with('alert', 'Data berhasil diubah!');
  }

  public function delete($id)
  {
    $kategoritna=Kategoritna::find($id);
    $kategoritna->delete();
    return redirect('/kategori_tna')->with('alert', 'Data berhasil dihapus!');
  }
}
