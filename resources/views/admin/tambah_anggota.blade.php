@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Anggota')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3><i class="fas fa-user-plus"></i> Form Menambah Anggota</h3>
	<form action="{{url('/anggota/simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="kd">ID Anggota</label>
			<input class="form-control" type="text" name="id_anggota" id="id_anggota" placeholder="Masukkan ID Anggota" required="true">
		</div>
		<div class="form-group">
			<label for="nama">Nama Anggota</label>
			<input class="form-control" type="text" name="nama_anggota" id="nama_anggota" placeholder="Masukkan Nama Anggota" required="true">
		</div>
		<div class="form-group">
			<label for="jabatan">JK Anggota</label>
			<br>
			<input class="" type="radio" name="jk_anggota" id="jk_anggota" placeholder="Masukkan Jenis Kelamin Anggota" value="L"> Laki-Laki
			<input class="" type="radio" name="jk_anggota" id="jk_anggota" placeholder="Masukkan Jenis Kelamin Anggota" value="P"> Perempuan
		</div>
		<div class="form-group">
			<label for="numb">No Telp Anggota</label>
			<input class="form-control" type="text" name="notelp_anggota" id="notelp_anggota" placeholder="Masukkan No Telp Anggota">
		</div>
		<div class="form-group">
			<label for="email">Email Anggota</label>
			<input class="form-control" type="email" name="email_anggota" id="email_anggota" placeholder="Masukkan Email Anggota">
		</div>
		<div class="form-group">
			<label for="adress">Alamat Anggota</label>
			<input class="form-control" type="text" name="alamat_anggota" id="alamat_anggota" placeholder="Masukkan Alamat Anggota">
		</div>
		<div class="form-group float-right">
			<button class="btn btn-lg btn-danger" type="reset"><i class="fas fa-times"></i> Hapus</button>
			<button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
		</div>
	</form>
		</div>
<!-- /.content -->
	</div>
</div>
<!-- /.Main Section -->
@endsection