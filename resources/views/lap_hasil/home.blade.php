@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12">
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
                <th>KATEGORI TNA</th>
                <th>NILAI TOTAL</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($hasiltnas as $hasiltna)
              <tr>
                  <td>{{$hasiltna->nama}}</td>
                  <td>{{$hasiltna->kategori_tna}}</td>
                  <td>
                    @if ($hasiltna->hasil_tna <60)
                      Tidak Kompeten
                    @elseif ($hasiltna->hasil_tna <75)
                      Kurang Kompeten
                    @elseif ($hasiltna->hasil_tna <85)
                      Kompeten
                    @else
                      Sangat Kompeten
                    @endif
                  </td>
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
