@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Petugas')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-user-tie"></i> Form Menambah Petugas</h3>
	<form action="{{url('/petugas/petugas/simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="kd">ID Petugas</label>
			<input class="form-control" type="text" name="id_petugas" id="id_petugas" placeholder="Masukkan ID Petugas" required="true">
		</div>
		<div class="form-group">
			<label for="nama">Nama Petugas</label>
			<input class="form-control" type="text" name="nama_petugas" id="nama_petugas" placeholder="Masukkan Nama Petugas" required="true">
		</div>
		<div class="form-group">
			<label for="jabatan">Jabatan</label>
			<input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan Petugas">
		</div>
		<div class="form-group">
			<label for="numb">No Telp Petugas</label>
			<input class="form-control" type="text" name="notelp_petugas" id="notelp_petugas" placeholder="Masukkan No Telp Petugas">
		</div>
		<div class="form-group">
			<label for="email">Email Petugas</label>
			<input class="form-control" type="email" name="email_petugas" id="email_petugas" placeholder="Masukkan Email Petugas">
		</div>
		<div class="form-group">
			<label for="adress">Alamat Petugas</label>
			<input class="form-control" type="text" name="alamat_petugas" id="alamat_petugas" placeholder="Masukkan Alamat Petugas">
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