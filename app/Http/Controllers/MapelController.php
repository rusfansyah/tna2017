<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;
use App\Jenjang;
use App\Diklatikut;
use App\Diklatbutuh;
use App\Detiltna;
class MapelController extends Controller
{
  public function store( Request $request )
  {
    for($i = 0; $i < count($request->mapel); $i++)
    {
        $mapel            = new Mapel();
        $mapel->guru_id   = $request->guru_id;
        $mapel->mapel     = $request->mapel[$i];
        $mapel->save();
    }
    for($i = 0; $i < count($request->diklat_ikut); $i++)
    {
        $diklat_ikut              = new Diklatikut();
        $diklat_ikut->guru_id     = $request->guru_id;
        $diklat_ikut->diklat_ikut = $request->diklat_ikut[$i];
        $diklat_ikut->save();
    }
    for($i = 0; $i < count($request->diklat_butuh); $i++)
    {
        $diklat_butuh               = new Diklatbutuh();
        $diklat_butuh->guru_id      = $request->guru_id;
        $diklat_butuh->diklat_butuh = $request->diklat_butuh[$i];
        $diklat_butuh->save();
    }
    $gurus=Guru::find($request->guru_id);
    $detiltna = DB::table('jenjang')
    ->join('kategori_tna', 'jenjang.id', '=', 'kategori_tna.jenjang_id')
    ->join('detil_tna', 'kategori_tna.id', '=', 'detil_tna.kategori_tna_id')
    ->select('jenjang.*', 'kategori_tna.*', 'detil_tna.*')
    ->where('jenjang.id',$gurus->jenjang_id)
    ->get();
    return view('/nilai_tna/create',['gurus'=>$gurus,'detiltnas'=>$detiltna])->with('alert', 'Data berhasil ditambahkan!');
  }

  public function update( Request $request )
  {
    

    DB::select(DB::raw("delete from mapel where guru_id=".$request->guru_id));
    for($i = 0; $i < count($request->mapel); $i++)
    {
        $mapel            = new Mapel();
        $mapel->guru_id   = $request->guru_id;
        $mapel->mapel     = $request->mapel[$i];
        $mapel->save();
    }
    DB::select(DB::raw("delete from diklat_ikut where guru_id=".$request->guru_id));
    for($i = 0; $i < count($request->diklat_ikut); $i++)
    {
        $diklat_ikut              = new Diklatikut();
        $diklat_ikut->guru_id     = $request->guru_id;
        $diklat_ikut->diklat_ikut = $request->diklat_ikut[$i];
        $diklat_ikut->save();
    }
    DB::select(DB::raw("delete from diklat_butuh where guru_id=".$request->guru_id));
    for($i = 0; $i < count($request->diklat_butuh); $i++)
    {
        $diklat_butuh               = new Diklatbutuh();
        $diklat_butuh->guru_id      = $request->guru_id;
        $diklat_butuh->diklat_butuh = $request->diklat_butuh[$i];
        $diklat_butuh->save();
    }
    return redirect('/guru')->with('alert', 'Data berhasil diubah!');
}
}

