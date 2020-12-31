@extends('admin/index') {{-- mengambil file index.blade.php --}}
@section('title','Tambah Buku')
@section('container') {{-- Mengisi di bagian content --}}
<!-- Main Section -->
<div class="container">
	<div class="row">
<!-- Content -->
		<div class="col-md-12 mt-3">
		<!-- fontawesome  -->
			<h3><i class="fas fa-book"></i> Form Tambah Buku</h3>
	<form action="{{url('/buku/buku_simpan')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- <label for="id_buku">ID Buku</label> -->
			<input class="form-control" type="hidden" name="ID_BUKU" id="ID_BUKU" placeholder="Masukkan ID Buku" required="true" autocomplete="off" required>
		</div>
		<div class="form-group">
            <label for="buku">Pilih Rak</label>
                <!-- <select name="ID_RAK" id="ID_RAK" class="form-control" style="">
                    <option value="">--- Nama Rak ---</option>
                    @foreach ($rak as $key => $value)
                    <option name="ID_RAK" id="ID_RAK" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select> -->
				<select class="cari_rak form-control" style="" name="ID_RAK" autocomplete="off" required></select>
		</div>
		<div class="form-group">
            <label for="buku">Pilih Jenis Buku</label>
                <!-- <select name="ID_JENISBUKU" id="ID_JENISBUKU" class="form-control" style="">
                    <option value="">--- Jenis Buku ---</option>
                    @foreach ($jenis_buku as $key => $value)
                    <option name="ID_JENISBUKU" id="ID_JENISBUKU" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select> -->
				<select class="cari_jenisbuku form-control" style="" name="ID_JENISBUKU" autocomplete="off" required></select>
		</div>
		<div class="form-group">
            <label for="buku">Pilih Penerbit</label>
                <!-- <select name="ID_PENERBIT" id="ID_PENERBIT" class="form-control" style="">
                    <option value="">--- Penerbit ---</option>
                    @foreach ($penerbit as $key => $value)
                    <option name="ID_PENERBIT" id="ID_PENERBIT" value="{{ $key }}">[{{ $key }}] {{ $value }}</option>
                    @endforeach
                </select> -->
				<select class="cari_penerbit form-control" style="" name="ID_PENERBIT" autocomplete="off" required></select>
		</div>
		<div class="form-group">
			<label for="judul_buku">Judul Buku</label>
			<input class="form-control" type="text" name="JUDUL_BUKU" id="JUDUL_BUKU" placeholder="Masukkan Judul Buku" required="true" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="penulis_buku">Penulis</label>
			<input class="form-control" type="text" name="PENULIS_BUKU" id="PENULIS_BUKU" placeholder="Masukkan Penulis Buku" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="tahun_terbit">Tahun Terbit</label>
			<input class="form-control" type="text" name="TAHUN_TERBIT" id="TAHUN_TERBIT" placeholder="Masukkan Tahun Terbit" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="stok">Stok</label>
			<input class="form-control" type="number" name="STOK" id="STOK" placeholder="Masukkan Stok Buku" min="0" max="100" autocomplete="off" required>
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
<!-- /.Main Section -->

<script type="text/javascript">
  $('.cari_rak').select2({
    placeholder: 'Cari...',
    ajax: {
      url: "{{url('/cari_rak')}}",
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.NAMA_RAK,
              id: item.ID_RAK
            }
          })
        };
      },
      cache: false
    }
  });

  $('.cari_jenisbuku').select2({
    placeholder: 'Cari...',
    ajax: {
      url: "{{url('/cari_jenisbuku')}}",
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.NAMA_JENISBUKU,
              id: item.ID_JENISBUKU
            }
          })
        };
      },
      cache: false
    }
  });

  $('.cari_penerbit').select2({
    placeholder: 'Cari...',
    ajax: {
      url: "{{url('/cari_penerbit')}}",
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.NAMA_PENERBIT,
              id: item.ID_PENERBIT
            }
          })
        };
      },
      cache: false
    }
  });
</script>
@endsection
