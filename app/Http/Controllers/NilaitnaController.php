<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Guru;
use Illuminate\Http\Request;
use App\Nilaitna;
class NilaitnaController extends Controller
{
    //
    public function index()
    {
      $detiltna = Detiltna::paginate(8);
      return view('nilai_tna/home',['detiltnas'=>$detiltna]);
    }

    public function store( Request $request )
    {
      for($i = 0; $i < count($request->detil_tna_id); $i++)
      {
          $nilaitna                 = new Nilaitna();
          $nilaitna->detil_tna_id   = $request->detil_tna_id[$i];
          $nilaitna->guru_id        = $request->guru_id;
          $nilaitna->nilai_tna      = $request->nilai_tna[$i];
          $nilaitna->save();
      }
      $cards = DB::insert(DB::raw("insert into hasil_tna(guru_id,kategori_tna_id,hasil_tna) SELECT guru.id as guru_id, kategori_tna.id as kategori_tna_id, (Sum(nilai_tna.nilai_tna)/(Count(detil_tna.kategori_tna_id)*4)*100) FROM guru INNER JOIN nilai_tna ON nilai_tna.guru_id = guru.id INNER JOIN detil_tna ON nilai_tna.detil_tna_id = detil_tna.id INNER JOIN kategori_tna ON detil_tna.kategori_tna_id = kategori_tna.id WHERE guru.id=".$request->guru_id." GROUP BY guru.id,kategori_tna.id"));
      return redirect('/guru')->with('alert', 'Data berhasil disimpan!');
    }
}
