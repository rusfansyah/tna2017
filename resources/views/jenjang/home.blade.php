@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-wpforms fa-2x"></span> JENJANG SEKOLAH</div>
        <div class="panel-body">
          <table>
            <tr>
              <td>
                <div class="btn-group" role="group">
                  <button class="btn btn-primary btn-md" onclick="window.location = '/jenjang/create/'">
                    <span class="fa fa-user-plus"></span> Tambah
                  </button>
                  </div>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>JENJANG SEKOLAH</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jenjangs as $jenjang)
              <tr>
                <td>{{$jenjang->id}}</td>
                <td>{{$jenjang->jenjang_sekolah}}</td>
                <td>
                    <button class="btn btn-info btn-xs" onclick="window.location = '/jenjang/{{$jenjang->id}}'"><span class="fa fa-eye"></span> Tampil</button>
                    <button class="btn btn-warning btn-xs" onclick="window.location = '/jenjang/{{$jenjang->id}}/edit'"><span class="fa fa-pencil-square-o"></span> Edit</button>
                    <button class="btn btn-danger btn-xs" onclick="window.location = '/jenjang/{{$jenjang->id}}/hapus'"><span class="fa fa-trash-o"></span> Hapus</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
