<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class Anggota extends Model
class Anggota extends Authenticatable
{
    //
    use Notifiable;
    use SoftDeletes;
    protected $guard = 'anggota';
    protected $table = 'anggota';
    protected $primaryKey = 'ID_ANGGOTA';
    protected $dates = ['deleted_at'];
    protected $fillable = ['NAMA_ANGGOTA','JENIS_KELAMIN','NO_TELP_ANGGOTA','EMAIL_ANGGOTA','ALAMAT_ANGGOTA'];
    public $timestamps = false;
    public function peminjamanAnggota(){
    	return $this->hasMany(Peminjaman::class,'ID_ANGGOTA');
    }
    public function pengembalianAnggota(){
    	return $this->hasMany(Pengembalian::class,'ID_ANGGOTA');
    }
}
