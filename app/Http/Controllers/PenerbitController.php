<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    //
    public function tampil(){
        // mengambil data dari table petugas
        // $rak = DB::table('rak')->paginate(5);// untuk membagi record menjadi beberapa halaman
        // $rak = DB::table('rak as r')
        // ->select('r.*','b.judul_buku')
        // ->join('buku as b','b.id_buku', '=', 'r.id_buku')
        // ->paginate(5);
        $penerbit = DB::table('penerbit')->paginate(5);
        // mengirim data petugas ke view index
        return view('admin.penerbit.penerbit',['penerbit' => $penerbit]);
    } 

    public function index(){
        return view('admin.penerbit.penerbit');
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
        DB::table('penerbit')->insert([
            // 'id_rak' => $new_id==2 ? $new_id : $new_id++,
            'ID_PENERBIT' => $request->ID_PENERBIT,
            'NAMA_PENERBIT' => $request->NAMA_PENERBIT
            // join('buku','id_buku', '=', 'rak.id_buku'),
            // select('buku.id_buku','rak.id_buku'),
            // get()
        ]);
        // alihkan halaman ke halaman petugas
        return redirect('/penerbit/penerbit_tampil')->with(['success' => 'Tambah Berhasil']);//notifikasi 

    }

    public function tambah(){
        // $buku = DB::table('buku')->pluck("judul_buku","id_buku");
        // return view('admin.rak.tambah_rak',compact('buku'));
        return view('admin.penerbit.tambah_penerbit');
    }

    public function edit($id)
    {
        // mengambil data petugas berdasarkan id yang dipilih
        $penerbit = DB::table('penerbit')->where('id_penerbit',$id)->get();
        // $buku = DB::table('buku')->pluck("judul_buku","id_buku");
        // passing data petugas yang didapat ke view 
        // return view('admin.rak.edit_rak',['rak' => $rak],compact('buku'));
        return view('admin.penerbit.edit_penerbit',['penerbit' => $penerbit]);
    }

    public function update(Request $request)
    {
        // insert data ke table pegawai
        DB::table('penerbit')->where('ID_PENERBIT',$request->ID_PENERBIT)->update([
            'NAMA_PENERBIT' => $request->NAMA_PENERBIT
            // join('buku','id_buku', '=', 'rak.id_buku'),
            // select('buku.id_buku','rak.id_buku'),
            // get()
        ]);
        // alihkan halaman ke halaman petugas
        return redirect('/penerbit/penerbit_tampil')->with(['success' => 'Update Berhasil']);//notifikasi 

    }

    public function hapus($id)
    {
        // mengambil data petugas berdasarkan id yang dipilih
        DB::table('penerbit')->where('ID_PENERBIT',$id)->delete();
        // passing data petugas yang didapat ke view 
        return redirect('/penerbit/penerbit_tampil')->with(['success' => 'Hapus Berhasil']);//notifikasi 

    }

    //funtion cari/search untuk saat ini masih menggunakan where nama
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

            // mengambil data dari table pegawai sesuai pencarian data
        $penerbit = DB::table('penerbit')
        // ->select('r.id_rak','r.nama_rak','r.lokasi_rak','b.judul_buku')
        // ->join('buku as b','b.id_buku', '=', 'r.id_buku')
        // ->where('r.id_rak','like',"%".$cari."%")
        // ->orWhere('b.judul_buku','like',"%".$cari."%")
        // ->orWhere('r.nama_rak','like',"%".$cari."%")
        // ->orWhere('r.lokasi_rak','like',"%".$cari."%")
        // ->paginate();
        ->where('ID_PENERBIT','like',"%".$cari."%")
        ->orWhere('NAMA_PENERBIT','like',"%".$cari."%")
        ->paginate();

            // mengirim data pegawai ke view index
        return view('admin.penerbit.penerbit',['penerbit' => $penerbit]);

    }
}
