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
                <div class="panel-heading">INSTRUMEN TNA</div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" action="/nilai_tna" method="post">
                      <input type="hidden" name="guru_id" value="{{$gurus->id}}">
                      @foreach ($detiltnas as $detiltna)
                        <input type="hidden" name="detil_tna_id[]" value="{{$detiltna->id}}">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-sm-8">{{$detiltna->kategori_tna}} - {{$detiltna->detil_tna}}:</label>
                            <div class="col-sm-4">
                              <div class="form-group{{ $errors->has('nilai_tna') ? ' has-error' : '' }}">
                              </div>
                              <select class="form-control" name="nilai_tna[]">
                                <option value="0" selected>Tidak mengisi</option>
                                <option value="1">1 Tidak Kompeten</option>
                                <option value="2">2 Kurang Kompeten</option>
                                <option value="3">3 Kompeten</option>
                                <option value="4">4 Sangat Kompeten</option>
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
        </div>
    </div>
</div>
@endsection
