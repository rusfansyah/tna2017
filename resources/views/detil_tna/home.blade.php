@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-check-circle-o fa-2x"></span> Kategori TNA</div>
        <div class="panel-body">
          <table>
            <tr>
              <td>
                <div class="btn-group" role="group">
                  <button class="btn btn-primary btn-md" onclick="window.location = '/detil_tna/create/'">
                    <span class="fa fa-user-plus"></span> Tambah
                  </button>
              </td>
              </div>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>JENJANG</th>
                <th>KATEGORI</th>
                <th>DETIL</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detiltnas as $detiltna)
              <tr>
                <td>{{$detiltna->kategori_tna->jenjang->jenjang_sekolah}}</td>
                <td>{{$detiltna->kategori_tna->kategori_tna}}</td>
                <td width="50%">{{$detiltna->detil_tna}}</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info btn-xs" onclick="window.location = '/detil_tna/{{$detiltna->id}}'"><span class="fa fa-eye"></span> Tampil</button>
                    <button class="btn btn-warning btn-xs" onclick="window.location = '/detil_tna/{{$detiltna->id}}/edit'"><span class="fa fa-pencil-square-o"></span> Edit</button>
                    <button class="btn btn-danger btn-xs" onclick="window.location = '/detil_tna/{{$detiltna->id}}/hapus'"><span class="fa fa-trash-o"></span> Hapus</button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$detiltnas->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection
