<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BukuController extends Controller
{
    public function tampil(){
    	// mengambil data dari table petugas
    	// $buku = DB::table('buku')->paginate(5);// untuk membagi record menjadi beberapa halaman
		$buku = DB::table('buku as b')
        ->select('b.*','r.NAMA_RAK','j.NAMA_JENISBUKU', 'p.NAMA_PENERBIT')
		->join('rak as r','b.ID_RAK', '=', 'r.ID_RAK')
		->join('jenis_buku as j','b.ID_JENISBUKU', '=', 'j.ID_JENISBUKU')
        ->join('penerbit as p','b.ID_PENERBIT', '=', 'p.ID_PENERBIT')
		->paginate(5);

    	// mengirim data petugas ke view index
    	return view('admin.buku.buku',['buku' => $buku]);
    } 

    public function index(){
    	return view('admin.buku.buku');
    }
    // method untuk insert data ke table petugas
	public function simpan(Request $request)
	{
		// insert data ke table pegawai
		DB::table('buku')->insert([
			'ID_BUKU' => $request->ID_BUKU,
			'ID_RAK' => $request->ID_RAK,
			'ID_JENISBUKU' => $request->ID_JENISBUKU,
			'ID_PENERBIT' => $request->ID_PENERBIT,
			'JUDUL_BUKU' => $request->JUDUL_BUKU,
			'PENULIS_BUKU' => $request->PENULIS_BUKU,
			'TAHUN_TERBIT' => $request->TAHUN_TERBIT,
			'STOK' => $request->STOK
			// join('buku','ID_RAK', '=', 'rak.ID_RAK'),
			// select('buku.ID_RAK','rak.ID_RAK'),
			// get()
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/buku/buku_tampil')->with(['success' => 'Tambah Berhasil']);//notifikasi 
	 
	}

	public function tambah(){
		$rak = DB::table('rak')->pluck("NAMA_RAK","ID_RAK");
		$jenis_buku = DB::table('jenis_buku')->pluck("NAMA_JENISBUKU","ID_JENISBUKU");
		$penerbit = DB::table('penerbit')->pluck("NAMA_PENERBIT","ID_PENERBIT");
        return view('admin.buku.tambah_buku',compact('rak','jenis_buku','penerbit'));
    	// return view('admin.buku.tambah_buku');
    }

    // method untuk edit data petugas
	public function edit($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		$buku = DB::table('buku')->where('id_buku',$id)->get();
		$rak = DB::table('rak')->pluck("NAMA_RAK","ID_RAK");
		$jenis_buku = DB::table('jenis_buku')->pluck("NAMA_JENISBUKU","ID_JENISBUKU");
		$penerbit = DB::table('penerbit')->pluck("NAMA_PENERBIT","ID_PENERBIT");
		// passing data petugas yang didapat ke view 
		return view('admin.buku.edit_buku',['buku' => $buku],compact('rak','jenis_buku','penerbit'));
		// passing data petugas yang didapat ke view 
		// return view('admin.buku.edit_buku',['buku' => $buku]);
	 
	}

	public function update(Request $request)
	{
		// insert data ke table pegawai
		DB::table('buku')->where('ID_BUKU',$request->ID_BUKU)->update([
			'ID_RAK' => $request->ID_RAK,
			'ID_JENISBUKU' => $request->ID_JENISBUKU,
			'ID_PENERBIT' => $request->ID_PENERBIT,
			'JUDUL_BUKU' => $request->JUDUL_BUKU,
			'PENULIS_BUKU' => $request->PENULIS_BUKU,
			'TAHUN_TERBIT' => $request->TAHUN_TERBIT,
			'STOK' => $request->STOK
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/buku/buku_tampil')->with(['success' => 'Update Berhasil']);//notifikasi 
	 
	}

	public function hapus($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		DB::table('buku')->where('ID_BUKU',$id)->delete();
		// passing data petugas yang didapat ke view 
		return redirect('/buku/buku_tampil')->with(['success' => 'Hapus Berhasil']);//notifikasi 
	 
	}
	//funtion cari/search untuk saat ini masih menggunakan where nama
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$buku = DB::table('buku as b')
		->select('b.*','r.NAMA_RAK','j.NAMA_JENISBUKU', 'p.NAMA_PENERBIT')
		->join('rak as r','b.ID_RAK', '=', 'r.ID_RAK')
		->join('jenis_buku as j','b.ID_JENISBUKU', '=', 'j.ID_JENISBUKU')
        ->join('penerbit as p','b.ID_PENERBIT', '=', 'p.ID_PENERBIT')
		->where('r.NAMA_RAK','like',"%".$cari."%")
		->orWhere('b.JUDUL_BUKU','like',"%".$cari."%")
		->orWhere('j.NAMA_JENISBUKU','like',"%".$cari."%")
		->orWhere('p.NAMA_PENERBIT','like',"%".$cari."%")
		->orWhere('b.PENULIS_BUKU','like',"%".$cari."%")
		->orWhere('b.TAHUN_TERBIT','like',"%".$cari."%")
		->orWhere('b.STOK','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.buku.buku',['buku' => $buku]);
 
	}
}
