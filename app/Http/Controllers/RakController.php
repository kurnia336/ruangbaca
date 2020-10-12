<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RakController extends Controller
{
    public function tampil(){
    	// mengambil data dari table petugas
    	$rak = DB::table('rak')->paginate(5);// untuk membagi record menjadi beberapa halaman
 
    	// mengirim data petugas ke view index
    	return view('admin.rak',['rak' => $rak]);
    } 

    public function index(){
    	return view('admin.rak');
    }
    // method untuk insert data ke table petugas
	public function simpan(Request $request)
	{
		// insert data ke table pegawai
		DB::table('rak')->insert([
			'id_rak' => $request->id_rak,
			'id_buku' => $request->id_buku,
			'nama_rak' => $request->nama_rak,
			'lokasi_rak' => $request->lokasi_rak,
			join('buku','id_buku', '=', 'rak.id_buku'),
			select('buku.id_buku','rak.id_buku'),
			get()
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/rak_tampil')->with(['success' => 'Tambah Berhasil']);//notifikasi 
	 
	}

	public function tambah(){
    	return view('admin.tambah_rak');
    }

    // method untuk edit data petugas
	public function edit($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		$buku = DB::table('rak')->where('id_rak',$id)->get();
		// passing data petugas yang didapat ke view 
		return view('admin.edit_rak',['rak' => $rak]);
	 
	}

	public function update(Request $request)
	{
		// insert data ke table pegawai
		DB::table('rak')->where('id_rak',$request->id_rak)->update([
			'id_buku' => $request->id_buku,
			'nama_rak' => $request->nama_rak,
			'lokasi_rak' => $request->lokasi_rak
			join('buku','id_buku', '=', 'rak.id_buku'),
			select('buku.id_buku','rak.id_buku'),
			get()
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/rak_tampil')->with(['success' => 'Update Berhasil']);//notifikasi 
	 
	}

	public function hapus($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		DB::table('rak')->where('id_rak',$id)->delete();
		// passing data petugas yang didapat ke view 
		return redirect('/rak_tampil')->with(['success' => 'Hapus Berhasil']);//notifikasi 
	 
	}
	//funtion cari/search untuk saat ini masih menggunakan where nama
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$buku = DB::table('rak')
		->where('nama_rak','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.rak',['rak' => $rak]);
 
	}
}
