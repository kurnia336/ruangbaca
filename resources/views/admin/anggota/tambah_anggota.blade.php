@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Anggota')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-user-plus"></i> Form Menambah Anggota</h3>
	<form action="{{url('/anggota/anggota/simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="kd">ID Anggota</label> -->
			<input class="form-control" type="hidden" name="ID_ANGGOTA" id="ID_ANGGOTA" placeholder="Masukkan ID Anggota" required="true" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="nama">Nama Anggota</label>
			<input class="form-control" type="text" name="NAMA_ANGGOTA" id="NAMA_ANGGOTA" placeholder="Masukkan Nama Anggota" required="true" autocomplete="off">
		</div>
		<!-- jenis kelamin menggunakan radio button -->
		<div class="form-group">
			<label for="jabatan">JK Anggota</label>
			<br>
			<input class="" type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN" placeholder="Masukkan Jenis Kelamin Anggota" value="L"> Laki-Laki
			<input class="" type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN" placeholder="Masukkan Jenis Kelamin Anggota" value="P"> Perempuan
		</div>
		<div class="form-group">
			<label for="numb">No Telp Anggota</label>
			<input class="form-control" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="NO_TELP_ANGGOTA" id="NO_TELP_ANGGOTA" placeholder="Masukkan No Telp Anggota" maxlength="13" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="email">Email Anggota</label>
			<input class="form-control" type="email" name="EMAIL_ANGGOTA" id="EMAIL_ANGGOTA" placeholder="Masukkan Email Anggota" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="adress">Alamat Anggota</label>
			<textarea class="form-control" name="ALAMAT_ANGGOTA" id="ALAMAT_ANGGOTA" placeholder="Masukkan Alamat Anggota" row="5" autocomplete="off" required></textarea>
		</div>
		<div class="form-group float-right">
		<!-- fontawesome  -->
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