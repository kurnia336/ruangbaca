<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PetugasController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table petugas
    	$petugas = DB::table('petugas')->where('STATUS_PETUGAS', '=', 0)
    	->orderBy('ID_PETUGAS', 'ASC')
    	->paginate(5);// untuk membagi record menjadi beberapa halaman
 
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
		$user = new \App\User;
		$user->role = 'Petugas';
		$user->name = $request->NAMA_PETUGAS;
		$user->email = $request->EMAIL_PETUGAS;
		$user->password = bcrypt('rahasia');
		$user->remember_token = str_random(60);
		$user->save();

		// insert data ke table pegawai
		DB::table('petugas')->insert([
			'ID_PETUGAS' => $request->ID_PETUGAS,
			'USER_ID' => $user->id,
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

	public function nonaktif_petugas($id_petugas){
		DB::table('petugas')->where('ID_PETUGAS',$id_petugas)->update([
			'STATUS_PETUGAS' => 1
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Penonaktifan Berhasil']);//notifikasi
	}

	public function aktifkan_petugas($id_petugas){
		DB::table('petugas')->where('ID_PETUGAS',$id_petugas)->update([
			'STATUS_PETUGAS' => 0
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/petugas/petugas')->with(['success' => 'Pengaktifan Berhasil']);//notifikasi
	}

	public function petugas_tongSampah()
    {
    	// mengambil data dari table petugas
    	$petugas = DB::table('petugas')->where('STATUS_PETUGAS', '=', 1)->paginate(5);// untuk membagi record menjadi beberapa halaman
 
    	// mengirim data petugas ke view index
    	return view('admin.petugas.petugas_tongSampah',['petugas' => $petugas]);
 
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
