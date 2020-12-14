@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Peminjaman')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
    <div class="row">
<!-- Content -->
        <div class="col-md-12 mt-3">
        <!-- fontawesome  -->
            <h3><i class="fas fa-handshake"></i> Form Edit Peminjaman</h3>
    <form action="{{url('/peminjaman/peminjaman/update/'.$peminjaman->ID_PEMINJAMAN)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <!-- <label for="id_buku">ID Buku</label> -->
            <input class="form-control" type="hidden" name="ID_PEMINJAMAN" id="ID_PEMINJAMAN" placeholder="Masukkan ID Buku" required="true" value="{{$peminjaman->ID_PEMINJAMAN}}">
        </div>
        <div class="form-group">
        <?php $selectedvalue=$peminjaman->ID_ANGGOTA ?>
            <label for="ID_ANGGOTA">Pilih Anggota</label>
                <select name="ID_ANGGOTA" id="ID_ANGGOTA" class="form-control" style="">
                    <option value="">--- Nama Anggota ---</option>
                    @foreach ($anggota as $key => $value)
                    <option name="ID_ANGGOTA" id="ID_ANGGOTA" value="{{ $key }}" {{ $key == $selectedvalue ? 'selected="selected"' : '' }}>[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_ANGGOTA'))
                                <div class="text-danger">
                                    <input type="hidden" value="{{ $errors->first('ID_ANGGOTA')}}">Nama Anggota wajib diisi</input>
                                </div>
                            @endif
        </div>
        <div class="form-group">
        <?php $selectedvalue=$peminjaman->ID_BUKU ?>
            <label for="ID_BUKU">Pilih Buku</label>
                <select name="ID_BUKU" id="ID_BUKU" class="form-control" style="">
                    <option value="">--- Nama Buku ---</option>
                    @foreach ($buku as $key => $value)
                    <option name="ID_BUKU" id="ID_BUKU" value="{{ $value->ID_BUKU }}" {{ $value->ID_BUKU == $selectedvalue ? 'selected="selected"' : '' }} @if( ($value->STOK) == 0) disabled @endif>[{{ $key }}] {{ $value->JUDUL_BUKU }}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_BUKU'))
                                <div class="text-danger">
                                   <input type="hidden" value="{{ $errors->first('ID_BUKU')}}">Nama Buku wajib diisi</input>
                                </div>
                            @endif
        </div>
        <div class="form-group">
        <?php $selectedvalue=$peminjaman->ID_PETUGAS ?>
            <label for="ID_PETUGAS">Pilih Petugas</label>
                <select name="ID_PETUGAS" id="ID_PETUGAS" class="form-control" style="">
                    <option value="">--- Nama Petugas ---</option>
                    @foreach ($petugas as $key => $value)
                    <option name="ID_PETUGAS" id="ID_PETUGAS" value="{{ $key }}" {{ $key == $selectedvalue ? 'selected="selected"' : '' }}>[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_PETUGAS'))
                                <div class="text-danger">
                                    <input type="hidden" value="{{ $errors->first('ID_PETUGAS')}}">Nama Petugas wajib diisi</input>
                                </div>
                            @endif
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tanggal Pinjam</label>
            <input class="date form-control" type="text" name="TANGGAL_PINJAM" id="TANGGAL_PINJAM" value="{{$peminjaman->TANGGAL_PINJAM}}" placeholder="" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="stok">Tanggal Kembali</label>
            <input class="date form-control" type="text" name="TANGGAL_KEMBALI" id="TANGGAL_KEMBALI" value="{{$peminjaman->TANGGAL_KEMBALI}}" placeholder="" autocomplete="off">
        </div>
        <div class="form-group float-right">
        <!-- fontawesome  -->
            <button class="btn btn-lg btn-danger" type="reset"><i class="fas fa-times"></i> Batal</button>
            <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
        </div>
    </form>
        </div>
<!-- /.content -->
    </div>
</div>
<script type="text/javascript">

(function() {

$("#TANGGAL_PINJAM").datepicker({
  format: 'yyyy-mm-dd',
  startDate: new Date(),
  endDate: ''
}).on("show", function() {
  $(this).val("{{$peminjaman->TANGGAL_PINJAM}}").datepicker('update');
});

$("#TANGGAL_KEMBALI").datepicker({
  format: 'yyyy-mm-dd',
  startDate: new Date(),
  endDate: ''
}).on("show", function() {
  $(this).val("{{$peminjaman->TANGGAL_KEMBALI}}").datepicker('update');
});

})(); 

</script> 
<!-- /.Main Section -->
@endsection
