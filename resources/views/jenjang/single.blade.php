@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">EDIT JENJANG</div>
                <div class="panel-body">
                  <form role="form" class="form-horizontal" action="/jenjang/{{$jenjang->id}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('jenjang_sekolah') ? ' has-error' : '' }}">
                            <label for="jenjang_sekolah" class="control-label col-sm-2">JENJANG:</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="jenjang_sekolah" type="text" name="jenjang_sekolah" size="30" value="{{$jenjang->jenjang_sekolah}}" placeholder="Masukkan jenjang sekolah">
                                @if ($errors->has('jenjang_sekolah'))
                                  <span class="help-block">{{ $errors->first('jenjang_sekolah')}}</span>
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
