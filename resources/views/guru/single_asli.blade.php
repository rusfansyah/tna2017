@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">TAMPIL DATA GURU</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <tbody>

                        <tr>
                            <th>NAMA</th>
                            <td>:</td>
                            <td>{{$guru->nama}}</td>
                        </tr>
                        <tr>
                            <th>JENIS KELAMIN</th>
                            <td>:</td>
                            <td>{{$guru->jenkel}}</td>
                        </tr>
                        <tr>
                            <th>NOPES</th>
                            <td>:</td>
                            <td>{{$guru->nopes}}</td>
                        </tr>
                        <tr>
                            <th>NUPTK</th>
                            <td>:</td>
                            <td>{{$guru->nuptk}}</td>
                        </tr>
                        <tr>
                            <th>SEKOLAH</th>
                            <td>:</td>
                            <td>{{$guru->tempat}}</td>
                        </tr>
                        <tr>
                            <th>KABUPATEN</th>
                            <td>:</td>
                            <td>{{$guru->kabupaten}}</td>
                        </tr>
                        <tr>
                            <th>PROVINSI</th>
                            <td>:</td>
                            <td>{{$guru->provinsi}}</td>
                        </tr>
                        <tr>
                            <th>JENJANG</th>
                            <td>:</td>
                            
                            <td>
                              @if ($guru->jenjang=='1')
                                SD
                              @elseif ($guru->jenjang=='2')
                                SMP
                              @elseif ($guru->jenjang=='3')
                                SMA
                              @elseif ($guru->jenjang=='4')
                                SMK
                              @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
