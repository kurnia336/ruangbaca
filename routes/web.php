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
Route::get('/buku_index', 'BukuController@index')->name('buku_index');
Route::get('/buku_tampil', 'BukuController@tampil')->name('buku_tampil');
Route::get('/buku_tambah', 'BukuController@tambah')->name('buku_tambah');
Route::post('/buku_simpan', 'BukuController@simpan');
Route::get('/buku_edit/{id_buku}', 'BukuController@edit')->name('buku_edit');
Route::post('/buku_update', 'BukuController@update')->name('buku_update');
Route::get('/buku_hapus/{id_buku}', 'BukuController@hapus')->name('buku_hapus');
Route::get('/buku_cari','BukuController@cari');

//petugas
Route::get('/petugas','PetugasController@index'); //MENAMPILKAN HALAMAN PETUGAS/BUKU
Route::get('/petugas/tambah','PetugasController@tambah'); //MENAMPILKAN HALAMAN TAMBAH
Route::post('/petugas/simpan','PetugasController@simpan'); //MENYIMPAN FORM DARI HALAMAN TAMBAH
Route::get('/petugas/edit/{id_petugas}','PetugasController@edit');
Route::post('/petugas/update','PetugasController@update');
Route::get('/petugas/hapus/{id_petugas}','PetugasController@hapus');
Route::get('/petugas/cari','PetugasController@cari');

//anggota
Route::get('/anggota','AnggotaController@index');
Route::get('/anggota/tambah','AnggotaController@tambah');
Route::post('/anggota/simpan','AnggotaController@simpan');
Route::get('/anggota/edit/{id_petugas}','AnggotaController@edit');
Route::post('/anggota/update','AnggotaController@update');
Route::get('/anggota/hapus/{id_petugas}','AnggotaController@hapus');
Route::get('/anggota/cari','AnggotaController@cari');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
