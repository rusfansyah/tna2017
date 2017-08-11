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
              <td>
                <div class="btn-group" role="group">
                  <button class="btn btn-primary btn-md" onclick="window.location = '/guru/create/'">
                    <span class="fa fa-user-plus"></span> Tambah
                  </button>
              </td>
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
                <th>NAMA</th>
                <th>SEKOLAH</th>
                <th>KABUPATEN</th>
                <th>PROVINSI</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($gurus as $guru)
              <tr>
                <td>{{$guru->nama}}</td>
                <td>{{$guru->tempat}}</td>
                <td>{{$guru->kabupaten}}</td>
                <td>{{$guru->provinsi}}</td>
                <td>

                    <button class="btn btn-info btn-xs" onclick="window.location = '/guru/{{$guru->id}}'"><span class="fa fa-eye"></span> Tampil</button>
                    <button class="btn btn-warning btn-xs" onclick="window.location = '/guru/{{$guru->id}}/edit'"><span class="fa fa-pencil-square-o"></span> Edit</button>
                    <button class="btn btn-danger btn-xs" onclick="window.location = '/guru/{{$guru->id}}/hapus'"><span class="fa fa-trash-o"></span> Hapus</button>
                </td>
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
