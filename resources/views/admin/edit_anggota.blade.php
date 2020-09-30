@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Edit Anggota')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
	<div class="col-md-12 mt-3">
		<h3>Form Edit Anggota</h3>
	@foreach($anggota as $p)
	<form action="{{url('/anggota/update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="kd">ID Anggota</label>
			<input class="form-control" type="text" name="id_anggota" id="id_anggota" placeholder="Masukkan ID Anggota" value="{{ $p->id_anggota }}">
		</div>
		<div class="form-group">
			<label for="nama">Nama Anggota</label>
			<input class="form-control" type="text" name="nama_anggota" id="nama_anggota" placeholder="Masukkan Nama Anggota" value="{{ $p->nama_anggota }}">
		</div>
		<div class="form-group">
			<label for="jabatan">JK Anggota</label>
			<br>
			<input class="" type="radio" name="jk_anggota" id="jk_anggota" placeholder="Masukkan Jenis Kelamin Anggota" value="L"  {{ $p->jk_anggota == "L" ? 'checked' : '' }}> Laki-Laki
			<input class="" type="radio" name="jk_anggota" id="jk_anggota" placeholder="Masukkan Jenis Kelamin Anggota" value="P"  {{ $p->jk_anggota == "P" ? 'checked' : '' }}> Perempuan
		</div>
		<div class="form-group">
			<label for="numb">No Telp Anggota</label>
			<input class="form-control" type="text" name="notelp_anggota" id="notelp_anggota" placeholder="Masukkan No Telp Anggota" value="{{ $p->notelp_anggota }}">
		</div>
		<div class="form-group">
			<label for="email">Email Anggota</label>
			<input class="form-control" type="email" name="email_anggota" id="email_anggota" placeholder="Masukkan Email Anggota" value="{{ $p->email_anggota }}">
		</div>
		<div class="form-group">
			<label for="adress">Alamat Anggota</label>
			<input class="form-control" type="text" name="alamat_anggota" id="alamat_anggota" placeholder="Masukkan Alamat Anggota" value="{{ $p->alamat_anggota }}">
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