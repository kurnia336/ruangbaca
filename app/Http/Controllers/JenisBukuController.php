<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisBukuController extends Controller
{
    //
    public function tampil(){
        // mengambil data dari table petugas
        // $rak = DB::table('rak')->paginate(5);// untuk membagi record menjadi beberapa halaman
        // $rak = DB::table('rak as r')
        // ->select('r.*','b.judul_buku')
        // ->join('buku as b','b.id_buku', '=', 'r.id_buku')
        // ->paginate(5);
        $jenis_buku = DB::table('jenis_buku')->paginate(5);
        // mengirim data petugas ke view index
        return view('admin.jenisbuku.jenisbuku',['jenis_buku' => $jenis_buku]);
    } 

    public function index(){
        return view('admin.jenisbuku.jenisbuku');
    }

    public function simpan(Request $request)
    {
        // $numeric_id = intval(substr($request['id_rak'], 1)); //retrieve numeric value of 'V001' (1)
        // $numeric_id++; //increment
        // if(mb_strlen($numeric_id) == 1)
        // {
        //     $zero_string = '00';
        // }elseif(mb_strlen($numeric_id) == 2)
        // {
        //     $zero_string = '0';
        // }else{
        //     $zero_string = '';
        // }
        // $new_id = 'RK'.$zero_string.$numeric_id;
        // $new_id = 0;

        // insert data ke table pegawai
        DB::table('jenis_buku')->insert([
            // 'id_rak' => $new_id==2 ? $new_id : $new_id++,
            'ID_JENISBUKU' => $request->ID_JENISBUKU,
            'NAMA_JENISBUKU' => $request->NAMA_JENISBUKU
            // join('buku','id_buku', '=', 'rak.id_buku'),
            // select('buku.id_buku','rak.id_buku'),
            // get()
        ]);
        // alihkan halaman ke halaman petugas
        return redirect('/jenisbuku/jenisbuku_tampil')->with(['success' => 'Tambah Berhasil']);//notifikasi 

    }

    public function tambah(){
        // $buku = DB::table('buku')->pluck("judul_buku","id_buku");
        // return view('admin.rak.tambah_rak',compact('buku'));
        return view('admin.jenisbuku.tambah_jenisbuku');
    }

    public function edit($id)
    {
        // mengambil data petugas berdasarkan id yang dipilih
        $jenis_buku = DB::table('jenis_buku')->where('id_jenisbuku',$id)->get();
        // $buku = DB::table('buku')->pluck("judul_buku","id_buku");
        // passing data petugas yang didapat ke view 
        // return view('admin.rak.edit_rak',['rak' => $rak],compact('buku'));
        return view('admin.jenisbuku.edit_jenisbuku',['jenis_buku' => $jenis_buku]);
    }

    public function update(Request $request)
    {
        // insert data ke table pegawai
        DB::table('jenis_buku')->where('ID_JENISBUKU',$request->ID_JENISBUKU)->update([
            'NAMA_JENISBUKU' => $request->NAMA_JENISBUKU
            // join('buku','id_buku', '=', 'rak.id_buku'),
            // select('buku.id_buku','rak.id_buku'),
            // get()
        ]);
        // alihkan halaman ke halaman petugas
        return redirect('/jenisbuku/jenisbuku_tampil')->with(['success' => 'Update Berhasil']);//notifikasi 

    }

    public function hapus($id)
    {
        // mengambil data petugas berdasarkan id yang dipilih
        DB::table('jenis_buku')->where('ID_JENISBUKU',$id)->delete();
        // passing data petugas yang didapat ke view 
        return redirect('/jenisbuku/jenisbuku_tampil')->with(['success' => 'Hapus Berhasil']);//notifikasi 

    }

    //funtion cari/search untuk saat ini masih menggunakan where nama
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

            // mengambil data dari table pegawai sesuai pencarian data
        $jenis_buku = DB::table('jenis_buku')
        // ->select('r.id_rak','r.nama_rak','r.lokasi_rak','b.judul_buku')
        // ->join('buku as b','b.id_buku', '=', 'r.id_buku')
        // ->where('r.id_rak','like',"%".$cari."%")
        // ->orWhere('b.judul_buku','like',"%".$cari."%")
        // ->orWhere('r.nama_rak','like',"%".$cari."%")
        // ->orWhere('r.lokasi_rak','like',"%".$cari."%")
        // ->paginate();
        ->where('ID_JENISBUKU','like',"%".$cari."%")
        ->orWhere('NAMA_JENISBUKU','like',"%".$cari."%")
        ->paginate();

            // mengirim data pegawai ke view index
        return view('admin.jenisbuku.jenisbuku',['jenis_buku' => $jenis_buku]);

    }
}