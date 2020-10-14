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
			<input class="form-control" type="hidden" name="id_petugas" id="id_petugas" value="{{ $p->id_petugas }}" >
		</div>
		<div class="form-group">
			<label for="nama">Nama Petugas</label>
			<input class="form-control" type="text" name="nama_petugas" id="nama_petugas" placeholder="Masukkan Nama Petugas" value="{{ $p->nama_petugas }}">
		</div>
		<div class="form-group">
			<label for="jabatan">Jabatan</label>
			<input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan Petugas" value="{{ $p->jabatan }}">
		</div>
		<div class="form-group">
			<label for="numb">No Telp Petugas</label>
			<input class="form-control" type="text" name="notelp_petugas" id="notelp_petugas" placeholder="Masukkan No Telp Petugas" value="{{ $p->notelp_petugas }}">
		</div>
		<div class="form-group">
			<label for="email">Email Petugas</label>
			<input class="form-control" type="email" name="email_petugas" id="email_petugas" placeholder="Masukkan Email Petugas" value="{{ $p->email_petugas }}">
		</div>
		<div class="form-group">
			<label for="adress">Alamat Petugas</label>
			<input class="form-control" type="text" name="alamat_petugas" id="alamat_petugas" placeholder="Masukkan Alamat Petugas" value="{{ $p->alamat_petugas }}">
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