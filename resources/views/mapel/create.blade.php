@extends('layouts.app') @section('content')
  @if (session('alert'))
      <div class="alert alert-success">
          {{ session('alert') }}
      </div>
  @endif
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">MATA PELAJARAN</div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" action="/mapel" method="post">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="control-label col-sm-2">NAMA:</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="guru_id" value="{{$gurus->id}}">
                                <input class="form-control" id="nama" type="text" name="nama" size="30" value="{{$gurus->nama}}" placeholder="Masukkan Nama" disabled>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="mapel" class="control-label col-sm-2">MAPEL YANG DIAMPU :</label>
                            <div class="col-sm-10">
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Rupa" name="mapel[]">Seni Rupa</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Musik" name="mapel[]">Seni Musik</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Musik Daerah" name="mapel[]">Seni Musik Daerah</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Teater" name="mapel[]">Seni Teater</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Tari" name="mapel[]">Seni Tari</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Keterampilan" name="mapel[]">Seni Keterampilan</label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="diklat_ikut" class="control-label col-sm-2">MAPEL DIKLAT YANG PERNAH DIIKUTI :</label>
                            <div class="col-sm-10">
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Rupa" name="diklat_ikut[]">Seni Rupa</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Musik" name="diklat_ikut[]">Seni Musik</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Musik Daerah" name="diklat_ikut[]">Seni Musik Daerah</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Teater" name="diklat_ikut[]">Seni Teater</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Tari" name="diklat_ikut[]">Seni Tari</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Keterampilan" name="diklat_ikut[]">Seni Keterampilan</label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="diklat_butuh" class="control-label col-sm-2">MAPEL DIKLAT YANG DIBUTUHKAN :</label>
                            <div class="col-sm-10">
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Rupa" name="diklat_butuh[]">Seni Rupa</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Musik" name="diklat_butuh[]">Seni Musik</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Musik Daerah" name="diklat_butuh[]">Seni Musik Daerah</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Teater" name="diklat_butuh[]">Seni Teater</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Tari" name="diklat_butuh[]">Seni Tari</label>
                              <label class="checkbox-inline"><input type="checkbox" value="Seni Keterampilan" name="diklat_butuh[]">Seni Keterampilan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-default" value="Tambah" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
