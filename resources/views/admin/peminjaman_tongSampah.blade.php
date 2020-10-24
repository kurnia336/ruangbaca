@extends('admin/index')
@section('title','Books Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-handshake"></i> Tong Sampah</h1>
                <a class="btn btn-danger float-right mt-2" style="margin: 5px;" href="{{url('/peminjaman/hapusPermanen_semua')}}" role="button"><i class="fas fa-dumpster-fire"></i> Delete All</a>
                <a class="btn btn-primary float-right mt-2" style="margin: 5px;" href="{{url('/peminjaman/kembalikan_semua')}}" role="button"><i class="fas fa-trash-restore"></i> Restore All</a>
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
		<td>{{ $p->anggota->NAMA_ANGGOTA }}</td>
		<td>{{ $p->buku->JUDUL_BUKU }}</td>
		<td>{{ $p->petugas->NAMA_PETUGAS }}</td>
        <td>{{\Carbon\Carbon::parse($p->TANGGAL_PINJAM)->format('d/m/Y')}}</td>
		<td>{{\Carbon\Carbon::parse($p->TANGGAL_KEMBALI)->format('d/m/Y')}}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/peminjaman/kembalikan/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-recycle"></i> Restore</a>
			<a href="{{url('/peminjaman/hapusPermanen/'.$p->ID_PEMINJAMAN)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Permanen</a>
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