<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// route guru
Route::get('/guru/excel','GuruController@excel');
Route::get('/guru/pdf','GuruController@pdf');
Route::get('/guru/grafik','GuruController@grafikGuru');
Route::get('/guru','GuruController@index');
Route::get('/guru/create','GuruController@create');
Route::post('/guru','GuruController@store');
Route::get('/guru/{id}/hapus','GuruController@delete');
Route::get('/guru/{id}','GuruController@show');
Route::get('/guru/{id}/edit','GuruController@edit');
Route::put('/guru/{id}','GuruController@update');
Route::get('/home', 'HomeController@index');

//route jenjang
Route::get('/jenjang','JenjangController@index');
Route::get('/jenjang/create','JenjangController@create');
Route::post('/jenjang','JenjangController@store');
Route::get('/jenjang/{id}/hapus','JenjangController@delete');
Route::get('/jenjang/{id}','JenjangController@show');
Route::get('/jenjang/{id}/edit','JenjangController@edit');
Route::put('/jenjang/{id}','JenjangController@update');

//route kategori_tna
Route::get('/kategori_tna','KategoritnaController@index');
Route::get('/kategori_tna/create','KategoritnaController@create');
Route::post('/kategori_tna','KategoritnaController@store');
Route::get('/kategori_tna/{id}/hapus','KategoritnaController@delete');
Route::get('/kategori_tna/{id}','KategoritnaController@show');
Route::get('/kategori_tna/{id}/edit','KategoritnaController@edit');
Route::put('/kategori_tna/{id}','KategoritnaController@update');

//route detil_tna
Route::get('/detil_tna','DetiltnaController@index');
Route::get('/detil_tna/create','DetiltnaController@create');
Route::post('/detil_tna','DetiltnaController@store');
Route::get('/detil_tna/{id}/hapus','DetiltnaController@delete');
Route::get('/detil_tna/{id}','DetiltnaController@show');
Route::get('/detil_tna/{id}/edit','DetiltnaController@edit');
Route::put('/detil_tna/{id}','DetiltnaController@update');

//route mapel
Route::post('/mapel','MapelController@store');
Route::put('/mapel/{id}','MapelController@update');

//route nilai_tna
// Route::post('/nilai_tna','Nilaitna@store');
Route::get('/nilai_tna/create','NilaitnaController@create');
Route::post('/nilai_tna','NilaitnaController@store');


//route lap hasil
Route::get('/lap_hasil','LaphasilController@index');
Route::get('/lap_hasil/excel','LaphasilController@excel');
Route::get('/lap_hasil/mapel','LaphasilController@grafikMapel');
Route::get('/lap_hasil/mapel_butuh','LaphasilController@grafikMapelButuh');
Route::get('/lap_hasil/mapel_ikut','LaphasilController@grafikMapelIkut');
Route::get('/lap_hasil/guru','LaphasilController@guru');
Route::get('/lap_hasil/jumlahgurujenjang','LaphasilController@jumlahGuruJenjang');
Route::get('/lap_hasil/jumlahgurukompetensi','LaphasilController@jumlahGuruKompetensi');

//untuk cek query
Route::get('/testmodel', function() {
$query =  DB::select(DB::raw("SELECT jenjang.jenjang_sekolah as jenjang, Count(jenjang.jenjang_sekolah) as jumlah FROM guru INNER JOIN jenjang ON guru.jenjang_id = jenjang.id GROUP BY jenjang.jenjang_sekolah"));
return $query;
});
