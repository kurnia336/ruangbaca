@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Edit Jenis Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
			<h3>Form Edit Jenis Buku</h3>
			@foreach($jenis_buku as $j)
	<form action="{{url('/jenisbuku_update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_JENISBUKU" id="ID_JENISBUKU" placeholder="Masukkan ID Jenis Buku" value="{{$j->ID_JENISBUKU}}" autocomplete="off" required>
		</div>

		<div class="form-group">
			<label for="nama_rak">Jenis Buku</label>
			<input class="form-control" type="text" name="NAMA_JENISBUKU" id="NAMA_JENISBUKU" placeholder="Masukkan Jenis Buku" value="{{$j->NAMA_JENISBUKU}}" autocomplete="off" required>
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