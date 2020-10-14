<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//untuk komponen Database

class AnggotaController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table anggota
    	$anggota = DB::table('anggota')->paginate(5);// untuk membagi record menjadi beberapa halaman
 
    	// mengirim data anggota ke view index
    	return view('admin.anggota.anggota',['anggota' => $anggota]);
 
    }

    public function tambah()
	{
	 
		// memanggil view tambah
		return view('admin.anggota.tambah_anggota');
	 
	}

	// method untuk insert data ke table anggota
	public function simpan(Request $request)
	{
		// insert data ke table pegawai
		DB::table('anggota')->insert([
			'id_anggota' => $request->id_anggota,
			'nama_anggota' => $request->nama_anggota,
			'jk_anggota' => $request->jk_anggota,
			'notelp_anggota' => $request->notelp_anggota,
			'email_anggota' => $request->email_anggota,
			'alamat_anggota' => $request->alamat_anggota
		]);
		// alihkan halaman ke halaman anggota
		return redirect('/anggota/anggota')->with(['success' => 'Tambah Berhasil']);//notifikasi
	 
	}

	// method untuk edit data anggota
	public function edit($id)
	{
		// mengambil data anggota berdasarkan id yang dipilih
		$anggota = DB::table('anggota')->where('id_anggota',$id)->get();
		// passing data anggota yang didapat ke view 
		return view('admin.anggota.edit_anggota',['anggota' => $anggota]);
	 
	}

	// update data pegawai
	public function update(Request $request)
	{
		// update data anggota
		DB::table('anggota')->where('id_anggota',$request->id_anggota)->update([
			'nama_anggota' => $request->nama_anggota,
			'jk_anggota' => $request->jk_anggota,
			'notelp_anggota' => $request->notelp_anggota,
			'email_anggota' => $request->email_anggota,
			'alamat_anggota' => $request->alamat_anggota
		]);
		// alihkan halaman ke halaman anggota
		return redirect('/anggota/anggota')->with(['success' => 'Update Berhasil']);//notifikasi
	}

	// method untuk hapus data anggota
	public function hapus($id)
	{
		// menghapus data anggota berdasarkan id yang dipilih
		DB::table('anggota')->where('id_anggota',$id)->delete();
			
		// alihkan halaman ke halaman anggota
		return redirect('/anggota/anggota')->with(['success' => 'Hapus Berhasil']);//notifikasi
	}

	//funtion cari/search untuk saat ini masih menggunakan where nama
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$anggota = DB::table('anggota')
		->where('nama_anggota','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.anggota.anggota',['anggota' => $anggota]);
 
	}
}
