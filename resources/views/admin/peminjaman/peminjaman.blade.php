@extends('admin/index')
@section('title','Peminjaman Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-handshake"></i> Daftar Peminjaman</h1>
				<!-- <a class="btn btn-secondary float-right mt-2" style="margin: 5px;" href="{{url('/peminjaman/peminjaman_tongSampah')}}" role="button"><i class="fas fa-trash"></i> Tong Sampah Peminjaman</a> -->
				<a class="btn btn-primary float-right mt-2" style="margin: 5px;" href="{{url('/peminjaman/peminjaman/tambah')}}" role="button"><i class="fas fa-handshake"></i> Tambah Peminjaman</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/peminjaman_cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}" autocomplete="off">
					<input type="submit" class="btn btn-success" value="CARI">
				</form>
		</div>
	<div class="col-12">
<!-- style table -->
<table class="table table-stripped table-hover">
		<thead class="thead-primary bg-primary text-white">
	<tr>
		<th>ID Peminjaman</th>
		<th>Nama Anggota</th>
		<th>Nama Buku</th>
		<th>Nama Petugas</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($peminjaman as $p)
	
	
	<tr>
		<td>{{$p->ID_PEMINJAMAN}}</td>
		<td>{{$p->anggota->NAMA_ANGGOTA}}</td>
		<td>{{$p->buku->JUDUL_BUKU}}</td>
		<td>{{$p->petugas->NAMA_PETUGAS}}</td>
		<td>{{\Carbon\Carbon::parse($p->TANGGAL_PINJAM)->format('d/m/Y')}}</td>
		<td>{{\Carbon\Carbon::parse($p->TANGGAL_KEMBALI)->format('d/m/Y')}}</td>
		<td>
		<!-- fontawesome  -->
			<!-- <a href="{{url('/peminjaman/peminjaman/edit/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Peminjaman</a> -->
			<a href="{{url('/peminjaman/peminjaman/simpan_pengembalian/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Kembalikan</a>
			<!-- <a href="{{url('/peminjaman/hapusSementara/'.$p->ID_PEMINJAMAN)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Sementara</a> -->
		</td>
		
	</tr>

		
	<!-- script untuk menambahkan notifikasi -->
	<!-- <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya == true) {
            location.href = "{{url('/buku_hapus/'.$p->ID_PEMINJAMAN)}}";
         }
 
      }
    </script> -->
	@endforeach
	
</tbody>
</table>
<!-- untuk menambahkan bagian halaman -->
<div class="text-center">{{ $peminjaman->links() }}</div>
		</div>
	</div>
</div>

@endsection