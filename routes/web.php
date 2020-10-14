<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
   return view('welcome');
});


Route::get('/about', function () {
   return view('admin/about');
});

//buku
Route::get('/buku/buku_index', 'BukuController@index')->name('buku_index');
Route::get('/buku/buku_tampil', 'BukuController@tampil')->name('buku_tampil');
Route::get('/buku/buku_tambah', 'BukuController@tambah')->name('buku_tambah');
Route::post('/buku/buku_simpan', 'BukuController@simpan');
Route::get('/buku/buku_edit/{id_buku}', 'BukuController@edit')->name('buku_edit');
Route::post('/buku/buku_update', 'BukuController@update')->name('buku_update');
Route::get('/buku_hapus/{id_buku}', 'BukuController@hapus')->name('buku_hapus');
Route::get('/buku_cari','BukuController@cari');//nambah route cari

//petugas
Route::get('/petugas/petugas','PetugasController@index'); //MENAMPILKAN HALAMAN PETUGAS/BUKU
Route::get('/petugas/petugas/tambah','PetugasController@tambah'); //MENAMPILKAN HALAMAN TAMBAH
Route::post('/petugas/petugas/simpan','PetugasController@simpan'); //MENYIMPAN FORM DARI HALAMAN TAMBAH
Route::get('/petugas/petugas/edit/{id_petugas}','PetugasController@edit');
Route::post('/petugas/petugas/update','PetugasController@update');
Route::get('/petugas/hapus/{id_petugas}','PetugasController@hapus');
Route::get('/petugas/cari','PetugasController@cari');//nambah route cari

//anggota
Route::get('/anggota/anggota','AnggotaController@index');
Route::get('/anggota/anggota/tambah','AnggotaController@tambah');
Route::post('/anggota/anggota/simpan','AnggotaController@simpan');
Route::get('/anggota/anggota/edit/{id_petugas}','AnggotaController@edit');
Route::post('/anggota/anggota/update','AnggotaController@update');
Route::get('/anggota/hapus/{id_petugas}','AnggotaController@hapus');
Route::get('/anggota/cari','AnggotaController@cari');//nambah route cari

//rak
Route::get('/rak/rak_index', 'RakController@index')->name('rak_index');
Route::get('/rak/rak_tampil', 'RakController@tampil')->name('rak_tampil');
Route::get('/rak/rak_tambah', 'RakController@tambah')->name('rak_tambah');
Route::post('/rak/rak_simpan', 'RakController@simpan');
Route::get('/rak/rak_edit/{id_rak}', 'RakController@edit')->name('rak_edit');
Route::post('/rak/rak_update', 'RakController@update')->name('rak_update');
Route::get('/rak_hapus/{id_rak}', 'RakController@hapus')->name('rak_hapus');
Route::get('/rak_cari','RakController@cari');//nambah route cari

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
