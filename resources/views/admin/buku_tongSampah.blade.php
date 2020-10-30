@extends('admin/index')
@section('title','Books Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-handshake"></i> Tong Sampah</h1>
                <a class="btn btn-danger float-right mt-2" style="margin: 5px;" href="{{url('/buku/hapusPermanen_semua')}}" role="button"><i class="fas fa-dumpster-fire"></i> Delete All</a>
                <a class="btn btn-primary float-right mt-2" style="margin: 5px;" href="{{url('/buku/kembalikan_semua')}}" role="button"><i class="fas fa-trash-restore"></i> Restore All</a>
				<!-- <form class="float-right mt-2" style="margin: 5px;" action="{{url('/buku_cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}">
					<input type="submit" class="btn btn-success" value="CARI">
				</form> -->
		</div>
	<div class="col-12">
<!-- style table -->
<table class="table table-stripped table-hover">
		<thead class="thead-primary bg-primary text-white">
	<tr>
		<th>ID Buku</th>
		<th>Nama Rak</th>
		<th>Nama Buku</th>
		<th>Penulis</th>
		<th>Penerbit</th>
		<th>Tahun Terbit</th>
		<th>Stok</th>
		<th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($buku as $b)
	<tr>
		<td>{{$b->ID_BUKU}}</td>
		<td>{{$b->NAMA_RAK}}</td>
		<td>{{$b->JUDUL_BUKU}}</td>
		<td>{{$b->PENULIS_BUKU}}</td>
		<td>{{$b->PENERBIT}}</td>
		<td>{{$b->TAHUN_TERBIT}}</td>
		<td>{{$b->STOK}}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/buku/kembalikan/'.$p->ID_BUKU)}}" class="badge badge-success"><i class="fas fa-recycle"></i> Restore</a>
			<a href="{{url('/buku/hapusPermanen/'.$p->ID_BUKU)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Permanen</a>
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
<div class="text-center">{{ $buku->links() }}</div>
		</div>
	</div>
</div>

@endsection