@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Penerbit')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-book"></i> Form Tambah Penerbit</h3>
	<form action="{{url('/penerbit_simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_rak">ID Rak</label> -->
			<input class="form-control" type="hidden" name="ID_PENERBIT" id="ID_PENERBIT" placeholder="Masukkan ID Penerbit" required="true">
		</div>
		<div class="form-group">
			<label for="nama_rak">Nama Penerbit</label>
			<input class="form-control" type="text" name="NAMA_PENERBIT" id="NAMA_PENERBIT" placeholder="Masukkan Nama Penerbit">
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