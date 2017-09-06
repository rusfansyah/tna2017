@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-file-text-o fa-2x"></span> Laporan Hasil Kompetensi</div>
        <div class="panel-body">
          <table>
            <tr>

              <td>&nbsp;</td>
              <td>
                <button class="btn btn-primary btn-md" onclick="window.location = '/lap_hasil/excel/'">
                  <span class="fa fa-file-excel-o"></span> Ekspor Excel
                </button>
              </td>
              <td>&nbsp;</td>
              {{-- <td>
                <button class="btn btn-primary btn-md" onclick="window.location = '/guru/pdf/'">
                <span class="fa fa-file-pdf-o"></span> Ekspor Pdf
                </button>
              </td> --}}
              <td>&nbsp;</td>
              </div>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>NAMA</th>
                <th>JENJANG SEKOLAH</th>
                <th>KATEGORI TNA</th>
                <th>HASIL TNA</th>
              </tr>
            </thead>
            <tbody>
              {{-- pakai cara join (agak panjang skripnya) --}}
              {{-- @foreach ($hasiltnas as $hasiltna)
              <tr>
                  <td>{{$hasiltna->nama}}</td>
                  <td>{{$hasiltna->jenjang_sekolah}}</td>
                  <td>{{$hasiltna->kategori_tna}}</td>
                  <td>{{$hasiltna->hasil_akhir}}</td>
              </tr>
              @endforeach --}}

              {{-- pakai cara ambil database langsung, utk relasi pada bladenya (lebih simple) --}}
              @foreach ($hasiltnas as $hasiltna)
              <tr>
                  <td>{{$hasiltna->guru->nama}}</td>
                  <td>{{$hasiltna->guru->jenjang->jenjang_sekolah}}</td>
                  <td>{{$hasiltna->kategori_tna->kategori_tna}}</td>
                  <td>{{$hasiltna->hasil_akhir}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$hasiltnas->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
