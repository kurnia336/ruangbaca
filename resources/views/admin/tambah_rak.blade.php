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
	<form action="{{url('/rak_simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="id_rak">ID Rak</label>
			<input class="form-control" type="text" name="id_rak" id="id_rak" placeholder="Masukkan ID Rak" required="true">
		</div>
		<div class="form-group">
			<label for="id_buku">ID Buku</label>
			<input class="form-control" type="text" name="id_buku" id="id_buku" placeholder="Masukkan ID Buku" required="true">
		</div>
		<div class="form-group">
			<label for="nama_rak">Nama Rak</label>
			<input class="form-control" type="text" name="nama_rak" id="nama_rak" placeholder="Masukkan Nama Rak">
		</div>
		<div class="form-group">
			<label for="lokasi_rak">Lokasi Rak</label>
			<input class="form-control" type="text" name="lokasi_rak" id="lokasi_rak" placeholder="Masukkan Lokasi Rak">
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
