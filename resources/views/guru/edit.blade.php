 @extends('layouts.app') @section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Guru</div>
        <div class="container">
          <div class="">
            &nbsp;
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Edit Data Guru</a></li>
            <li><a data-toggle="tab" href="#menu1">Mata Pelajaran</a></li>
            <li><a data-toggle="tab" href="#menu2">Detail TNA</a></li>
            {{-- <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> --}}
          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <div class="panel-body">
                <form role="form" class="form-horizontal" action="/guru/{{$guru->id}}" method="post">
                  <input type="hidden" name="_method" value="PUT">
                  <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                    <label for="nama" class="control-label col-sm-2">NAMA:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nama" type="text" name="nama" size="30" value="{{$guru->nama}}" placeholder="Masukkan Nama"> @if ($errors->has('nama'))
                      <span class="help-block">{{ $errors->first('nama')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('jenkel') ? ' has-error' : '' }}">
                    <label for="jenkel" class="control-label col-sm-2">JENIS KELAMIN:</label>
                    <div class="col-sm-4">
                      <select name="jenkel" class="form-control">
                      <option value="" @if($guru->jenkel == '')selected @endif></option>
                      <option value="Laki-laki" @if($guru->jenkel == 'Laki-laki')selected @endif>Laki-laki</option>
                      <option value="Perempuan" @if($guru->jenkel == 'Perempuan')selected @endif>Perempuan</option>
                    </select> @if ($errors->has('jenkel'))
                      <span class="help-block">Jenis kelamin harus diisi</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('nopes') ? ' has-error' : '' }}">
                    <label for="nopes" class="control-label col-sm-2">NOPES:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nopes" type="text" name="nopes" size="30" value="{{$guru->nopes}}" placeholder="Masukkan 12 digit Nomor Peserta"> @if ($errors->has('nopes'))
                      <span class="help-block">{{ $errors->first('nopes')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('nuptk') ? ' has-error' : '' }}">
                    <label for="nuptk" class="control-label col-sm-2">NUPTK:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nuptk" type="text" name="nuptk" size="30" value="{{$guru->nuptk}}" placeholder="Masukkan 16 digit NUPTK"> @if ($errors->has('nuptk'))
                      <span class="help-block">{{ $errors->first('nuptk')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                    <label for="nip" class="control-label col-sm-2">NIP:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nip" type="text" name="nip" size="30" value="{{$guru->nip}}" placeholder="Masukkan 18 digit Nomor Induk Pegawai (NIP)"> @if ($errors->has('nip'))
                      <span class="help-block">{{ $errors->first('nip')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                    <label for="tempat_lahir" class="control-label col-sm-2">TEMPAT LAHIR:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir" size="30" value="{{$guru->tempat_lahir}}" placeholder="Masukkan tempat kelahiran"> @if ($errors->has('tempat_lahir'))
                      <span class="help-block">{{ $errors->first('tempat_lahir')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                    <label for="tanggal_lahir" class="control-label col-sm-2">TANGGAL LAHIR:</label>
                    <div class="col-sm-4">
                      <div>
                        <div class='input-group date' id='datetimepicker1'>
                          <input class="form-control" id="tanggal_lahir" type="text" name="tanggal_lahir" size="30" value="{{date(" Y/m/d ",strtotime($guru->tanggal_lahir))}}">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                          @if ($errors->has('tanggal_lahir'))
                          <span class="help-block">{{ $errors->first('tanggal_lahir')}}</span> @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('handphone') ? ' has-error' : '' }}">
                    <label for="handphone" class="control-label col-sm-2">HANDPHONE:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="handphone" type="text" name="handphone" size="50" value="{{$guru->handphone}}" placeholder="Masukkan nomor handphone"> @if ($errors->has('handphone'))
                      <span class="help-block">{{ $errors->first('handphone')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('jenjang_id') ? ' has-error' : '' }}">
                    <label for="jenjang_id" class="control-label col-sm-2">JENJANG SEKOLAH:</label>
                    <div class="col-sm-4">
                      <select name="jenjang_id" class="form-control" disabled>
                      <option value="" @if($guru->jenjang_id) == '')selected @endif></option>
                        @foreach ($jenjang as $jenjang)
                          <option value="{{$jenjang->id}}" @if($guru->jenjang_id == $jenjang->id)selected @endif>{{$jenjang->jenjang_sekolah}}</option>
                        @endforeach
                    </select> @if ($errors->has('jenjang_id'))
                      <span class="help-block">Jenjang Sekolah harus diisi</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                    <label for="tempat" class="control-label col-sm-2">SEKOLAH:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="tempat" type="text" name="tempat" size="50" value="{{$guru->tempat}}" placeholder="Masukkan Nama Instansi/Sekolah"> @if ($errors->has('tempat'))
                      <span class="help-block">Tempat/Instansi harus diisi</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                    <label for="alamat" class="control-label col-sm-2">ALAMAT:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="alamat" type="text" name="alamat" size="50" value="{{$guru->alamat}}" placeholder="Masukkan Alamat Instansi/Sekolah"> @if ($errors->has('alamat'))
                      <span class="help-block">Alamat Sekolah/Instansi harus diisi</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                    <label for="kecamatan" class="control-label col-sm-2">KECAMATAN:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="kecamatan" type="text" name="kecamatan" size="50" value="{{$guru->kecamatan}}" placeholder="Masukkan kecamatan Instansi/Sekolah"> @if ($errors->has('kecamatan'))
                      <span class="help-block">kecamatan Sekolah/Instansi harus diisi</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
                    <label for="kabupaten" class="control-label col-sm-2">KABUPATEN:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="kabupaten" type="text" name="kabupaten" size="50" value="{{$guru->kabupaten}}" placeholder="Masukkan Kabupaten"> @if ($errors->has('kabupaten'))
                      <span class="help-block">{{ $errors->first('kabupaten')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                    <label for="provinsi" class="control-label col-sm-2">PROVINSI:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="provinsi" type="text" name="provinsi" size="50" value="{{$guru->provinsi}}" placeholder="Masukkan Provinsi"> @if ($errors->has('provinsi'))
                      <span class="help-block">{{ $errors->first('provinsi')}}</span> @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      {{csrf_field()}}
                      <input type="submit" class="btn btn-default" value="Edit" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div id="menu1" class="tab-pane fade">
              <div class="panel-body">
                <form role="form" class="form-horizontal" action="/mapel/{{$guru->id}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                  <div class="form-group{{ $errors->has('mapel') ? ' has-error' : '' }}">
                    <label for="mapel" class="control-label col-sm-2">MAPEL YANG DIAMPU :</label>
                    <div class="col-sm-10">
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Rupa" name="mapel[]" @if($guru->mapel->where('mapel', 'Seni Rupa')->first())checked @endif>Seni Rupa</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Musik" name="mapel[]" @if($guru->mapel->where('mapel', 'Seni Musik')->first())checked @endif>Seni Musik</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Musik Daerah" name="mapel[]" @if($guru->mapel->where('mapel', 'Seni Musik Daerah')->first())checked @endif>Seni Musik Daerah</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Teater" name="mapel[]" @if($guru->mapel->where('mapel', 'Seni Teater')->first())checked @endif>Seni Teater</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Tari" name="mapel[]" @if($guru->mapel->where('mapel', 'Seni Tari')->first())checked @endif>Seni Tari</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Keterampilan" name="mapel[]" @if($guru->mapel->where('mapel', 'Seni Keterampilan')->first())checked @endif>Seni Keterampilan</label>
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('diklat_ikut') ? ' has-error' : '' }}">
                    <label for="diklat_ikut" class="control-label col-sm-2">MAPEL DIKLAT YANG PERNAH DIIKUTI :</label>
                    <div class="col-sm-10">
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Rupa" name="diklat_ikut[]" @if($guru->diklat_ikut->where('diklat_ikut', 'Seni Rupa')->first())checked @endif>Seni Rupa</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Musik" name="diklat_ikut[]" @if($guru->diklat_ikut->where('diklat_ikut', 'Seni Musik')->first())checked @endif>Seni Musik</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Musik Daerah" name="diklat_ikut[]" @if($guru->diklat_ikut->where('diklat_ikut', 'Seni Musik Daerah')->first())checked @endif>Seni Musik Daerah</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Teater" name="diklat_ikut[]" @if($guru->diklat_ikut->where('diklat_ikut', 'Seni Teater')->first())checked @endif>Seni Teater</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Tari" name="diklat_ikut[]" @if($guru->diklat_ikut->where('diklat_ikut', 'Seni Tari')->first())checked @endif>Seni Tari</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Keterampilan" name="diklat_ikut[]" @if($guru->diklat_ikut->where('diklat_ikut', 'Seni Keterampilan')->first())checked @endif>Seni Keterampilan</label>
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('diklat_butuh') ? ' has-error' : '' }}">
                    <label for="diklat_butuh" class="control-label col-sm-2">MAPEL DIKLAT YANG DIBUTUHKAN :</label>
                    <div class="col-sm-10">
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Rupa" name="diklat_butuh[]" @if($guru->diklat_butuh->where('diklat_butuh', 'Seni Rupa')->first())checked @endif>Seni Rupa</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Musik" name="diklat_butuh[]" @if($guru->diklat_butuh->where('diklat_butuh', 'Seni Musik')->first())checked @endif>Seni Musik</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Musik Daerah" name="diklat_butuh[]" @if($guru->diklat_butuh->where('diklat_butuh', 'Seni Musik Daerah')->first())checked @endif>Seni Musik Daerah</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Teater" name="diklat_butuh[]" @if($guru->diklat_butuh->where('diklat_butuh', 'Seni Teater')->first())checked @endif>Seni Teater</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Tari" name="diklat_butuh[]" @if($guru->diklat_butuh->where('diklat_butuh', 'Seni Tari')->first())checked @endif>Seni Tari</label>
                      <label class="checkbox-inline"><input type="checkbox" value="Seni Keterampilan" name="diklat_butuh[]" @if($guru->diklat_butuh->where('diklat_butuh', 'Seni Keterampilan')->first())checked @endif>Seni Keterampilan</label>
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
            <div id="menu2" class="tab-pane fade">
              <div class="panel-body col-md-10">
              <form role="form" class="form-horizontal" action="/nilai_tna" method="post">
                <input type="hidden" name="guru_id" value="{{$guru->id}}">
                <input type="hidden" name="hapus" value="ya">
                @foreach ($detiltna as $detiltna)
                  <input type="hidden" name="detil_tna_id[]" value="{{$detiltna->id}}">
                  <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                      <label for="nama" class="col-sm-8">{{$detiltna->kategori_tna}} - {{$detiltna->detil_tna}}:</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('nilai_tna') ? ' has-error' : '' }}">
                        </div>
                        <select class="form-control" name="nilai_tna[]">
                          <option value="0" @if ($detiltna->nilai_tna==0)selected @endif>Tidak mengisi</option>
                          <option value="1" @if ($detiltna->nilai_tna==1)selected @endif>1 Tidak Kompeten</option>
                          <option value="2" @if ($detiltna->nilai_tna==2)selected @endif>2 Kurang Kompeten</option>
                          <option value="3" @if ($detiltna->nilai_tna==3)selected @endif>3 Kompeten</option>
                          <option value="4" @if ($detiltna->nilai_tna==4)selected @endif>4 Sangat Kompeten</option>
                        </select>
                      </div>
                  </div>
                  @endforeach
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          {{csrf_field()}}
                          <input type="submit" class="btn btn-default" value="Tambah" />
                      </div>
                  </div>
              </form>
            </div>
            </div>
            <div id="menu3" class="tab-pane fade">
              <h3>Menu 3</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
