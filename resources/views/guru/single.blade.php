@extends('layouts.app') @section('content')
<div class="container">
 <div class="row">
   <div class="col-md-12">
     <div class="panel panel-default">
       <div class="panel-heading">Tampil Guru</div>
       <div class="panel-body">

         <div class="container col-md-12">
           <ul class="nav nav-tabs">
             <li class="active"><a data-toggle="tab" href="#home">Data Guru</a></li>
             <li><a data-toggle="tab" href="#menu1">Mata Pelajaran</a></li>
             <li><a data-toggle="tab" href="#menu2">Hasil TNA</a></li>
             {{-- <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> --}}
           </ul>

           <div class="tab-content">
             <div id="home" class="tab-pane fade in active">
               <form role="form" class="form-horizontal">
                 <div class="">&nbsp;</div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">NAMA:</label>
                   <div class="form-control-static">
                     {{$guru->nama}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">JENIS KELAMIN:</label>
                   <div class="form-control-static">
                     {{$guru->jenkel}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">NOPES:</label>
                   <div class="form-control-static">
                     {{$guru->nopes}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">NUPTK:</label>
                   <div class="form-control-static">
                     {{$guru->nuptk}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">NIP:</label>
                   <div class="form-control-static">
                     {{$guru->nip}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">TEMPAT LAHIR:</label>
                   <div class="form-control-static">
                     {{$guru->tempat_lahir}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">TANGGAL LAHIR:</label>
                   <div class="form-control-static">
                     {{$guru->tanggal_lahir}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">HANDPHONE:</label>
                   <div class="form-control-static">
                     {{$guru->handphone}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">JENJANG:</label>
                   <div class="form-control-static">
                     {{$guru->jenjang->jenjang_sekolah}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">SEKOLAH:</label>
                   <div class="form-control-static">
                     {{$guru->tempat}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">ALAMAT SEKOLAH:</label>
                   <div class="form-control-static">
                     {{$guru->alamat}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">KECAMATAN:</label>
                   <div class="form-control-static">
                     {{$guru->kecamatan}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">KABUPATEN:</label>
                   <div class="form-control-static">
                     {{$guru->kabupaten}}
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="control-label col-sm-2">PROVINSI:</label>
                   <div class="form-control-static">
                     {{$guru->provinsi}}
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                     {{csrf_field()}}
                   </div>
                 </div>
               </form>
             </div>
             <div id="menu1" class="tab-pane fade">
               <form role="form" class="form-horizontal">
               <div class="">&nbsp;</div>
               <div class="form-group">
                 <label>MATA PELAJARAN YANG DIAMPU:</label>
               </div>
               <div class="form-control-static">
                 @foreach ($guru->mapel as $mapel)
                   <div class="">
                     {{$mapel->mapel}}
                   </div>
                 @endforeach
               </div>
               <div class="form-group">
                 <label>MAPEL DIKLAT YANG PERNAH DIIKUTI:</label>
               </div>
               <div class="form-control-static">
                 @foreach ($guru->diklat_ikut as $diklat_ikut)
                    <div class="">
                      {{$diklat_ikut->diklat_ikut}}
                    </div>
                 @endforeach
               </div>
               <div class="form-group">
                 <label>MAPEL DIKLAT YANG DIBUTUHKAN:</label>
               </div>
               <div class="form-control-static">
                 @foreach ($guru->diklat_butuh as $diklat_butuh)
                   <div class="">
                     {{$diklat_butuh->diklat_butuh}}
                   </div>
                 @endforeach
               </div>
             </div>
           </form>
             <div id="menu2" class="tab-pane fade col-md-8">
               <div class="">&nbsp;</div>
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th>KATEGORI TNA</th>
                     <th>HASIL TNA</th>
                   </tr>
                 </thead>
                 <tbody>
                   @foreach ($guru->hasil_tna as $hasil_tna)
                   <tr>
                        <td>{{$hasil_tna->guru->jenjang->jenjang_sekolah}} - {{$hasil_tna->kategori_tna->kategori_tna}}</td>
                       <td>{{$hasil_tna->hasil_akhir}}</td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
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
</div>

@endsection
