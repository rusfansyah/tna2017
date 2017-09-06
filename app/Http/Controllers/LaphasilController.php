<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Excel;
use App\Guru;
use App\Jenjang;
use App\Kategoritna;
use App\Hasiltna;
class LaphasilController extends Controller
{
    //
    public function index()
    {
      // pakai cara join (agak panjang skripnya)
      // $hasiltna = DB::table('hasil_tna')
      // ->join('kategori_tna', 'hasil_tna.kategori_tna_id', '=', 'kategori_tna.id')
      // ->join('guru', 'hasil_tna.guru_id', '=', 'guru.id')
      // ->join('jenjang', 'guru.jenjang_id', '=', 'jenjang.id')
      // ->select('guru.nama','jenjang.jenjang_sekolah','kategori_tna.kategori_tna','hasil_tna.hasil_tna','hasil_tna.hasil_akhir')
      // ->orderBy('guru.id')
      // ->paginate(8);

      // pakai cara ambil database langsung, utk relasi pada bladenya (lebih simple)
      $hasiltna=Hasiltna::orderBy('guru_id')->paginate(8);
      return view('lap_hasil/home',['hasiltnas'=>$hasiltna]);
    }

    public function excel()
    {
        $hasiltna=Hasiltna::all();
      // dd($hasiltna);
        Excel::create('Data Hasil TNA', function ($excel) use ($hasiltna)
        {
          // Set property
          $excel->setTitle('Data Hasil TNA')
                ->setCreator(Auth::user()->name);
          $excel->sheet('Data Hasil TNA', function ($sheet) use ($hasiltna)
          {
            $row = 1;
            $sheet->row($row,
            ['NAMA','JENJANG','KATEGORI TNA','HASIL TNA']);
            foreach ($hasiltna as $hasiltna)
            {
              // jika penilaian pakai if
              // $kompetensi="";
              // if ($hasiltna->hasil_tna <60)
              //   $kompetensi="Tidak Kompeten";
              // elseif  ($hasiltna->hasil_tna <75)
              //   $kompetensi="Kurang Kompeten";
              // elseif  ($hasiltna->hasil_tna <85)
              //   $kompetensi="Kompeten";
              // else
              //   $kompetensi="Sangat Kompeten";


              $sheet->row(++$row,
              [
                $hasiltna->guru->nama,
                $hasiltna->guru->jenjang->jenjang_sekolah,
                $hasiltna->kategori_tna->kategori_tna,
                $hasiltna->hasil_akhir
                // $kompetensi
                // $hasiltna->hasil_tna
              ]
              );
            }
          });
        }
        )->export('xls');
    }

    protected function grafikMapel()
    {
        $guruku = DB::select(DB::raw("SELECT Count(mapel.mapel) as jumlah, mapel.mapel, jenjang.jenjang_sekolah as jenjang FROM mapel INNER JOIN guru ON mapel.guru_id = guru.id INNER JOIN jenjang ON guru.jenjang_id = jenjang.id GROUP BY mapel.mapel, jenjang.jenjang_sekolah"));
        $mapels = [];
        $jumlahs = [];
        $jenjangs = [];
        foreach ($guruku as $gurus) {
            array_push($mapels, $gurus->mapel ." ". $gurus->jenjang);
            array_push($jumlahs, $gurus->jumlah);
        }
        return view('/lap_hasil/grafikMapel', compact('mapels', 'jumlahs'));
    }

    protected function grafikMapelButuh()
    {
        $guruku = DB::select(DB::raw("SELECT Count(diklat_butuh.diklat_butuh) as jumlah, diklat_butuh.diklat_butuh, jenjang.jenjang_sekolah as jenjang FROM diklat_butuh INNER JOIN guru ON diklat_butuh.guru_id = guru.id INNER JOIN jenjang ON guru.jenjang_id = jenjang.id GROUP BY diklat_butuh.diklat_butuh, jenjang.jenjang_sekolah"));
        $mapels = [];
        $jumlahs = [];
        $jenjangs = [];
        foreach ($guruku as $gurus) {
            array_push($mapels, $gurus->diklat_butuh ." ". $gurus->jenjang);
            array_push($jumlahs, $gurus->jumlah);
        }
        return view('/lap_hasil/grafikMapelButuh', compact('mapels', 'jumlahs'));
    }

    protected function grafikMapelIkut()
    {
        $guruku = DB::select(DB::raw("SELECT Count(diklat_ikut.diklat_ikut) as jumlah, diklat_ikut.diklat_ikut, jenjang.jenjang_sekolah as jenjang FROM diklat_ikut INNER JOIN guru ON diklat_ikut.guru_id = guru.id INNER JOIN jenjang ON guru.jenjang_id = jenjang.id GROUP BY diklat_ikut.diklat_ikut, jenjang.jenjang_sekolah"));
        $mapels = [];
        $jumlahs = [];
        $jenjangs = [];
        foreach ($guruku as $gurus) {
            array_push($mapels, $gurus->diklat_ikut ." ". $gurus->jenjang);
            array_push($jumlahs, $gurus->jumlah);
        }
        return view('/lap_hasil/grafikMapelIkut', compact('mapels', 'jumlahs'));
    }
    public function guru()
    {
        $gurus = Guru::paginate(8);
        // dd($gurus);
        return view('lap_hasil/guru', ['gurus'=>$gurus]);
    }

    public function jumlahGuruJenjang()
    {
      $guru = DB::select(DB::raw("SELECT jenjang.jenjang_sekolah as jenjang, Count(jenjang.jenjang_sekolah) as jumlah FROM guru INNER JOIN jenjang ON guru.jenjang_id = jenjang.id GROUP BY jenjang.jenjang_sekolah"));
      return view('/lap_hasil/jumlahgurujenjang', ['guru'=>$guru]);
      }

      public function jumlahgurukompetensi()
      {
        $guru = DB::select(DB::raw("SELECT jenjang.jenjang_sekolah, kategori_tna.kategori_tna, hasil_tna.hasil_akhir, Count(hasil_tna.hasil_akhir) AS jumlah FROM hasil_tna INNER JOIN kategori_tna ON hasil_tna.kategori_tna_id = kategori_tna.id INNER JOIN jenjang ON kategori_tna.jenjang_id = jenjang.id GROUP BY jenjang.jenjang_sekolah, kategori_tna.kategori_tna, hasil_tna.hasil_akhir "));
        // dd($guru);
        return view('/lap_hasil/jumlahgurukompetensi', ['guru'=>$guru]);
        }


}
