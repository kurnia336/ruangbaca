@extends('admin/index')
@section('title','Books Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-handshake"></i> Daftar Pengembalian</h1>
				<a class="btn btn-secondary float-right mt-2" style="margin: 5px;" href="{{url('/pengembalian/pengembalian_tongSampah')}}" role="button"><i class="fas fa-trash"></i> Tong Sampah Pengembalian</a>
				<a class="btn btn-primary float-right mt-2" style="margin: 5px;" href="{{url('/pengembalian/pengembalian/tambah')}}" role="button"><i class="fas fa-handshake"></i> Tambah Pengembalian</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/pengembalian_cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}">
					<input type="submit" class="btn btn-success" value="CARI">
				</form>
		</div>
	<div class="col-12">
<!-- style table -->
<table class="table table-stripped table-hover">
		<thead class="thead-primary bg-primary text-white">
	<tr>
		<th>ID Pengembalian</th>
		<th>Nama Anggota</th>
		<th>Nama Petugas</th>
		<th>Nama Buku</th>
		<th>Tanggal Pengembalian</th>
		<th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($pengembalian as $p)
	<tr>
		<td>{{$p->ID_PENGEMBALIAN}}</td>
		<td>{{ $p->anggota->NAMA_ANGGOTA }}</td>
		<td>{{ $p->petugas->NAMA_PETUGAS }}</td>
		<td>{{ $p->buku->JUDUL_BUKU }}</td>
		<td>{{\Carbon\Carbon::parse($p->TANGGAL_PENGEMBALIAN)->format('d/m/Y')}}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/pengembalian/pengembalian/edit/'.$p->ID_PENGEMBALIAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Buku</a>
			<a href="{{url('/pengembalian/hapusSementara/'.$p->ID_PENGEMBALIAN)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Sementara</a>
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
<div class="text-center">{{ $pengembalian->links() }}</div>
		</div>
	</div>
</div>

@endsection