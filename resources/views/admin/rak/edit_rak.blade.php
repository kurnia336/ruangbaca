@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Edit Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3>Form Edit Rak</h3>
			@foreach($rak as $r)
	<form action="{{url('/rak/rak_update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_RAK" id="ID_RAK" placeholder="Masukkan ID Rak" value="{{$r->ID_RAK}}">
		</div>
        
		<div class="form-group">
			<label for="nama_rak">Nama Rak</label>
			<input class="form-control" type="text" name="NAMA_RAK" id="NAMA_RAK" placeholder="Masukkan Nama Rak" value="{{$r->NAMA_RAK}}" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="lokasi_rak">Lokasi Rak</label>
			<input class="form-control" type="text" name="LOKASI_RAK" id="LOKASI_RAK" placeholder="Masukkan Lokasi Rak" value="{{$r->LOKASI_RAK}}" autocomplete="off">
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