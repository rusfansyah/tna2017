@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-street-view fa-2x"></span> Data Guru</div>
        <div class="panel-body">
          <table>
            <tr>

              <td>&nbsp;</td>
              <td>
                <button class="btn btn-primary btn-md" onclick="window.location = '/guru/excel/'">
                  <span class="fa fa-file-excel-o"></span> Ekspor Excel
                </button>
              </td>
              <td>&nbsp;</td>
              <td>
                <button class="btn btn-primary btn-md" onclick="window.location = '/guru/pdf/'">
                <span class="fa fa-file-pdf-o"></span> Ekspor Pdf
                </button>
              </td>
              <td>&nbsp;</td>
              </div>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <td>NOPES</td>
                <td>NAMA</td>
                <td>JENIS KELAMIN</td>
                <td>TEMPAT LAHIR</td>
                <td>TANGGAL LAHIR</td>
                <td>HANDPHONE</td>
                <td>TEMPAT</td>
                <td>ALAMAT</td>
                <td>KECAMATAN</td>
                <td>KABUPATEN</td>
                <td>PROVINSI</td>
                <td>JENJANG</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($gurus as $guru)
              <tr>
                <td>{{$guru->nopes}}</td>
                <td>{{$guru->nama}}</td>
                <td>{{$guru->jenkel}}</td>
                <td>{{$guru->tempat_lahir}}</td>
                <td>{{$guru->tanggal_lahir}}</td>
                <td>{{$guru->handphone}}</td>
                <td>{{$guru->tempat}}</td>
                <td>{{$guru->alamat}}</td>
                <td>{{$guru->kecamatan}}</td>
                <td>{{$guru->kabupaten}}</td>
                <td>{{$guru->provinsi}}</td>
                <td>{{$guru->jenjang->jenjang_sekolah}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$gurus->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
