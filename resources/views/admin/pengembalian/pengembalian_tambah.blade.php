@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Peminjaman')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><<i class="fas fa-undo-alt"></i Form Tambah Pengembalian</h3>
	<form action="{{url('/pengembalian/pengembalian/simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_PENGEMBALIAN" id="ID_PENGEMBALIAN" placeholder="Masukkan ID Buku" required="true">
		</div>
		<div class="form-group">
            <label for="ID_ANGGOTA">Pilih Anggota</label>
                <select name="ID_ANGGOTA" id="ID_ANGGOTA" class="form-control" style="">
                    <option value="">--- Nama Anggota ---</option>
                    @foreach ($anggota as $key => $value)
                    <option name="ID_ANGGOTA" id="ID_ANGGOTA" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_ANGGOTA'))
                                <div class="text-danger">
                                    <input type="hidden" value="{{ $errors->first('ID_ANGGOTA')}}">Nama Anggota wajib diisi</input>
                                </div>
                            @endif
		</div>
        <div class="form-group">
            <label for="ID_PETUGAS">Pilih Petugas</label>
                <select name="ID_PETUGAS" id="ID_PETUGAS" class="form-control" style="">
                    <option value="">--- Nama Petugas ---</option>
                    @foreach ($petugas as $key => $value)
                    <option name="ID_PETUGAS" id="ID_PETUGAS" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_PETUGAS'))
                                <div class="text-danger">
                                    <input type="hidden" value="{{ $errors->first('ID_PETUGAS')}}">Nama Petugas wajib diisi</input>
                                </div>
                            @endif
        </div>
        <div class="form-group">
            <label for="ID_BUKU">Pilih Buku</label>
                <select name="ID_BUKU" id="ID_BUKU" class="form-control" style="">
                    <option value="">--- Nama Buku ---</option>
                    @foreach ($buku as $key => $value)
                    <option name="ID_BUKU" id="ID_BUKU" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_BUKU'))
                                <div class="text-danger">
                                   <input type="hidden" value="{{ $errors->first('ID_BUKU')}}">Nama Buku wajib diisi</input>
                                </div>
                            @endif
		</div>
		<div class="form-group">
			<label for="stok">Tanggal Pengembalian</label>
			<input class="date form-control" type="text" name="TANGGAL_PENGEMBALIAN" id="TANGGAL_PENGEMBALIAN" placeholder="" autocomplete="off">
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
<script type="text/javascript">

    $('.date').datepicker({  

        startDate: new Date(),
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true

     });  

</script>  
<!-- /.Main Section -->
@endsection