@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-sitemap fa-2x"></span> Kategori TNA</div>
        <div class="panel-body">
          <table>
            <tr>
              <td>
                <div class="btn-group" role="group">
                  <button class="btn btn-primary btn-md" onclick="window.location = '/kategori_tna/create/'">
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
                <th>KATEGORI TNA</th>
                <th>JENJANG SEKOLAH</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kategoritnas as $kategoritna)
              <tr>
                <td>{{$kategoritna->kategori_tna}}</td>
                <td>{{$kategoritna->jenjang->jenjang_sekolah}}</td>
                <td>

                    <button class="btn btn-info btn-xs" onclick="window.location = '/kategori_tna/{{$kategoritna->id}}'"><span class="fa fa-eye"></span> Tampil</button>
                    <button class="btn btn-warning btn-xs" onclick="window.location = '/kategori_tna/{{$kategoritna->id}}/edit'"><span class="fa fa-pencil-square-o"></span> Edit</button>
                    <button class="btn btn-danger btn-xs" onclick="window.location = '/kategori_tna/{{$kategoritna->id}}/hapus'"><span class="fa fa-trash-o"></span> Hapus</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$kategoritnas->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
 @endsection
