<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ url('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- link untuk mengakses fontawesome, ini penting-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <!--  -->
  
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <style type="text/css">
    .container-fluid{

    }
  </style>
  <!-- Custom styles for this template -->
  <link href="{{ url('backend/css/simple-sidebar.css')}}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- pemberian icon dari fontawesome -->
    <!-- fontawesome <i class="fas-..."></i>  -->
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><i class="fas fa-tachometer-alt"></i> Dashboard </div>
      <div class="list-group list-group-flush">
        <a href="{{url('/home')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Home</a>
        <a href="{{url('/about')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-info-circle"></i> About</a>
        <a href="{{url('/buku/buku_tampil')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-book"></i> Buku</a>
        @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Petugas')
        <a href="{{url('/rak/rak_tampil')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-book-reader"></i> Rak</a>
        <a href="{{url('/jenisbuku/jenisbuku_tampil')}}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-bookmark"></i></i> Jenis Buku</a>
        <a href="{{url('/penerbit/penerbit_tampil')}}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-building"></i></i> Penerbit</a>
        @endif
        @if(auth()->user()->role == 'Admin')
        <a href="{{url('/petugas/petugas')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-tie"></i> Petugas</a>
        @endif
        @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Petugas')
        <a href="{{url('/anggota/anggota')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-plus"></i> Anggota</a>
        <a href="{{url('/peminjaman/peminjaman')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-handshake"></i></i> Peminjaman</a>
        <a href="{{url('/pengembalian/pengembalian')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-undo-alt"></i> Pengembalian</a>
        @endif
        @if(auth()->user()->role == 'Anggota')
        <a href="{{url('/peminjaman/historyPeminjaman')}}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-handshake"></i></i> History Peminjaman</a>
        @endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <!-- fontawesome  -->
        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i>
          <!-- <i class="fas fa-ellipsis-v"></i> -->
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <!-- <li class="nav-item active">
              <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Master
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item" href="{{url('/buku')}}">
                              Data Buku         
                </a>
                <a class="dropdown-item" href="{{url('/home')}}">
                              Data Rak         
                </a>
                <a class="dropdown-item" href="{{url('/home')}}">
                              Data Petugas         
                </a>
                <a class="dropdown-item" href="{{url('/home')}}">
                              Data Anggota         
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Data Transaksi
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item" href="{{url('/buku')}}">
                              Data Peminjaman         
                </a>
                <a class="dropdown-item" href="{{url('/home')}}">
                              Data Pengembalian         
                </a>
              </div>
            </li> -->
          </ul>

          <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <!-- fontawesome  -->
                                        <i class="fas fa-power-off"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
      </nav>

      <!-- notifikasi berhasil -->
      <div class="container-fluid">
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
        @endif
        <!-- <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p> -->
        @section('container')
        <div class="card" style="margin:20px">
                <!-- fontawesome  -->
                <div class="card-header bg-success text-white"><i class="fas fa-tachometer-alt"></i> Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="img/buku1.jpg" class="img-fluid rounded mx-auto d-block" width="35%" alt="Ruang Baca">
                    Hai <b>{{ Auth::user()->name }}</b>, anda sudah melakukan login SI Ruang Baca.
                    <p style="text-indent:30pt;text-align:justify;">Sistem Informasi Ruang Baca merupakan sistem informasi yang dikembangkan untuk memudahkan dalam pelayanan serta memudahkan petugas perpustakaan dalam mengelola perpustakaan. Petugas perpustakaan dapat selalu memonitor tentang ketersediaan buku, daftar buku, daftar data anggota dan petugas, peminjaman buku dan pengembalian buku.</p>
                    <p style="text-indent:30pt;text-align:justify;">Dengan sistem ini, peminjam buku maupun yang mengembalikan buku tidak perlu menunggu lama untuk proses peminjaman/pengembalian buku. Petugas perpustakaan pun tidak akan mengalami kesulitan dalam proses pelaporan. Sistem informasi raung baca yang berbasis webbase, memudahkan kita untuk mengakses perpustakaan online, bahkan mengetahui rekam jejak aktifitas pengunjung perpustakaan. Sistem informasi ini juga mempermudah bagi pengguna untuk mencari buku lebih bebas, cepat , leluasa dan nyaman.</p>
                </div>
            </div>
        @endsection
        @yield('container')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ url('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>