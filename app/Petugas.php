<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    //
    protected $table = 'petugas';
    protected $primaryKey = 'ID_PETUGAS';
    public function peminjamanPetugas(){
    	return $this->hasMany(Peminjaman::class,'ID_PETUGAS');
    }
    public function pengembalianPetugas(){
    	return $this->hasMany(Peminjaman::class,'ID_PETUGAS');
    }

}
