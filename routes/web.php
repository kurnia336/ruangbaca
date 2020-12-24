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
Route::get('/cari_rak', 'BukuController@loadData_rak');
Route::get('/cari_jenisbuku', 'BukuController@loadData_jenisBuku');
Route::get('/cari_penerbit', 'BukuController@loadData_penerbit');

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
Route::get('/anggota/hapusSementara/{id_petugas}', 'AnggotaController@hapusSementara');
Route::get('/anggota/kembalikan/{id_petugas}', 'AnggotaController@kembalikan');
Route::get('/anggota/kembalikan_semua', 'AnggotaController@kembalikan_semua');
Route::get('/anggota/anggota_tidakAktif', 'AnggotaController@anggota_tidakAktif');
Route::get('/anggota/hapusPermanen/{id_petugas}', 'AnggotaController@hapusPermanen');
Route::get('/anggota/hapusPermanen_semua', 'AnggotaController@hapusPermanen_semua');


//rak
Route::get('/rak/rak_index', 'RakController@index')->name('rak_index');
Route::get('/rak/rak_tampil', 'RakController@tampil')->name('rak_tampil');
Route::get('/rak/rak_tambah', 'RakController@tambah')->name('rak_tambah');
Route::post('/rak/rak_simpan', 'RakController@simpan');
Route::get('/rak/rak_edit/{id_rak}', 'RakController@edit')->name('rak_edit');
Route::post('/rak/rak_update', 'RakController@update')->name('rak_update');
Route::get('/rak_hapus/{id_rak}', 'RakController@hapus')->name('rak_hapus');
Route::get('/rak_cari','RakController@cari');//nambah route cari

//jenisbuku
Route::get('/jenisbuku/jenisbuku_index', 'JenisbukuController@index')->name('jenisbuku_index');
Route::get('/jenisbuku/jenisbuku_tampil', 'JenisbukuController@tampil')->name('jenisbuku_tampil');
Route::get('/jenisbuku_tambah', 'JenisbukuController@tambah')->name('jenisbuku_tambah');
Route::post('/jenisbuku_simpan', 'JenisbukuController@simpan');
Route::get('/jenisbuku_edit/{id_rak}', 'JenisbukuController@edit')->name('jenisbuku_edit');
Route::post('/jenisbuku_update', 'JenisbukuController@update')->name('jenisbuku_update');
Route::get('/jenisbuku_hapus/{id_rak}', 'JenisbukuController@hapus')->name('jenisbuku_hapus');
Route::get('/jenisbuku_cari','JenisbukuController@cari');//nambah route cari

//penerbit
Route::get('/penerbit/penerbit_index', 'PenerbitController@index')->name('penerbit_index');
Route::get('/penerbit/penerbit_tampil', 'PenerbitController@tampil')->name('penerbit_tampil');
Route::get('/penerbit_tambah', 'PenerbitController@tambah')->name('penerbit_tambah');
Route::post('/penerbit_simpan', 'PenerbitController@simpan');
Route::get('/penerbit_edit/{id_penerbit}', 'PenerbitController@edit')->name('penerbit_edit');
Route::post('/penerbit_update', 'PenerbitController@update')->name('penerbit_update');
Route::get('/penerbit_hapus/{id_penerbit}', 'PenerbitController@hapus')->name('penerbit_hapus');
Route::get('/penerbit_cari','PenerbitController@cari');//nambah route cari

//peminjaman
Route::get('/peminjaman/peminjaman', 'PeminjamanController@index');
Route::get('/peminjaman/peminjaman/tambah', 'PeminjamanController@tambah');
Route::post('/peminjaman/peminjaman/simpan', 'PeminjamanController@simpan');
Route::get('/peminjaman/peminjaman/simpan_pengembalian/{id_peminjaman}', 'PeminjamanController@simpan_pengembalian');
Route::get('/peminjaman/peminjaman/edit/{id_peminjaman}', 'PeminjamanController@edit');
// Route::put('/peminjaman/peminjaman/update/{id_peminjaman}/{id_buku}', 'PeminjamanController@update');
Route::put('/peminjaman/peminjaman/update/{id_peminjaman}', 'PeminjamanController@update');
Route::get('/peminjaman_cari','PeminjamanController@cari');
Route::get('/peminjaman/hapusSementara/{id_peminjaman}', 'PeminjamanController@hapusSementara');
Route::get('/peminjaman/kembalikan/{id_peminjaman}', 'PeminjamanController@kembalikan');
Route::get('/peminjaman/kembalikan_semua', 'PeminjamanController@kembalikan_semua');
Route::get('/peminjaman/peminjaman_tongSampah', 'PeminjamanController@tongSampah');
Route::get('/peminjaman/hapusPermanen/{id_peminjaman}', 'PeminjamanController@hapusPermanen');
Route::get('/peminjaman/hapusPermanen_semua', 'PeminjamanController@hapusPermanen_semua');
Route::get('/cari_anggota', 'PeminjamanController@loadData_anggota');
Route::get('/cari_buku', 'PeminjamanController@loadData_buku');

//pengembalian
Route::get('/pengembalian/pengembalian', 'PengembalianController@index');
Route::get('/pengembalian/pengembalian/tambah', 'PengembalianController@tambah');
Route::post('/pengembalian/pengembalian/simpan', 'PengembalianController@simpan');
Route::get('/pengembalian/pengembalian/edit/{id_pengembalian}', 'PengembalianController@edit');
Route::put('/pengembalian/pengembalian/update/{id_pengembalian}', 'PengembalianController@update');
Route::get('/pengembalian_cari','PengembalianController@cari');
Route::get('/pengembalian/hapusSementara/{id_pengembalian}', 'PengembalianController@hapusSementara');
Route::get('/pengembalian/kembalikan/{id_pengembalian}', 'PengembalianController@kembalikan');
Route::get('/pengembalian/kembalikan_semua', 'PengembalianController@kembalikan_semua');
Route::get('/pengembalian/pengembalian_tongSampah', 'PengembalianController@tongSampah');
Route::get('/pengembalian/hapusPermanen/{id_pengembalian}', 'PengembalianController@hapusPermanen');
Route::get('/pengembalian/hapusPermanen_semua', 'PengembalianController@hapusPermanen_semua');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Anggota')->name('anggota.')->prefix('anggota')->group(function () {
   Route::get('login', 'AnggotaAuthController@getLogin')->name('login');
   Route::post('login', 'AnggotaAuthController@postLogin');
});

Route::middleware('auth:anggota')->group(function(){
   //here all your admin routes
   // Route::get('/peminjaman/peminjaman', 'PeminjamanController@index');
 });
