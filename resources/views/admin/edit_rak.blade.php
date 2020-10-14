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
	<form action="{{url('/rak_update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="id_rak" id="id_rak" placeholder="Masukkan ID Rak" value="{{$r->id_rak}}">
		</div>
		<div class="form-group">
			<label for="id_buku">ID Rak</label>
			<input class="form-control" type="text" name="id_buku" id="id_buku" placeholder="Masukkan ID Buku" value="{{$r->id_rak}}" disabled="true">
		</div>
        <div class="form-group">
        <?php $selectedvalue=$r->id_buku ?>
            <label for="buku">Pilih Judul Buku</label>
                <select name="id_buku" id="id_buku" class="form-control" style="">
                    <option value="">--- Judul Buku ---</option>
                    @foreach ($buku as $key => $value)
                    <option name="id_buku" id="id_buku" value="{{ $key }}" {{ $key == $selectedvalue ? 'selected="selected"' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
		</div>
		<div class="form-group">
			<label for="nama_rak">Nama Rak</label>
			<input class="form-control" type="text" name="nama_rak" id="nama_rak" placeholder="Masukkan Nama Rak" value="{{$r->nama_rak}}">
		</div>
		<div class="form-group">
			<label for="lokasi_rak">Lokasi Rak</label>
			<input class="form-control" type="text" name="lokasi_rak" id="lokasi_rak" placeholder="Masukkan Lokasi Rak" value="{{$r->lokasi_rak}}">
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