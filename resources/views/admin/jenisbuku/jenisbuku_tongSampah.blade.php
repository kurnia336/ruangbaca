@extends('admin/index')
@section('title','Data Jenis Buku')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fa fa-bookmark"></i> Daftar Jenis Buku Tidak Aktif</h1>
				<!-- <a class="btn btn-secondary float-right mt-2" style="margin: 5px;" href="{{url('/jenisbuku/jenisbuku_tongSampah')}}" role="button"><i class="fas fa-trash"></i> Jenis Buku Tidak Aktif</a>
				<a class="btn btn-primary float-right mt-2" href="{{url('/jenisbuku_tambah')}}" role="button"><i class="fa fa-bookmark"></i> Tambah Jenis Buku</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/jenisbuku_cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}" autocomplete="off">
					<input type="submit" class="btn btn-success" value="CARI">
				</form> -->
		</div>
	<div class="col-12">
<!-- style table -->
<table class="table table-stripped table-hover">
		<thead class="thead-primary bg-primary text-white">
	<tr>
		<th>ID Jenis Buku</th>
		<th>Nama Jenis Buku</th>
        <th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($jenis_buku as $j)
	<tr>
		<td>{{$j->ID_JENISBUKU}}</td>
		<td>{{$j->NAMA_JENISBUKU}}</td>
		<td>
		<!-- fontawesome  -->
			<!-- <a href="{{url('/jenisbuku_edit/'.$j->ID_JENISBUKU)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Jenis Buku</a> -->
			<a href="{{url('/jenisbuku/aktifkan_jenisbuku/'.$j->ID_JENISBUKU)}}" onclick="return confirm('Are you sure?')" class="badge badge-success"><i class="fas fa-recycle"></i> Aktifkan</a>
			<!-- <a href="{{url('/jenisbuku_hapus/'.$j->ID_JENISBUKU)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a> -->
		</td>
	</tr>
	@endforeach

</tbody>
</table>
<!-- untuk menambahkan bagian halaman -->
<div class="text-center">{{ $jenis_buku->links() }}</div>
		</div>
	</div>
</div>
@endsection