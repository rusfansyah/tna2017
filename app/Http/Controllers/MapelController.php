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
    // dd($detiltna);
//
//     $jumlah_hasil=DB::table('guru')
//     ->join('nilai_tna','nilai_tna.guru_id','=','guru.id')
//     ->join('detil_tna','nilai_tna.detil_tna_id','=','detil_tna.id')
//     ->join('kategori_tna','detil_tna.kategori_tna_id','=','kategori_tna.id')
//     ->select('guru.id','kategori_tna.id')
//     ->sum('nilai_tna.nilai_tna')
//     ->groupBy('guru_id,kategori_tna_id')
//     // ->where('jenjang.id',$gurus->jenjang_id)
//     ->get();
// dd($jumlah_hasil);
    // DB::table('guru')->insert($jumlah_hasil);

//     $tambah_hasil= DB::tabel('')
//     SELECT
// guru.id as guru_id,
// kategori_tna.id as kategori_tna_id,
// sum(nilai_tna.nilai_tna) as hasil
// FROM
// guru
// INNER JOIN nilai_tna ON nilai_tna.guru_id = guru.id
// INNER JOIN detil_tna ON nilai_tna.detil_tna_id = detil_tna.id
// INNER JOIN kategori_tna ON detil_tna.kategori_tna_id = kategori_tna.id
// GROUP BY guru_id,kategori_tna_id
    return view('/nilai_tna/create',['gurus'=>$gurus,'detiltnas'=>$detiltna])->with('alert', 'Data berhasil ditambahkan!');
  }
}
