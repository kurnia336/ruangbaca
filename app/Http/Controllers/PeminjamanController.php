<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Peminjaman;
use App\Buku;
use App\Anggota;
use App\Petugas;

class PeminjamanController extends Controller
{
    //
    public function index()
    {
        $peminjaman = peminjaman::paginate(5);
        $anggota = anggota::all();
        $petugas = petugas::all();
        $buku = buku::all();
        // return view('admin.peminjaman.peminjaman', ['peminjaman' => $peminjaman]);
        return view('admin.peminjaman.peminjaman', compact('anggota','petugas','buku','peminjaman'));
    }

    public function tambah(){
        $anggota = DB::table('anggota')->pluck("NAMA_ANGGOTA","ID_ANGGOTA");
        $buku = DB::table('buku')->pluck("JUDUL_BUKU","ID_BUKU");
        $petugas = DB::table('petugas')->pluck("NAMA_PETUGAS","ID_PETUGAS");
        return view('admin.peminjaman.peminjaman_tambah',compact('anggota','buku','petugas'));
    	// return view('admin.peminjaman.peminjaman_tambah');
    }

    public function simpan(Request $request){
        $this->validate($request,[
            // 'ID_PEMINJAMAN' => 'required',
    		'ID_ANGGOTA' => 'required',
            'ID_BUKU' => 'required',
            'ID_PETUGAS' => 'required',
            'TANGGAL_PINJAM' => 'required',
            'TANGGAL_KEMBALI' => 'required'
    	]);
 
        Peminjaman::create([
    		// 'ID_PEMINJAMAN' => $request->ID_PEMINJAMAN,
            'ID_ANGGOTA' => $request->ID_ANGGOTA,
            'ID_BUKU' => $request->ID_BUKU,
            'ID_PETUGAS' => $request->ID_PETUGAS,
            'TANGGAL_PINJAM' => $request->TANGGAL_PINJAM,
            'TANGGAL_KEMBALI' => $request->TANGGAL_KEMBALI
        ]);
        
        return redirect('/peminjaman/peminjaman')->with(['success' => 'Tambah Berhasil']);//notifikasi
    }

    public function edit($id){
        $peminjaman = peminjaman::find($id);
        $anggota = DB::table('anggota')->pluck("NAMA_ANGGOTA","ID_ANGGOTA");
        $buku = DB::table('buku')->pluck("JUDUL_BUKU","ID_BUKU");
        $petugas = DB::table('petugas')->pluck("NAMA_PETUGAS","ID_PETUGAS");
        return view('admin.peminjaman.edit_peminjaman',compact('anggota','buku','petugas','peminjaman'));
    }

    public function update($id, Request $request){
        $this->validate($request,[
            // 'ID_PEMINJAMAN' => 'required',
    		'ID_ANGGOTA' => 'required',
            'ID_BUKU' => 'required',
            'ID_PETUGAS' => 'required',
            'TANGGAL_PINJAM' => 'required',
            'TANGGAL_KEMBALI' => 'required'
        ]);
    
        $peminjaman = peminjaman::find($id);
        $peminjaman->ID_ANGGOTA = $request->ID_ANGGOTA;
        $peminjaman->ID_BUKU = $request->ID_BUKU;
        $peminjaman->ID_PETUGAS = $request->ID_PETUGAS;
        $peminjaman->TANGGAL_PINJAM = $request->TANGGAL_PINJAM;
        $peminjaman->TANGGAL_KEMBALI = $request->TANGGAL_KEMBALI;
        $peminjaman->save();
        return redirect('/peminjaman/peminjaman')->with(['success' => 'Update Berhasil']);//notifikasi
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		// $peminjaman = DB::table('peminjaman as p')
		// ->select('p.*','b.JUDUL_BUKU','a.NAMA_ANGGOTA','pe.NAMA_PETUGAS')
        // ->join('buku as b','b.ID_BUKU', '=', 'p.ID_BUKU')
        // ->join('petugas as pe','pe.ID_PETUGAS', '=', 'p.ID_PETUGAS')
        // ->join('anggota as a','a.ID_ANGGOTA', '=', 'p.ID_ANGGOTA')
		// ->where('b.JUDUL_BUKU','like',"%".$cari."%")
		// ->orWhere('a.NAMA_ANGGOTA','like',"%".$cari."%")
		// ->orWhere('pe.NAMA_PETUGAS','like',"%".$cari."%")
		// ->orWhere('p.TANGGAL_PINJAM','like',"%".$cari."%")
		// ->orWhere('p.TANGGAL_KEMBALI','like',"%".$cari."%")
		// ->paginate();
        $peminjaman = peminjaman::select('peminjaman.*')
        ->join('buku', 'peminjaman.ID_BUKU', '=', 'buku.ID_BUKU')
        ->join('petugas', 'peminjaman.ID_PETUGAS', '=', 'petugas.ID_PETUGAS')
        ->join('anggota', 'peminjaman.ID_ANGGOTA', '=', 'anggota.ID_ANGGOTA')
        ->where('ID_PEMINJAMAN','like',"%".$cari."%")
        ->orWhere('TANGGAL_PINJAM','like',"%".$cari."%")
        ->orWhere('TANGGAL_KEMBALI','like',"%".$cari."%")
        ->orWhere('buku.JUDUL_BUKU','like',"%".$cari."%")
		->orWhere('anggota.NAMA_ANGGOTA','like',"%".$cari."%")
		->orWhere('petugas.NAMA_PETUGAS','like',"%".$cari."%") 
        ->paginate();
    		// mengirim data pegawai ke view index
		return view('admin.peminjaman.peminjaman',['peminjaman' => $peminjaman]);
 
	}

    public function hapusSementara($id){
    	$peminjaman = peminjaman::find($id);
    	$peminjaman->delete();
 
    	return redirect('/peminjaman/peminjaman')->with(['success' => 'Hapus Sementara Berhasil']);//notifikasi
    }

    // menampilkan data guru yang sudah dihapus
    public function tongSampah(){
    	// mengampil data guru yang sudah dihapus
    	$peminjaman = peminjaman::onlyTrashed()->paginate(5);
    	return view('admin.peminjaman.peminjaman_tongSampah', ['peminjaman' => $peminjaman]);
    }

    public function kembalikan($id){
    	$peminjaman = peminjaman::onlyTrashed()->where('ID_PEMINJAMAN',$id);
    	$peminjaman->restore();
    	return redirect('/peminjaman/peminjaman')->with(['success' => 'Restore Berhasil']);//notifikasi
    }

    
    public function kembalikan_semua(){	
    	$peminjaman = peminjaman::onlyTrashed();
    	$peminjaman->restore();
    	return redirect('/peminjaman/peminjaman')->with(['success' => 'Restore Berhasil']);//notifikasi
    }

    // hapus permanen
    public function hapusPermanen($id){
    	// hapus permanen data guru
    	$peminjaman = peminjaman::onlyTrashed()->where('ID_PEMINJAMAN',$id);
    	$peminjaman->forceDelete();
    	return redirect('/peminjaman/peminjaman_tongSampah')->with(['success' => 'Hapus Permanen Berhasil']);//notifikasi
    }

    public function hapusPermanen_semua(){
    	// hapus permanen data guru
    	$peminjaman = peminjaman::onlyTrashed();
    	$peminjaman->forceDelete();
    	return redirect('/peminjaman/peminjaman_tongSampah')->with(['success' => 'Hapus Permanen Berhasil']);//notifikasi
    }

    
}
