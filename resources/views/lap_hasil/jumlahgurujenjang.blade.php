@extends('layouts.app') @section('content') @if (session('alert'))
<div class="alert alert-success">
  {{ session('alert') }}
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-street-view fa-2x"></span> JUMLAH GURU PER JENJANG</div>
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
                <td>JENJANG</td>
                <td>JUMLAH GURU</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($guru as $guru)
              <tr>
                <td>{{$guru->jenjang}}</td>
                <td>{{$guru->jumlah}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{$gurus->links()}} --}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
