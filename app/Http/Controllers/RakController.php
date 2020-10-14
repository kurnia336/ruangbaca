<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RakController extends Controller
{
    //
    public function tampil(){
    	// mengambil data dari table petugas
    	// $rak = DB::table('rak')->paginate(5);// untuk membagi record menjadi beberapa halaman
        $rak = DB::table('rak as r')
        ->select('r.*','b.judul_buku')
        ->join('buku as b','b.id_buku', '=', 'r.id_buku')
		->paginate(5);
    	// mengirim data petugas ke view index
    	return view('admin.rak',['rak' => $rak]);
    } 

    public function index(){
    	return view('admin.rak');
    }

    public function simpan(Request $request)
	{
        $numeric_id = intval(substr($request['id_rak'], 1)); //retrieve numeric value of 'V001' (1)
        $numeric_id++; //increment
        if(mb_strlen($numeric_id) == 1)
        {
            $zero_string = '00';
        }elseif(mb_strlen($numeric_id) == 2)
        {
            $zero_string = '0';
        }else{
            $zero_string = '';
        }
        $new_id = 'RK'.$zero_string.$numeric_id;
        
		// insert data ke table pegawai
		DB::table('rak')->insert([
			'id_rak' => $new_id,
			'id_buku' => $request->id_buku,
			'nama_rak' => $request->nama_rak,
			'lokasi_rak' => $request->lokasi_rak,
			// join('buku','id_buku', '=', 'rak.id_buku'),
			// select('buku.id_buku','rak.id_buku'),
			// get()
		]);
		// alihkan halaman ke halaman petugas
		return redirect('/rak_tampil')->with(['success' => 'Tambah Berhasil']);//notifikasi 

    }
    
    public function tambah(){
        $buku = DB::table('buku')->pluck("judul_buku","id_buku");
        return view('admin.tambah_rak',compact('buku'));
    	// return view('admin.tambah_rak');
    }

    public function edit($id)
	{
		// mengambil data petugas berdasarkan id yang dipilih
        $rak = DB::table('rak')->where('id_rak',$id)->get();
        $buku = DB::table('buku')->pluck("judul_buku","id_buku");
		// passing data petugas yang didapat ke view 
		return view('admin.edit_rak',['rak' => $rak],compact('buku'));

    }
    
    public function update(Request $request)
	{
		// insert data ke table pegawai
		DB::table('rak')->where('id_rak',$request->id_rak)->update([
			'id_buku' => $request->id_buku,
			'nama_rak' => $request->nama_rak,
			'lokasi_rak' => $request->lokasi_rak,
			// join('buku','id_buku', '=', 'rak.id_buku'),
			// select('buku.id_buku','rak.id_buku'),
			// get()
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
        $rak = DB::table('rak as r')
        ->select('r.id_rak','r.nama_rak','r.lokasi_rak','b.judul_buku')
        ->join('buku as b','b.id_buku', '=', 'r.id_buku')
        ->where('r.id_rak','like',"%".$cari."%")
        ->orWhere('b.judul_buku','like',"%".$cari."%")
        ->orWhere('r.nama_rak','like',"%".$cari."%")
        ->orWhere('r.lokasi_rak','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('admin.rak',['rak' => $rak]);

    }
    

}
