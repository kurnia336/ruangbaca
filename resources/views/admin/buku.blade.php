@extends('admin/index')
@section('title','Books Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-book"></i> Daftar Buku</h1>
				<a class="btn btn-primary float-right mt-2" href="{{url('/buku_tambah')}}" role="button"><i class="fas fa-book"></i> Tambah Buku</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/buku_cari')}}" method="GET">
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
		<th>ID Buku</th>
		<th>Nama Buku</th>
		<th>Penulis</th>
		<th>Penerbit</th>
		<th> Tahun Terbit</th>
		<th>Stok</th>
		<th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($buku as $b)
	<tr>
		<td>{{$b->id_buku}}</td>
		<td>{{$b->judul_buku}}</td>
		<td>{{$b->penulis_buku}}</td>
		<td>{{$b->penerbit}}</td>
		<td>{{$b->tahun_terbit}}</td>
		<td>{{$b->stok}}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/buku_edit/'.$b->id_buku)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Buku</a>
			<a href="#" onclick="konfirmasi();" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a>
		</td>
	</tr>
	<!-- script untuk menambahkan notifikasi -->
	<script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya === true) {
            location.href = "{{url('/buku_hapus/'.$b->id_buku)}}";
         }else{
            location.href
         }
 
      }
    </script>
	@endforeach
	
</tbody>
</table>
<!-- untuk menambahkan bagian halaman -->
<div class="text-center">{{ $buku->links() }}</div>
		</div>
	</div>
</div>

@endsection