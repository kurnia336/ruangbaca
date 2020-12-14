@extends('admin/index')
@section('title','Books Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-user-slash"></i> Anggota Tidak Aktif</h1>
                <!-- <a class="btn btn-danger float-right mt-2" style="margin: 5px;" href="{{url('/anggota/hapusPermanen_semua')}}" role="button"><i class="fas fa-dumpster-fire"></i> Delete All</a> -->
                <a class="btn btn-primary float-right mt-2" style="margin: 5px;" href="{{url('/anggota/kembalikan_semua')}}" role="button"><i class="fas fa-trash-restore"></i> Active All</a>
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
        <th>ID Anggota</th>
		<th>Nama Anggota</th>
		<th>JK Anggota</th>
		<th>No Telp Anggota</th>
		<th>Email Anggota</th>
		<th>Alamat Anggota</th>
		<th>Action</th>
	</tr>
		</thead>
<tbody>
    @foreach($anggota as $p)
	<tr>
        <td>{{ $p->ID_ANGGOTA }}</td>
		<td>{{ $p->NAMA_ANGGOTA }}</td>
		<td>{{ $p->JENIS_KELAMIN }}</td>
		<td>{{ $p->NO_TELP_ANGGOTA }}</td>
		<td>{{ $p->EMAIL_ANGGOTA }}</td>
		<td>{{ $p->ALAMAT_ANGGOTA }}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/anggota/kembalikan/'.$p->ID_ANGGOTA)}}" class="badge badge-success"><i class="fas fa-recycle"></i> Aktif</a>
			<!-- <a href="{{url('/anggota/hapusPermanen/'.$p->ID_ANGGOTA)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Permanen</a> -->
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
<div class="text-center">{{ $anggota->links() }}</div>
		</div>
	</div>
</div>

@endsection