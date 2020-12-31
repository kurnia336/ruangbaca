<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;//query builder
use Illuminate\Support\Carbon;
use App\Peminjaman;//eloquent
use App\Buku;
use App\Anggota;
use App\Petugas;
use App\Pengembalian;

class HistoryPeminjamanController extends Controller
{
    //
    public function index()
    {
        $peminjaman = peminjaman::select('peminjaman.*')
        ->join('buku', 'peminjaman.ID_BUKU', '=', 'buku.ID_BUKU')
        ->join('petugas', 'peminjaman.ID_PETUGAS', '=', 'petugas.ID_PETUGAS')
        ->join('anggota', 'peminjaman.ID_ANGGOTA', '=', 'anggota.ID_ANGGOTA')
        ->where('STATUS_PINJAM', '=', 0)
        ->where('NAMA_ANGGOTA', '=', auth()->user()->name)
        ->paginate(5);
        $anggota = anggota::all();
        $petugas = petugas::all();
        $buku = buku::all();
        // return view('admin.peminjaman.peminjaman', ['peminjaman' => $peminjaman]);
        return view('admin.peminjaman.historyPeminjaman',['peminjaman' => $peminjaman]);
    }
}
