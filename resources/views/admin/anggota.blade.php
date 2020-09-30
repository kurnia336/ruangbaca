@extends('admin/index')
@section('title','Anggota Database')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
			<h1 class="float-left"><i class="fas fa-user-plus"></i> Daftar Anggota</h1>
				<a class="btn btn-primary float-right mt-2" href="{{url('/anggota/tambah')}}" role="button"><i class="fas fa-user-plus"></i> Tambah Anggota</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/anggota/cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}">
					<input type="submit" class="btn btn-success" value="CARI">
				</form>
		</div>
	<div class="col-12">

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
		<td>{{ $p->id_anggota }}</td>
		<td>{{ $p->nama_anggota }}</td>
		<td>{{ $p->jk_anggota }}</td>
		<td>{{ $p->notelp_anggota }}</td>
		<td>{{ $p->email_anggota }}</td>
		<td>{{ $p->alamat_anggota }}</td>
		<td>
			<a href="{{url('/anggota/edit/'.$p->id_anggota)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
			<a href="#" onclick="konfirmasi();" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a>
		</td>
	</tr>
	<script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya === true) {
            location.href = "{{url('/anggota/hapus/'.$p->id_anggota)}}";
         }else{
            location.href
         }
 
      }
    </script>
	@endforeach
</tbody> 
</table>
	<div class="text-center">{{ $anggota->links() }}</div>
		</div>
	</div>
</div>
@endsection