@extends('admin/index')
@section('title','Petugas Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-user-tie"></i> Daftar Petugas</h1>
				<a class="btn btn-primary float-right mt-2" href="{{url('/petugas/petugas/tambah')}}" role="button"><i class="fas fa-user-tie"></i> Tambah Petugas</a>
				<!-- <br>
				<br> -->
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/petugas/cari')}}" method="GET">
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
		<th>IDPetugas</th>
		<th>Nama Petugas</th>
		<th>Jabatan</th>
		<th>No. Telp</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($petugas as $p)
	<tr>
		<td>{{ $p->ID_PETUGAS }}</td>
		<td>{{ $p->NAMA_PETUGAS }}</td>
		<td>{{ $p->JABATAN }}</td>
		<td>{{ $p->NO_TELP_PETUGAS }}</td>
		<td>{{ $p->EMAIL_PETUGAS }}</td>
		<td>{{ $p->ALAMAT_PETUGAS }}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/petugas/petugas/edit/'.$p->ID_PETUGAS)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
			<a href="{{url('/petugas/hapus/'.$p->ID_PETUGAS)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a>
		</td>
	</tr>
	<!-- script untuk menambahkan notifikasi -->
	<!-- <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya === true) {
            location.href = "{{url('/petugas/hapus/'.$p->ID_PETUGAS)}}";
         }else{
            location.href
         }
 
      }
    </script> -->
	@endforeach
</tbody>
</table>
<!-- untuk menambahkan bagian halaman -->
	<div class="text-center">{{ $petugas->links() }}</div>
		</div>
	</div>
</div>
@endsection