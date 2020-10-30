@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Edit Penerbit')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3>Form Edit Penerbit</h3>
			@foreach($penerbit as $p)
	<form action="{{url('/penerbit_update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_PENERBIT" id="ID_PENERBIT" placeholder="Masukkan ID Penerbit" value="{{$p->ID_PENERBIT}}" autocomplete="off">
		</div>

		<div class="form-group">
			<label for="nama_rak">Nama Penerbit</label>
			<input class="form-control" type="text" name="NAMA_PENERBIT" id="NAMA_PENERBIT" placeholder="Masukkan Nama Penerbit" value="{{$p->NAMA_PENERBIT}}" autocomplete="off">
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