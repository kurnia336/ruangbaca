@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-book"></i> Form Tambah Rak</h3>
	<form action="{{url('/rak/rak_simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_rak">ID Rak</label> -->
			<input class="form-control" type="hidden" name="ID_RAK" id="ID_RAK" placeholder="Masukkan ID Rak" required="true">
		</div>
		<div class="form-group">
			<label for="nama_rak">Nama Rak</label>
			<input class="form-control" type="text" name="NAMA_RAK" id="NAMA_RAK" placeholder="Masukkan Nama Rak">
		</div>
		<div class="form-group">
			<label for="lokasi_rak">Lokasi Rak</label>
			<input class="form-control" type="text" name="LOKASI_RAK" id="LOKASI_RAK" placeholder="Masukkan Lokasi Rak">
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