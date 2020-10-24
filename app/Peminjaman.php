<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    //
    use SoftDeletes;
    protected $table = "peminjaman";
    protected $primaryKey = 'ID_PEMINJAMAN';
    protected $dates = ['deleted_at'];
    protected $fillable = ['ID_ANGGOTA','ID_BUKU','ID_PETUGAS','TANGGAL_PINJAM','TANGGAL_KEMBALI'];

    public function buku(){
    	return $this->belongsTo(Buku::class,'ID_BUKU');
    }

    public function anggota(){
        // return $this->belongsTo('App\Anggota','ID_ANGGOTA');
        return $this->belongsTo(Anggota::class,'ID_ANGGOTA');
    }

    public function petugas(){
    	return $this->belongsTo(Petugas::class,'ID_PETUGAS');
    }
    
}
