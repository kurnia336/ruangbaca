@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Ubah Data Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3>Form Ubah Data Buku</h3>
	<form action="" method="post">
		<div class="form-group">
			<label for="name">Nama Buku</label>
			<input class="form-control" type="text" name="name" id="name" placeholder="Masukkan Nama Buku">
		</div>
		<div class="form-group">
			<label for="type">Tipe Buku</label>
			<input class="form-control" type="text" name="type" id="type" placeholder="masukkan tipe buku">
		</div>
		<div class="form-group">
			<label for="stock">Stock</label>
			<input class="form-control" type="number" name="stock" id="stock" placeholder="masukkan stock buku">
		</div>
		<div class="form-group">
			<label for="writer">Penulis</label>
			<input class="form-control" type="text" name="writer" id="writer" placeholder="masukkan penulis buku">
		</div>
		<div class="form-group">
			<label for="publisher">Penerbit</label>
			<input class="form-control" type="text" name="publisher" id="publisher" placeholder="masukkan penerbit buku">
		</div>
		<div class="form-group">
			<label for="date">Waktu Terbit</label>
			<input class="form-control" type="date" name="date" id="date">
		</div>
		<div class="form-group float-right">
			<button class="btn btn-lg btn-danger" type="reset">Reset</button>
			<button class="btn btn-lg btn-primary" type="submit">Submit</button>
		</div>
	</form>
		</div>
<!-- /.content -->
	</div>
</div>
<!-- /.Main Section -->
@endsection
