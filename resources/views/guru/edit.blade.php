
@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Guru</div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" action="/guru/{{$guru->id}}" method="post">
                      <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="control-label col-sm-2">NAMA:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nama" type="text" name="nama" size="30" value="{{$guru->nama}}" placeholder="Masukkan Nama">
                                @if ($errors->has('nama'))
                                  <span class="help-block">{{ $errors->first('nama')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jenkel') ? ' has-error' : '' }}">
                            <label for="jenkel" class="control-label col-sm-2">JENIS KELAMIN:</label>
                            <div class="col-sm-4">
                              <select name="jenkel" class="form-control">
                                <option value="" @if($guru->jenkel == '')selected @endif></option>
                                <option value="Laki-laki" @if($guru->jenkel == 'Laki-laki')selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($guru->jenkel == 'Perempuan')selected @endif>Perempuan</option>
                              </select>
                                @if ($errors->has('jenkel'))
                                  <span class="help-block">Jenis kelamin harus diisi</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nopes') ? ' has-error' : '' }}">
                            <label for="nopes" class="control-label col-sm-2">NOPES:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nopes" type="text" name="nopes" size="30" value="{{$guru->nopes}}" placeholder="Masukkan 12 digit Nomor Peserta">
                                @if ($errors->has('nopes'))
                                  <span class="help-block">{{ $errors->first('nopes')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nuptk') ? ' has-error' : '' }}">
                            <label for="nuptk" class="control-label col-sm-2">NUPTK:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nuptk" type="text" name="nuptk" size="30" value="{{$guru->nopes}}" placeholder="Masukkan 16 digit NUPTK">
                                @if ($errors->has('nuptk'))
                                  <span class="help-block">{{ $errors->first('nuptk')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="control-label col-sm-2">NIP:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nip" type="text" name="nip" size="30" value="{{$guru->nip}}" placeholder="Masukkan 18 digit Nomor Induk Pegawai (NIP)">
                                @if ($errors->has('nip'))
                                  <span class="help-block">{{ $errors->first('nip')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="control-label col-sm-2">TEMPAT LAHIR:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir" size="30" value="{{$guru->tempat_lahir}}" placeholder="Masukkan tempat kelahiran">
                                @if ($errors->has('tempat_lahir'))
                                  <span class="help-block">{{ $errors->first('tempat_lahir')}}</span>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                            <label for="tanggal_lahir" class="control-label col-sm-2">TANGGAL LAHIR:</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="tanggal_lahir" type="text" name="tanggal_lahir" size="30" value="{{date("Y/m/d",strtotime($guru->tanggal_lahir))}}" placeholder="(yyyy/mm/dd)">
                                @if ($errors->has('tanggal_lahir'))
                                  <span class="help-block">{{ $errors->first('tanggal_lahir')}}</span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                            <label for="tanggal_lahir" class="control-label col-sm-2">TANGGAL LAHIR:</label>
                            <div class="col-sm-4">
                              <div>
                                <div class='input-group date' id='datetimepicker1'>
                                  <input class="form-control" id="tanggal_lahir" type="text" name="tanggal_lahir" size="30" value="{{date("Y/m/d",strtotime($guru->tanggal_lahir))}}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    @if ($errors->has('tanggal_lahir'))
                                      <span class="help-block">{{ $errors->first('tanggal_lahir')}}</span>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('handphone') ? ' has-error' : '' }}">
                            <label for="handphone" class="control-label col-sm-2">HANDPHONE:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="handphone" type="text" name="handphone" size="50" value="{{$guru->handphone}}" placeholder="Masukkan nomor handphone">
                                @if ($errors->has('handphone'))
                                  <span class="help-block">{{ $errors->first('handphone')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jenjang_id') ? ' has-error' : '' }}">
                            <label for="jenjang_id" class="control-label col-sm-2">JENJANG SEKOLAH:</label>
                            <div class="col-sm-4">
                              <select name="jenjang_id" class="form-control">
                                <option value="" @if($guru->jenjang_id) == '')selected @endif></option>
                                  @foreach ($jenjang as $jenjang)
                                    <option value="{{$jenjang->id}}" @if($guru->jenjang_id == $jenjang->id)selected @endif>{{$jenjang->jenjang_sekolah}}</option>
                                  @endforeach
                              </select>
                                @if ($errors->has('jenjang_id'))
                                  <span class="help-block">Jenjang Sekolah harus diisi</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                            <label for="tempat" class="control-label col-sm-2">SEKOLAH:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="tempat" type="text" name="tempat" size="50" value="{{$guru->tempat}}" placeholder="Masukkan Nama Instansi/Sekolah">
                                @if ($errors->has('tempat'))
                                  <span class="help-block">Tempat/Instansi harus diisi</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="control-label col-sm-2">ALAMAT:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="alamat" type="text" name="alamat" size="50" value="{{$guru->alamat}}" placeholder="Masukkan Alamat Instansi/Sekolah">
                                @if ($errors->has('alamat'))
                                  <span class="help-block">Alamat Sekolah/Instansi harus diisi</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                            <label for="kecamatan" class="control-label col-sm-2">KECAMATAN:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="kecamatan" type="text" name="kecamatan" size="50" value="{{$guru->kecamatan}}" placeholder="Masukkan kecamatan Instansi/Sekolah">
                                @if ($errors->has('kecamatan'))
                                  <span class="help-block">kecamatan Sekolah/Instansi harus diisi</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
                            <label for="kabupaten" class="control-label col-sm-2">KABUPATEN:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="kabupaten" type="text" name="kabupaten" size="50" value="{{$guru->kabupaten}}" placeholder="Masukkan Kabupaten">
                                @if ($errors->has('kabupaten'))
                                  <span class="help-block">{{ $errors->first('kabupaten')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                            <label for="provinsi" class="control-label col-sm-2">PROVINSI:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="provinsi" type="text" name="provinsi" size="50" value="{{$guru->provinsi}}" placeholder="Masukkan Provinsi">
                                @if ($errors->has('provinsi'))
                                  <span class="help-block">{{ $errors->first('provinsi')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-default" value="Edit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
