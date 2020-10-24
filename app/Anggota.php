<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //
    protected $table = 'anggota';
    protected $primaryKey = 'ID_ANGGOTA';
    public function peminjamanAnggota(){
    	return $this->hasMany(Peminjaman::class,'ID_ANGGOTA');
    }
}
