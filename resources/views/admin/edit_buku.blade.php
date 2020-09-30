@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Edit Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3>Form Edit Buku</h3>
			@foreach($buku as $b)
	<form action="{{url('/buku_update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="id_buku" id="id_buku" placeholder="Masukkan ID Buku" value="{{$b->id_buku}}">
		</div>
		<div class="form-group">
			<label for="judul_buku">Judul Buku</label>
			<input class="form-control" type="text" name="judul_buku" id="judul_buku" placeholder="Masukkan Judul Buku" value="{{$b->judul_buku}}">
		</div>
		<div class="form-group">
			<label for="penulis_buku">Penulis</label>
			<input class="form-control" type="text" name="penulis_buku" id="penulis_buku" placeholder="Masukkan Penulis Buku" value="{{$b->penulis_buku}}">
		</div>
		<div class="form-group">
			<label for="penerbit">Penerbit</label>
			<input class="form-control" type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit Buku" value="{{$b->penerbit}}">
		</div>
		<div class="form-group">
			<label for="tahun_terbit">Tahun Terbit</label>
			<input class="form-control" type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="{{$b->tahun_terbit}}">
		</div>
		<div class="form-group">
			<label for="stok">Stok</label>
			<input class="form-control" type="number" name="stok" id="stok" placeholder="Masukkan Stok Buku" value="{{$b->stok}}">
		</div>
		<div class="form-group float-right">
			<button class="btn btn-lg btn-danger" type="reset">Cancel</button>
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