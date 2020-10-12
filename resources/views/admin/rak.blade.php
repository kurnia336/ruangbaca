@extends('admin/index')
@section('title','Data Rak')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fas fa-book"></i> Daftar Rak</h1>
				<a class="btn btn-primary float-right mt-2" href="{{url('/rak_tambah')}}" role="button"><i class="fas fa-book"></i> Tambah Rak</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/rak_cari')}}" method="GET">
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
		<th>ID Rak</th>
		<th>ID Buku</th>
		<th>Nama Rak</th>
		<th>Lokasi Rak</th>
	</tr>
		</thead>
<tbody>
	@foreach($rak as $r)
	<tr>
		<td>{{$r->id_rak}}</td>
		<td>{{$r->id_buku}}</td>
		<td>{{$r->nama_rak}}</td>
		<td>{{$r->lokasi_rak}}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/rak_edit/'.$r->id_rak)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Buku</a>
			<a href="#" onclick="konfirmasi();" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a>
		</td>
	</tr>
	<!-- script untuk menambahkan notifikasi -->
	<script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya === true) {
            location.href = "{{url('/rak_hapus/'.$r->id_rak)}}";
         }else{
            location.href
         }
 
      }
    </script>
	@endforeach
	
</tbody>
</table>
<!-- untuk menambahkan bagian halaman -->
<div class="text-center">{{ $rak->links() }}</div>
		</div>
	</div>
</div>

@endsection