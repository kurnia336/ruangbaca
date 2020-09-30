@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3><i class="fas fa-book"></i> Form Tambah Buku</h3>
	<form action="{{url('/buku_simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="id_buku">ID Buku</label>
			<input class="form-control" type="text" name="id_buku" id="id_buku" placeholder="Masukkan ID Buku" required="true">
		</div>
		<div class="form-group">
			<label for="judul_buku">Judul Buku</label>
			<input class="form-control" type="text" name="judul_buku" id="judul_buku" placeholder="Masukkan Judul Buku" required="true">
		</div>
		<div class="form-group">
			<label for="penulis_buku">Penulis</label>
			<input class="form-control" type="text" name="penulis_buku" id="penulis_buku" placeholder="Masukkan Penulis Buku">
		</div>
		<div class="form-group">
			<label for="penerbit">Penerbit</label>
			<input class="form-control" type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit Buku">
		</div>
		<div class="form-group">
			<label for="tahun_terbit">Tahun Terbit</label>
			<input class="form-control" type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Masukkan Tahun Terbit">
		</div>
		<div class="form-group">
			<label for="stok">Stok</label>
			<input class="form-control" type="text" name="stok" id="stok" placeholder="Masukkan Stok Buku">
		</div>
		<div class="form-group float-right">
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
