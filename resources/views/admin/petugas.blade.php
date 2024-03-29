@extends('admin/index')
@section('title','Petugas Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
			<h1 class="float-left"><i class="fas fa-user-tie"></i> Daftar Petugas</h1>
				<a class="btn btn-primary float-right mt-2" href="{{url('/petugas/tambah')}}" role="button"><i class="fas fa-user-tie"></i> Tambah Petugas</a>
				<!-- <br>
				<br> -->
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/petugas/cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}">
					<input type="submit" class="btn btn-success" value="CARI">
				</form>
		</div>
	<div class="col-12">

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
		<td>{{ $p->id_petugas }}</td>
		<td>{{ $p->nama_petugas }}</td>
		<td>{{ $p->jabatan }}</td>
		<td>{{ $p->notelp_petugas }}</td>
		<td>{{ $p->email_petugas }}</td>
		<td>{{ $p->alamat_petugas }}</td>
		<td>
			<a href="{{url('/petugas/edit/'.$p->id_petugas)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
			<a href="#" onclick="konfirmasi();" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a>
		</td>
	</tr>
	<script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya === true) {
            location.href = "{{url('/petugas/hapus/'.$p->id_petugas)}}";
         }else{
            location.href
         }
 
      }
    </script>
	@endforeach
</tbody>
</table>
	<div class="text-center">{{ $petugas->links() }}</div>
		</div>
	</div>
</div>
@endsection