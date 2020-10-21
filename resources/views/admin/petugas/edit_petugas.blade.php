@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Edit Petugas')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3>Form Edit Petugas</h3>
	@foreach($petugas as $p)
	<form action="{{url('/petugas/petugas/update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="kd">ID Petugas</label> -->
			<input class="form-control" type="hidden" name="ID_PETUGAS" id="ID_PETUGAS" value="{{ $p->ID_PETUGAS }}" >
		</div>
		<div class="form-group">
			<label for="nama">Nama Petugas</label>
			<input class="form-control" type="text" name="NAMA_PETUGAS" id="NAMA_PETUGAS" placeholder="Masukkan Nama Petugas" value="{{ $p->NAMA_PETUGAS }}">
		</div>
		<div class="form-group">
			<label for="jabatan">Jabatan</label>
			<input class="form-control" type="text" name="JABATAN" id="JABATAN" placeholder="Masukkan Jabatan Petugas" value="{{ $p->JABATAN }}">
		</div>
		<div class="form-group">
			<label for="numb">No Telp Petugas</label>
			<input class="form-control" type="text" name="NO_TELP_PETUGAS" id="NO_TELP_PETUGAS" placeholder="Masukkan No Telp Petugas" value="{{ $p->NO_TELP_PETUGAS }}">
		</div>
		<div class="form-group">
			<label for="email">Email Petugas</label>
			<input class="form-control" type="email" name="EMAIL_PETUGAS" id="EMAIL_PETUGAS" placeholder="Masukkan Email Petugas" value="{{ $p->EMAIL_PETUGAS }}">
		</div>
		<div class="form-group">
			<label for="adress">Alamat Petugas</label>
			<input class="form-control" type="text" name="ALAMAT_PETUGAS" id="ALAMAT_PETUGAS" placeholder="Masukkan Alamat Petugas" value="{{ $p->ALAMAT_PETUGAS }}">
		</div>
		<div class="form-group float-right">
			<button class="btn btn-lg btn-danger" type="reset">Batal</button>
			<button class="btn btn-lg btn-primary" type="submit">Update</button>
		</div>
	</form>
	@endforeach
		</div>
<!-- /.content -->
	</div>
</div>
<!-- /.Main Section -->
@endsection