<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//untuk komponen Database
use App\Anggota;

class AnggotaController extends Controller
{
	//
	
    public function index()
    {
    	// mengambil data dari table anggota
    	// $anggota = DB::table('anggota')->paginate(5);// untuk membagi record menjadi beberapa halaman
		$anggota = anggota::paginate(5);
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
			'ID_ANGGOTA' => $request->ID_ANGGOTA,
			'NAMA_ANGGOTA' => $request->NAMA_ANGGOTA,
			'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
			'NO_TELP_ANGGOTA' => $request->NO_TELP_ANGGOTA,
			'EMAIL_ANGGOTA' => $request->EMAIL_ANGGOTA,
			'ALAMAT_ANGGOTA' => $request->ALAMAT_ANGGOTA
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
		DB::table('anggota')->where('ID_ANGGOTA',$request->ID_ANGGOTA)->update([
			'NAMA_ANGGOTA' => $request->NAMA_ANGGOTA,
			'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
			'NO_TELP_ANGGOTA' => $request->NO_TELP_ANGGOTA,
			'EMAIL_ANGGOTA' => $request->EMAIL_ANGGOTA,
			'ALAMAT_ANGGOTA' => $request->ALAMAT_ANGGOTA
		]);
		// alihkan halaman ke halaman anggota
		return redirect('/anggota/anggota')->with(['success' => 'Update Berhasil']);//notifikasi
	}

	// method untuk hapus data anggota
	public function hapus($id)
	{
		// menghapus data anggota berdasarkan id yang dipilih
		DB::table('anggota')->where('ID_ANGGOTA',$id)->delete();
			
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
		->where('NAMA_ANGGOTA','like',"%".$cari."%")
		->orWhere('JENIS_KELAMIN','like',"%".$cari."%")
		->orWhere('NO_TELP_ANGGOTA','like',"%".$cari."%")
		->orWhere('EMAIL_ANGGOTA','like',"%".$cari."%")
		->orWhere('ALAMAT_ANGGOTA','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.anggota.anggota',['anggota' => $anggota]);
 
	}

	public function hapusSementara($id){
    	$anggota = anggota::find($id);
    	$anggota->delete();
 
    	return redirect('/anggota/anggota')->with(['success' => 'Hapus Sementara Berhasil']);//notifikasi
    }

    // menampilkan data guru yang sudah dihapus
    public function anggota_tidakAktif(){
    	// mengampil data guru yang sudah dihapus
    	$anggota = anggota::onlyTrashed()->paginate(5);
    	return view('admin.anggota.anggota_tidakAktif', ['anggota' => $anggota]);
    }

    public function kembalikan($id){
    	$anggota = anggota::onlyTrashed()->where('ID_ANGGOTA',$id);
    	$anggota->restore();
    	return redirect('/anggota/anggota')->with(['success' => 'Restore Berhasil']);//notifikasi
    }

    
    public function kembalikan_semua(){	
    	$anggota = anggota::onlyTrashed();
    	$anggota->restore();
    	return redirect('/anggota/anggota')->with(['success' => 'Restore Berhasil']);//notifikasi
    }

    // hapus permanen
    public function hapusPermanen($id){
    	// hapus permanen data guru
    	$anggota = anggota::onlyTrashed()->where('ID_ANGGOTA',$id);
    	$anggota->forceDelete();
    	return redirect('/anggota/anggota_tidakAktif')->with(['success' => 'Hapus Permanen Berhasil']);//notifikasi
    }

    public function hapusPermanen_semua(){
    	// hapus permanen data guru
    	$peminjaman = peminjaman::onlyTrashed();
    	$peminjaman->forceDelete();
    	return redirect('/anggota/anggota_tidakAktif')->with(['success' => 'Hapus Permanen Berhasil']);//notifikasi
    }
}
