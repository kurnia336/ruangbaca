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
	<form action="{{url('/buku/buku_update')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_BUKU" id="ID_BUKU" placeholder="Masukkan ID Buku" value="{{$b->ID_BUKU}}">
		</div>
		<div class="form-group">
        <?php $selectedvalue=$b->ID_RAK ?>
            <label for="buku">Pilih Rak</label>
                <select name="ID_RAK" id="ID_RAK" class="form-control" style="">
                    <option value="">--- Nama Rak ---</option>
                    @foreach ($rak as $key => $value)
                    <option name="ID_RAK" id="ID_RAK" value="{{ $key }}" {{ $key == $selectedvalue ? 'selected="selected"' : '' }}>[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select>
		</div>
		<div class="form-group">
			<label for="judul_buku">Judul Buku</label>
			<input class="form-control" type="text" name="JUDUL_BUKU" id="JUDUL_BUKU" placeholder="Masukkan Judul Buku" value="{{$b->JUDUL_BUKU}}">
		</div>
		<div class="form-group">
			<label for="penulis_buku">Penulis</label>
			<input class="form-control" type="text" name="PENULIS_BUKU" id="PENULIS_BUKU" placeholder="Masukkan Penulis Buku" value="{{$b->PENULIS_BUKU}}">
		</div>
		<div class="form-group">
			<label for="penerbit">Penerbit</label>
			<input class="form-control" type="text" name="PENERBIT" id="PENERBIT" placeholder="Masukkan Penerbit Buku" value="{{$b->PENERBIT}}">
		</div>
		<div class="form-group">
			<label for="tahun_terbit">Tahun Terbit</label>
			<input class="form-control" type="text" name="TAHUN_TERBIT" id="TAHUN_TERBIT" placeholder="Masukkan Tahun Terbit" value="{{$b->TAHUN_TERBIT}}" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
		</div>
		<div class="form-group">
			<label for="stok">Stok</label>
			<input class="form-control" type="number" name="STOK" id="STOK" placeholder="Masukkan Stok Buku" value="{{$b->STOK}}" min="0" max="100">
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