@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Jenis Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-book"></i> Form Tambah Jenis Buku</h3>
	<form action="{{url('/jenisbuku_simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_rak">ID Rak</label> -->
			<input class="form-control" type="hidden" name="ID_JENISBUKU" id="ID_JENISBUKU" placeholder="Masukkan ID Jenis Buku" required="true" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="nama_rak">Jenis Buku</label>
			<input class="form-control" type="text" name="NAMA_JENISBUKU" id="NAMA_JENISBUKU" placeholder="Masukkan Nama Rak" autocomplete="off">
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