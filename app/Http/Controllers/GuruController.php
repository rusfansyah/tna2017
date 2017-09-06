<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
use DB;
use Auth;
use Excel;
use PDF;
use App\Guru;
use App\Jenjang;
use App\Mapel;
use App\Kategoritna;
use App\Detiltna;

class GuruController extends Controller
{
    //
    public function index()
    {
        //$gurus=Guru::all();
        //dd($gurus);
        $gurus = Guru::paginate(8);

        return view('guru/home', ['gurus'=>$gurus]);
    }
    public function create()
    {
        $jenjang=Jenjang::all();
        // dd($jenjang);
        return view('/guru/create', ['jenjang'=>$jenjang]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'nama'              =>  "required|regex:/^[a-zA-Z .'?]*$/",
        'jenkel'            =>  'required',
        'nopes'             =>  'required|unique:guru,nopes|digits:12|numeric',
        'nuptk'             =>  'required|unique:guru,nuptk|digits:16|numeric',
        'nip'               =>  'required|unique:guru,nip|digits:18|numeric',
        'handphone'         =>  'required|numeric',
        'tempat_lahir'      =>  'required',
        'tanggal_lahir'     =>  'required|date_format:Y/m/d',
        'tempat'            =>  'required',
        'jenjang_id'        =>  'required',
        'alamat'            =>  'required',
        'kecamatan'         =>  'required',
        'kabupaten'         =>  'required',
        'provinsi'          =>  'required'

      ]);
        $guru=new Guru;
        $guru->nama               = $request->nama;
        $guru->jenkel             = $request->jenkel;
        $guru->nopes              = $request->nopes;
        $guru->nuptk              = $request->nuptk;
        $guru->nip                = $request->nip;
        $guru->handphone          = $request->handphone;
        $guru->tempat_lahir       = $request->tempat_lahir;
        $guru->tanggal_lahir      = $request->tanggal_lahir;
        $guru->jenjang_id         = $request->jenjang_id;
        $guru->tempat             = $request->tempat;
        $guru->alamat             = $request->alamat;
        $guru->kecamatan          = $request->kecamatan;
        $guru->kabupaten          = $request->kabupaten;
        $guru->provinsi           = $request->provinsi;
        $guru->save();
        $gurus=Guru::find($guru->id);
        // dd($gurus);
        return view('/mapel/create', ['gurus'=>$gurus])->with('alert', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $guru=Guru::find($id);
        $jenjang=Jenjang::all();
        $detiltna=DB::select(DB::raw("SELECT guru.id,detil_tna.id,detil_tna.detil_tna,nilai_tna.nilai_tna,kategori_tna.kategori_tna FROM guru INNER JOIN jenjang ON guru.jenjang_id = jenjang.id INNER JOIN kategori_tna ON kategori_tna.jenjang_id = jenjang.id INNER JOIN detil_tna ON detil_tna.kategori_tna_id = kategori_tna.id INNER JOIN nilai_tna ON nilai_tna.detil_tna_id = detil_tna.id AND nilai_tna.guru_id = guru.id WHERE guru.id = ".$id));
        // dd($detiltna);
        return view('guru/edit', ['guru'=>$guru, 'jenjang'=>$jenjang, 'detiltna'=>$detiltna]);
    }

    public function show($id)
    {
        $guru=Guru::find($id);
        // $jenjang=Jenjang::all();
        // // $mapel=Mapel::where('guru_id',107);
        // $mapel = DB::select(DB::raw("select * from mapel where guru_id='".$id."'"));
        // $diklat_ikut = DB::select(DB::raw("select * from diklat_ikut where guru_id='".$id."'"));
        // $diklat_butuh = DB::select(DB::raw("select * from diklat_butuh where guru_id='".$id."'"));
        // dd($diklat_ikut);
        // return view('guru/single', ['guru'=>$guru, 'jenjang'=>$jenjang, 'mapel'=>$mapel, 'diklat_ikut'=>$diklat_ikut, 'diklat_butuh'=>$diklat_butuh]);
        return view('guru/single', ['guru'=>$guru]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'nama'              =>  "required|regex:/^[a-zA-Z .'?]*$/",
        'jenkel'            =>  'required',
        'nopes'             =>  'required|digits:12|numeric',
        'nuptk'             =>  'required|digits:16|numeric',
        'nip'               =>  'required|digits:18|numeric',
        'handphone'         =>  'required|numeric',
        'tempat_lahir'      =>  'required',
        // 'tanggal_lahir'     =>  'required|date_format:Y/m/d',
        'tempat'            =>  'required',
        // 'jenjang_id'        =>  'required',
        'alamat'            =>  'required',
        'kecamatan'         =>  'required',
        'kabupaten'         =>  'required',
        'provinsi'          =>  'required'

      ]);

        $guru=Guru::find($id);
        $guru->nama               = $request->nama;
        $guru->jenkel             = $request->jenkel;
        $guru->nopes              = $request->nopes;
        $guru->nuptk              = $request->nuptk;
        $guru->nip                = $request->nip;
        $guru->handphone          = $request->handphone;
        $guru->tempat_lahir       = $request->tempat_lahir;
        $guru->tanggal_lahir      = $request->tanggal_lahir;
        // $guru->jenjang_id         = $request->jenjang_id;
        $guru->tempat             = $request->tempat;
        $guru->alamat             = $request->alamat;
        $guru->kecamatan          = $request->kecamatan;
        $guru->kabupaten          = $request->kabupaten;
        $guru->provinsi           = $request->provinsi;
        $guru->save();
        return redirect('/guru')->with('alert', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $guru=Guru::find($id);
        $guru->delete();
        return redirect('/guru')->with('alert', 'Data berhasil dihapus!');
    }

    public function excel()
    {
        $gurus=Guru::all();
        Excel::create('Data Guru Seni Budaya', function ($excel) use ($gurus)
        {
          // Set property
          $excel->setTitle('Data Guru Seni Budaya')
                ->setCreator(Auth::user()->name);
          $excel->sheet('Data Guru', function ($sheet) use ($gurus)
          {
            $row = 1;
            $sheet->row($row,
            ['NOPES','NUPTK','NIP','NAMA','JENIS KELAMIN','TEMPAT LAHIR','TANGGAL LAHIR','HANDPHONE','TEMPAT','ALAMAT','KECAMATAN','KABUPATEN','PROVINSI','JENJANG']);
            foreach ($gurus as $guru)
            {
              $sheet->row(++$row,
              [
                $guru->nopes,
                $guru->nuptk,
                $guru->nip,
                $guru->nama,
                $guru->jenkel,
                $guru->tempat_lahir,
                $guru->tanggal_lahir,
                $guru->handphone,
                $guru->tempat,
                $guru->alamat,
                $guru->kecamatan,
                $guru->kabupaten,
                $guru->provinsi,
                $guru->jenjang->jenjang_sekolah,
              ]
              );
            }
          });
        }
        )->export('xls');
    }

    public function pdf()
    {
        $gurus=Guru::all();
        $pdf = PDF::loadView('/guru/pdf', compact('gurus'))->setPaper('a4', 'landscape');
        return $pdf->download('guru.pdf');
    }

    protected function grafikGuru()
    {
        $guruku = DB::select(DB::raw("SELECT jenjang.jenjang_sekolah as jenjang, Count(jenjang.jenjang_sekolah) as jumlah FROM guru INNER JOIN jenjang ON guru.jenjang_id = jenjang.id GROUP BY jenjang.jenjang_sekolah"));
        $jenjangs = [];
        $jumlahs = [];
        foreach ($guruku as $gurus) {
            array_push($jenjangs, $gurus->jenjang);
            array_push($jumlahs, $gurus->jumlah);
        }
        return view('/guru/grafik', compact('jenjangs', 'jumlahs'));
    }
}
