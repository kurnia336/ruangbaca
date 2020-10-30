@extends('admin/index')
@section('title','Data Penerbit')
@section('container')
<div class="container">
	<div class="row">
		<div class="my-4 col-12">
		<!-- form cari -->
			<h1 class="float-left"><i class="fa fa-building"></i> Daftar Penerbit</h1>
				<a class="btn btn-primary float-right mt-2" href="{{url('/penerbit_tambah')}}" role="button"><i class="fa fa-building"></i> Tambah Penerbit</a>
				<form class="float-right mt-2" style="margin: 5px;" action="{{url('/penerbit_cari')}}" method="GET">
					{{ csrf_field() }}
					<input type="text" name="cari" placeholder="Cari..." value="{{ old('cari') }}" autocomplete="off">
					<input type="submit" class="btn btn-success" value="CARI">
				</form>
		</div>
	<div class="col-12">
<!-- style table -->
<table class="table table-stripped table-hover">
		<thead class="thead-primary bg-primary text-white">
	<tr>
		<th>ID Penerbit</th>
		<th>Nama Penerbit</th>
        <th>Action</th>
	</tr>
		</thead>
<tbody>
	@foreach($penerbit as $p)
	<tr>
		<td>{{$p->ID_PENERBIT}}</td>
		<td>{{$p->NAMA_PENERBIT}}</td>
		<td>
		<!-- fontawesome  -->
			<a href="{{url('/penerbit_edit/'.$p->ID_PENERBIT)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Penerbit</a>
			<a href="{{url('/penerbit_hapus/'.$p->ID_PENERBIT)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus</a>
		</td>
	</tr>
	<!-- script untuk menambahkan notifikasi -->
	<!-- <script>
      function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
 
         if(tanya === true) {
            location.href = "{{url('/penerbit_hapus/'.$p->ID_PENERBIT)}}";
         }else{
            location.href
         }
 
      }
    </script> -->
	@endforeach

</tbody>
</table>
<!-- untuk menambahkan bagian halaman -->
<div class="text-center">{{ $penerbit->links() }}</div>
		</div>
	</div>
</div>
@endsection