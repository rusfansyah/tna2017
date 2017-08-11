@extends('layouts.app') @section('content')
  @if (session('alert'))
      <div class="alert alert-success">
          {{ session('alert') }}
      </div>
  @endif
<div class="container">
  <div class="col-md-6">
    <table>
        <tr>
            <td>
                <h3>JENJANG SEKOLAH</h3></td>
            <td>&nbsp;&nbsp;</td>
            <td><button class="btn btn-primary btn-xs" onclick="window.location = '/jenjang/create/'"><span class="fa fa-plus-circle"></span> Tambah</button></td>
        </tr>
    </table>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID JENJANG</th>
                <th>JENJANG SEKOLAH</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenjangs as $jenjang)
            <tr>
                <td>{{$jenjang->id}}</td>
                <td>{{$jenjang->jenjang_sekolah}}</td>
                <td>
                    <button class="btn btn-info btn-xs" onclick="window.location = '/jenjang/{{$jenjang->id}}'"><span class="fa fa-eye"></span> Tampil</button>
                    <button class="btn btn-primary btn-xs" onclick="window.location = '/jenjang/{{$jenjang->id}}/edit'"><span class="fa fa-pencil"></span> Edit</button>
                    <button class="btn btn-danger btn-xs" onclick="window.location = '/jenjang/{{$jenjang->id}}/hapus'"><span class="fa fa-trash"></span> Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
