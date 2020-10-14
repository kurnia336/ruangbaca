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
			'id_petugas' => $request->id_petugas,
			'nama_petugas' => $request->nama_petugas,
			'jabatan' => $request->jabatan,
			'notelp_petugas' => $request->notelp_petugas,
			'email_petugas' => $request->email_petugas,
			'alamat_petugas' => $request->alamat_petugas
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Tambah Berhasil']);//notifikasi 
	 
	}

	// method untuk edit data petugas
	public function edit($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
		$petugas = DB::table('petugas')->where('id_petugas',$id)->get();
		// passing data petugas yang didapat ke view 
		return view('admin.petugas.edit_petugas',['petugas' => $petugas]);
	 
	}

	// update data pegawai
	public function update(Request $request)
	{
		// update data petugas
		DB::table('petugas')->where('id_petugas',$request->id_petugas)->update([
			'nama_petugas' => $request->nama_petugas,
			'jabatan' => $request->jabatan,
			'notelp_petugas' => $request->notelp_petugas,
			'email_petugas' => $request->email_petugas,
			'alamat_petugas' => $request->alamat_petugas
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Update Berhasil']);//notifikasi 
	}

	// method untuk hapus data petugas
	public function hapus($id)
	{
		// menghapus data petugas berdasarkan id yang dipilih
		DB::table('petugas')->where('id_petugas',$id)->delete();
			
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
		->where('nama_petugas','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.petugas.petugas',['petugas' => $petugas]);
 
	}
}
