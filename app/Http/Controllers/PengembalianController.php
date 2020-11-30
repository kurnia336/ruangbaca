<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengembalian;
use App\Peminjaman;
use App\Buku;
use App\Anggota;
use App\Petugas;

class PengembalianController extends Controller
{
    //
    public function index()
    {
        $pengembalian = pengembalian::paginate(5);
        $anggota = anggota::all();
        $petugas = petugas::all();
        $buku = buku::all();
        // return view('admin.peminjaman.peminjaman', ['peminjaman' => $peminjaman]);
        return view('admin.pengembalian.pengembalian', compact('anggota','petugas','buku','pengembalian'));
    }

    public function tambah(){
        $anggota = DB::table('anggota')->pluck("NAMA_ANGGOTA","ID_ANGGOTA");
        $buku = DB::table('buku')->pluck("JUDUL_BUKU","ID_BUKU");
        $petugas = DB::table('petugas')->pluck("NAMA_PETUGAS","ID_PETUGAS");
        return view('admin.pengembalian.pengembalian_tambah',compact('anggota','buku','petugas'));
    	// return view('admin.peminjaman.peminjaman_tambah');
    }

    public function simpan(Request $request){
        $this->validate($request,[
            // 'ID_PEMINJAMAN' => 'required',
    		'ID_ANGGOTA' => 'required',
            'ID_BUKU' => 'required',
            'ID_PETUGAS' => 'required',
            'TANGGAL_PENGEMBALIAN' => 'required'
    	]);

        Pengembalian::create([
    		// 'ID_PEMINJAMAN' => $request->ID_PEMINJAMAN,
            'ID_ANGGOTA' => $request->ID_ANGGOTA,
            'ID_BUKU' => $request->ID_BUKU,
            'ID_PETUGAS' => $request->ID_PETUGAS,
            'TANGGAL_PENGEMBALIAN' => $request->TANGGAL_PENGEMBALIAN
        ]);

        DB::table('buku')->where('ID_BUKU',$request->ID_BUKU)->increment('STOK');

        return redirect('/pengembalian/pengembalian')->with(['success' => 'Tambah Berhasil']);//notifikasi
    }

    public function edit($id){
        $pengembalian = pengembalian::find($id);
        $anggota = DB::table('anggota')->pluck("NAMA_ANGGOTA","ID_ANGGOTA");
        $buku = DB::table('buku')->pluck("JUDUL_BUKU","ID_BUKU");
        $petugas = DB::table('petugas')->pluck("NAMA_PETUGAS","ID_PETUGAS");
        return view('admin.pengembalian.edit_pengembalian',compact('anggota','buku','petugas','pengembalian'));
    }

    public function update($id, Request $request){
        $this->validate($request,[
            // 'ID_PEMINJAMAN' => 'required',
    		'ID_ANGGOTA' => 'required',
            'ID_BUKU' => 'required',
            'ID_PETUGAS' => 'required',
            'TANGGAL_PENGEMBALIAN' => 'required'
        ]);

        $pengembalian = pengembalian::find($id);
        $pengembalian->ID_ANGGOTA = $request->ID_ANGGOTA;
        $pengembalian->ID_BUKU = $request->ID_BUKU;
        $pengembalian->ID_PETUGAS = $request->ID_PETUGAS;
        $pengembalian->TANGGAL_PENGEMBALIAN = $request->TANGGAL_PENGEMBALIAN;
        $pengembalian->save();
        return redirect('/pengembalian/pengembalian')->with(['success' => 'Update Berhasil']);//notifikasi
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
        $pengembalian = pengembalian::select('pengembalian.*')
        ->join('peminjaman','pengembalian.ID_PEMINJAMAN', '=', 'peminjaman.ID_PEMINJAMAN')
        ->join('buku', 'peminjaman.ID_BUKU', '=', 'buku.ID_BUKU')
        ->join('petugas', 'peminjaman.ID_PETUGAS', '=', 'petugas.ID_PETUGAS')
        ->join('anggota', 'peminjaman.ID_ANGGOTA', '=', 'anggota.ID_ANGGOTA')
        ->where('ID_PENGEMBALIAN','like',"%".$cari."%")
        ->orWhere('TANGGAL_PENGEMBALIAN','like',"%".$cari."%")
        ->orWhere('buku.JUDUL_BUKU','like',"%".$cari."%")
		->orWhere('anggota.NAMA_ANGGOTA','like',"%".$cari."%")
		->orWhere('petugas.NAMA_PETUGAS','like',"%".$cari."%") 
        ->paginate(5);
    		// mengirim data pegawai ke view index
		return view('admin.pengembalian.pengembalian',['pengembalian' => $pengembalian]);

	}

    public function hapusSementara($id){
    	$pengembalian = pengembalian::find($id);
    	$pengembalian->delete();

    	return redirect('/pengembalian/pengembalian')->with(['success' => 'Hapus Sementara Berhasil']);//notifikasi
    }

    // menampilkan data guru yang sudah dihapus
    public function tongSampah(){
    	// mengampil data guru yang sudah dihapus
    	$pengembalian = pengembalian::onlyTrashed()->paginate(5);
    	return view('admin.pengembalian.pengembalian_tongSampah', ['pengembalian' => $pengembalian]);
    }

    public function kembalikan($id){
    	$pengembalian = pengembalian::onlyTrashed()->where('ID_PENGEMBALIAN',$id);
    	$pengembalian->restore();
    	return redirect('/pengembalian/pengembalian')->with(['success' => 'Restore Berhasil']);//notifikasi
    }


    public function kembalikan_semua(){	
    	$pengembalian = pengembalian::onlyTrashed();
    	$pengembalian->restore();
    	return redirect('/pengembalian/pengembalian')->with(['success' => 'Restore Berhasil']);//notifikasi
    }

    // hapus permanen
    public function hapusPermanen($id){
    	// hapus permanen data guru
    	$pengembalian = pengembalian::onlyTrashed()->where('ID_PENGEMBALIAN',$id);
    	$pengembalian->forceDelete();
    	return redirect('/pengembalian/pengembalian_tongSampah')->with(['success' => 'Hapus Permanen Berhasil']);//notifikasi
    }

    public function hapusPermanen_semua(){
    	// hapus permanen data guru
    	$pengembalian = pengembalian::onlyTrashed();
    	$pengembalian->forceDelete();
    	return redirect('/pengembalian/pengembalian_tongSampah')->with(['success' => 'Hapus Permanen Berhasil']);//notifikasi
    }
}
