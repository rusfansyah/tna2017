@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Kategori TNA</div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" action="/kategori_tna" method="post">
                        <div class="form-group{{ $errors->has('kategori_tna') ? ' has-error' : '' }}">
                            <label for="kategori_tna" class="control-label col-sm-2">KATEGORI TNA:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="kategori_tna" type="text" name="kategori_tna" size="30" value="{{old('kategori_tna')}}" placeholder="Masukkan kategori_tna">
                                @if ($errors->has('kategori_tna'))
                                  <span class="help-block">{{ $errors->first('kategori_tna')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenjang_id') ? ' has-error' : '' }}">
                            <label for="jenjang_id" class="control-label col-sm-2">JENJANG SEKOLAH:</label>
                            <div class="col-sm-4">
                              <select name="jenjang_id" class="form-control">
                                <option value="" @if(old('jenjang_id') == '')selected @endif></option>
                                @foreach ($jenjang as $jenjang)
                                  <option value="{{$jenjang->id}}" @if(old('jenjang_id') == $jenjang->id)selected @endif>{{$jenjang->jenjang_sekolah}}</option>
                                @endforeach
                              </select>
                                @if ($errors->has('jenjang_id'))
                                  <span class="help-block">Jenjang Sekolah harus diisi</span>
                                @endif
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
