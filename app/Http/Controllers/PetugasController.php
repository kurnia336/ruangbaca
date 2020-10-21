<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table petugas
    	$petugas = DB::table('petugas')->paginate(5);// untuk membagi record menjadi beberapa halaman
 
    	// mengirim data petugas ke view index
    	return view('admin.petugas.petugas',['petugas' => $petugas]);
 
    }

    public function tambah()
	{
	 
		// memanggil view tambah
		return view('admin.petugas.tambah_petugas');
	 
	}

	// method untuk insert data ke table petugas
	public function simpan(Request $request)
	{
		// insert data ke table pegawai
		DB::table('petugas')->insert([
			'ID_PETUGAS' => $request->ID_PETUGAS,
			'NAMA_PETUGAS' => $request->NAMA_PETUGAS,
			'JABATAN' => $request->JABATAN,
			'NO_TELP_PETUGAS' => $request->NO_TELP_PETUGAS,
			'EMAIL_PETUGAS' => $request->EMAIL_PETUGAS,
			'ALAMAT_PETUGAS' => $request->ALAMAT_PETUGAS
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Tambah Berhasil']);//notifikasi 
	 
	}

	// method untuk edit data petugas
	public function edit($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		$petugas = DB::table('petugas')->where('ID_PETUGAS',$id)->get();
		// passing data petugas yang didapat ke view 
		return view('admin.petugas.edit_petugas',['petugas' => $petugas]);
	 
	}

	// update data pegawai
	public function update(Request $request)
	{
		// update data petugas
		DB::table('petugas')->where('ID_PETUGAS',$request->ID_PETUGAS)->update([
			'NAMA_PETUGAS' => $request->NAMA_PETUGAS,
			'JABATAN' => $request->JABATAN,
			'NO_TELP_PETUGAS' => $request->NO_TELP_PETUGAS,
			'EMAIL_PETUGAS' => $request->EMAIL_PETUGAS,
			'ALAMAT_PETUGAS' => $request->ALAMAT_PETUGAS
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Update Berhasil']);//notifikasi 
	}

	// method untuk hapus data petugas
	public function hapus($id)
	{
		// menghapus data petugas berdasarkan id yang dipilih
		DB::table('petugas')->where('ID_PETUGAS',$id)->delete();
			
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Hapus Berhasil']);//notifikasi 
	}

	//funtion cari/search untuk saat ini masih menggunakan where nama
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$petugas = DB::table('petugas')
		->where('NAMA_PETUGAS','like',"%".$cari."%")
		->orWhere('JABATAN','like',"%".$cari."%")
		->orWhere('NO_TELP_PETUGAS','like',"%".$cari."%")
		->orWhere('EMAIL_PETUGAS','like',"%".$cari."%")
		->orWhere('ALAMAT_PETUGAS','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.petugas.petugas',['petugas' => $petugas]);
 
	}
}
