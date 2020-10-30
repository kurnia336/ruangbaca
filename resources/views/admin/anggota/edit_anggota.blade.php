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
	<form action="{{url('/anggota/anggota/update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="kd">ID Anggota</label> -->
			<input class="form-control" type="hidden" name="ID_ANGGOTA" id="ID_ANGGOTA" placeholder="Masukkan ID Anggota" value="{{ $p->ID_ANGGOTA }}" autocomplete="off" >
		</div>
		<div class="form-group">
			<label for="nama">Nama Anggota</label>
			<input class="form-control" type="text" name="NAMA_ANGGOTA" id="NAMA_ANGGOTA" placeholder="Masukkan Nama Anggota" value="{{ $p->NAMA_ANGGOTA }}" autocomplete="off">
		</div>
		<!-- jenis kelamin menggunakan radio button -->
		<div class="form-group">
			<label for="jabatan">JK Anggota</label>
			<br>
			<input class="" type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN" placeholder="Masukkan Jenis Kelamin Anggota" value="L"  {{ $p->JENIS_KELAMIN == "L" ? 'checked' : '' }}> Laki-Laki
			<input class="" type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN" placeholder="Masukkan Jenis Kelamin Anggota" value="P"  {{ $p->JENIS_KELAMIN == "P" ? 'checked' : '' }}> Perempuan
		</div>
		<div class="form-group">
			<label for="numb">No Telp Anggota</label>
			<input class="form-control" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="NO_TELP_ANGGOTA" id="NO_TELP_ANGGOTA" placeholder="Masukkan No Telp Anggota" value="{{ $p->NO_TELP_ANGGOTA }}" maxlength="13" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="email">Email Anggota</label>
			<input class="form-control" type="email" name="EMAIL_ANGGOTA" id="EMAIL_ANGGOTA" placeholder="Masukkan Email Anggota" value="{{ $p->EMAIL_ANGGOTA }}" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="adress">Alamat Anggota</label>
			<textarea class="form-control" name="ALAMAT_ANGGOTA" id="ALAMAT_ANGGOTA" placeholder="Masukkan Alamat Anggota" row="5" autocomplete="off">{{ $p->ALAMAT_ANGGOTA }}</textarea>
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