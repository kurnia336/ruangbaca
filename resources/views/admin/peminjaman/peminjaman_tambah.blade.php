@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Peminjaman')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-handshake"></i> Form Tambah Peminjaman</h3>
	<form action="{{url('/peminjaman/peminjaman/simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_PEMINJAMAN" id="ID_PEMINJAMAN" placeholder="Masukkan ID Buku" required="true">
		</div>
		<div class="form-group">
            <label for="ID_ANGGOTA">Pilih Anggota</label>
                <!-- <select name="ID_ANGGOTA" id="ID_ANGGOTA" class="form-control" style="">
                    <option value="">--- Nama Anggota ---</option>
                    @foreach ($anggota as $key => $value)
                    <option name="ID_ANGGOTA" id="ID_ANGGOTA" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select> -->
                <select class="cari_anggota form-control" style="" id="ID_ANGGOTA" name="ID_ANGGOTA" autocomplete="off" required></select>
                @if($errors->has('ID_ANGGOTA'))
                                <div class="text-danger">
                                    <input type="hidden" value="{{ $errors->first('ID_ANGGOTA')}}">Nama Anggota wajib diisi</input>
                                </div>
                            @endif
		</div>
        <div class="form-group">
            <label for="ID_BUKU">Pilih Buku</label>
                <!-- <select name="ID_BUKU" id="ID_BUKU" class="form-control" style="">
                    <option value="">--- Nama Buku ---</option>
                    @foreach ($buku as $key => $value)
                    <option name="ID_BUKU" id="ID_BUKU" value="{{ $value->ID_BUKU }}" @if( ($value->STOK) == 0) disabled @endif>[{{ $value->ID_BUKU }}] {{ $value->JUDUL_BUKU }} DENGAN STOK {{ $value->STOK }} </option>
                    @endforeach
                </select> -->
                <select class="cari_buku form-control" style="" id="ID_BUKU" name="ID_BUKU" autocomplete="off" required></select>
                @if($errors->has('ID_BUKU'))
                                <div class="text-danger">
                                   <input type="hidden" value="{{ $errors->first('ID_BUKU')}}">Nama Buku wajib diisi</input>
                                </div>
                            @endif
		</div>
        <div class="form-group">
            <label for="ID_PETUGAS">Pilih Petugas</label>
                <!-- <select name="ID_PETUGAS" id="ID_PETUGAS" class="form-control" style="" required>
                    <option value="">--- Nama Petugas ---</option>
                    @foreach ($petugas as $key => $value)
                    <option name="ID_PETUGAS" id="ID_PETUGAS" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select> -->
                <select class="cari_petugas form-control" style="" id="ID_PETUGAS" name="ID_PETUGAS" autocomplete="off" required></select>
                @if($errors->has('ID_PETUGAS'))
                                <div class="text-danger">
                                    <input type="hidden" value="{{ $errors->first('ID_PETUGAS')}}">Nama Petugas wajib diisi</input>
                                </div>
                            @endif
		</div>
		<div class="form-group">
			<label for="tahun_terbit">Tanggal Pinjam</label>
			<!-- <input class="date form-control" type="text" name="TANGGAL_PINJAM" id="TANGGAL_PINJAM" placeholder="" autocomplete="off"> -->
            <div class="start_date input-group mb-4">
            <input class="form-control date" type="text" placeholder="Tanggal Pinjam" name="TANGGAL_PINJAM" id="TANGGAL_PINJAM" autocomplete="off" required>
                <div class="input-group-append">
                <span class="fa fa-calendar input-group-text start_date_calendar" aria-hidden="true "></span>
                </div>
            </div>
		</div>
		<div class="form-group">
			<label for="stok">Tanggal Kembali</label>
			<!-- <input class="date form-control" type="text" name="TANGGAL_KEMBALI" id="TANGGAL_KEMBALI" placeholder="" autocomplete="off"> -->
            <div class="start_date input-group mb-4">
            <input class="form-control date" type="text" placeholder="Tanggal Kembali" name="TANGGAL_KEMBALI" id="TANGGAL_KEMBALI" autocomplete="off" required>
                <div class="input-group-append">
                <span class="fa fa-calendar input-group-text start_date_calendar" aria-hidden="true "></span>
                </div>
            </div>
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
<script type="text/javascript">
  $('.cari_anggota').select2({
    placeholder: 'Cari...',
    ajax: {
      url: "{{url('/cari_anggota')}}",
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.NAMA_ANGGOTA,
              id: item.ID_ANGGOTA
            }
          })
        };
      },
      cache: false
    }
  });

  $('.cari_buku').select2({
    placeholder: 'Cari...',
    ajax: {
      url: "{{url('/cari_buku')}}",
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.JUDUL_BUKU,
              id: item.ID_BUKU
            }
          })
        };
      },
      cache: false
    }
  });

  $('.cari_petugas').select2({
    placeholder: 'Cari...',
    ajax: {
      url: "{{url('/cari_petugas')}}",
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.NAMA_PETUGAS,
              id: item.ID_PETUGAS
            }
          })
        };
      },
      cache: false
    }
  });

</script>
<!-- /.Main Section -->
@endsection
