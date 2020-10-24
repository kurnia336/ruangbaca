<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'buku';
    protected $primaryKey = 'ID_BUKU';
    public function peminjamanBuku(){
    	return $this->hasMany(Peminjaman::class,'ID_BUKU');
    }
}
