@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Detil TNA</div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" action="/detil_tna/{{$detiltna->id}}" method="post">
                      <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('detil_tna') ? ' has-error' : '' }}">
                            <label for="detil_tna" class="control-label col-sm-2">Detil TNA:</label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="50" class="form-control" id="detil_tna" type="text" name="detil_tna"  placeholder="Masukkan detil TNA">{{$detiltna->detil_tna}}</textarea>
                                @if ($errors->has('detil_tna'))
                                  <span class="help-block">{{ $errors->first('detil_tna')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori_tna_id') ? ' has-error' : '' }}">
                            <label for="kategori_tna_id" class="control-label col-sm-2">Kategori TNA:</label>
                            <div class="col-sm-4">
                              <select name="kategori_tna_id" class="form-control">
                                <option value="" @if($detiltna->kategori_tna_id == '')selected @endif></option>
                                @foreach ($kategoritna as $kategoritna)
                                  <option value="{{$kategoritna->id}}" @if($detiltna->kategori_tna_id == $kategoritna->id)selected @endif>{{$kategoritna->kategori_tna}}</option>
                                @endforeach
                              </select>
                                @if ($errors->has('kategori_tna_id'))
                                  <span class="help-block">Kategori TNA harus diisi</span>
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
