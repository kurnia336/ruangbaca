<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembalian extends Model
{
    //
    use SoftDeletes;
    protected $table = "pengembalian";
    protected $primaryKey = 'ID_PENGEMBALIAN';
    protected $dates = ['deleted_at'];
    protected $fillable = ['ID_ANGGOTA','ID_PETUGAS','ID_BUKU','TANGGAL_PENGEMBALIAN'];

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
