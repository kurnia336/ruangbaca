@extends('admin/index')
@section('title','About')
@section('container')
	<div class="container">
		<div class="row">
			<div class="col-10">
			<!-- fontawesome -->
				<h1 class="mt-3"><i class="fas fa-info-circle"></i> About This Site</h1>
				<h3><i class="fas fa-users-cog"></i> Author</h3>
				<ul>
				<li>Mukhlas Yudha Saputra Bahari Muchrad - 151911513015</li>
				<li>Alif Rachmad Kurniawan - 151911513016</li>
				</ul>
				<h3><i class="fas fa-sitemap"></i> Sitemap</h3>
				<p>Pada SI Ruang Baca ini terdapat berbagai macam menu untuk mengolah dan memproses data diantaranya sebagai berikut :</p>
				<ol>
					<li>Penerimaan Buku/CRUD Buku (termasuk CRUD Rak, Penerbit, Jenis Buku)</li>
					<li>Melayani anggota yang hendak melakukan peminjaman / CRUD Peminjaman</li>
					<li>Melayani anggota yang hendak melakukan pengembalian / CRUD Pengembalian</li>
					<li>CRUD data Petugas Ruang Baca</li>
					<li>CRUD data Anggota Ruang Baca</li>
					<li>Histori peminjaman buku / Tong Sampah milik peminjaman buku sebagai history peminjaman bagi Petugas</li>
					<li>History peminjaman buku oleh Anggota / Tong Sampah peminjaman yang hanya akan dilihat oleh Anggota yang melakukan login nanti</li>
					

				</ol>
			</div>
		</div>
	</div>
@endsection
