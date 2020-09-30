<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BukuController extends Controller
{
    public function tampil(){
    	// mengambil data dari table petugas
    	$buku = DB::table('buku')->paginate(5);
 
    	// mengirim data petugas ke view index
    	return view('admin.buku',['buku' => $buku]);
    } 

    public function index(){
    	return view('admin.buku');
    }
    // method untuk insert data ke table petugas
	public function simpan(Request $request)
	{
		// insert data ke table pegawai
		DB::table('buku')->insert([
			'id_buku' => $request->id_buku,
			'judul_buku' => $request->judul_buku,
			'penulis_buku' => $request->penulis_buku,
			'penerbit' => $request->penerbit,
			'tahun_terbit' => $request->tahun_terbit,
			'stok' => $request->stok
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/buku_tampil')->with(['success' => 'Tambah Berhasil']);
	 
	}

	public function tambah(){
    	return view('admin.tambah_buku');
    }

    // method untuk edit data petugas
	public function edit($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		$buku = DB::table('buku')->where('id_buku',$id)->get();
		// passing data petugas yang didapat ke view 
		return view('admin.edit_buku',['buku' => $buku]);
	 
	}

	public function update(Request $request)
	{
		// insert data ke table pegawai
		DB::table('buku')->where('id_buku',$request->id_buku)->update([
			'judul_buku' => $request->judul_buku,
			'penulis_buku' => $request->penulis_buku,
			'penerbit' => $request->penerbit,
			'tahun_terbit' => $request->tahun_terbit,
			'stok' => $request->stok
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/buku_tampil')->with(['success' => 'Update Berhasil']);
	 
	}

	public function hapus($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		DB::table('buku')->where('id_buku',$id)->delete();
		// passing data petugas yang didapat ke view 
		return redirect('/buku_tampil')->with(['success' => 'Hapus Berhasil']);
	 
	}

	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$buku = DB::table('buku')
		->where('judul_buku','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.buku',['buku' => $buku]);
 
	}
}
