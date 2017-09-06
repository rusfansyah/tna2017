<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    {{-- bootstrap buka --}}

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/jumbotron-narrow.css') }}" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('js/jquery-ui.css') }}"> --}}

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="{{ asset('css/morris.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    {{-- bootstrap tutup --}}
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <ul class="nav navbar-nav">
                      @if (Auth::guest())

                      @else
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                           <ul class="nav navbar-nav">
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-users"></span> Guru <span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                 <li><a href="/guru"><span class="fa fa-address-card-o"></span> Tampil Guru</a></li>
                                 <li><a href="/guru/create/"><span class="fa fa-user-plus"></span> Tambah Guru</a></li>
                               </ul>
                             </li>
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-wpforms
"></span> Jenjang Sekolah<span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                 <li><a href="/jenjang"><span class="fa fa-eye"></span> Tampil Jenjang Sekolah</a></li>
                                 <li><a href="/jenjang/create/"><span class="fa fa-plus"></span> Tambah Jenjang Sekolah</a></li>
                               </ul>
                             </li>
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-check-square-o"></span> Instrumen <span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                 <li><a href="/kategori_tna"><span class="fa fa-eye"></span> Tampil Kategori TNA</a></li>
                                 <li><a href="/kategori_tna/create"><span class="fa fa-plus"></span> Tambah Kategori TNA</a></li>
                                 <li role="separator" class="divider"></li>
                                 <li><a href="/detil_tna"><span class="fa fa-eye"></span> Tampil Detil TNA</a></li>
                                 <li><a href="/detil_tna/create"><span class="fa fa-plus"></span> Tambah Detil TNA</a></li>
                                 <li role="separator" class="divider"></li>
                               </ul>
                             </li>
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-print"></span> Laporan <span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                 <li><a href="/lap_hasil/guru"><span class="fa fa-address-card-o"></span> Laporan Guru</a></li>
                                 <li><a href="/lap_hasil/jumlahgurujenjang"><span class="fa fa-address-card-o"></span> Laporan Jumlah Guru per Jenjang</a></li>
                                 <li><a href="/lap_hasil/jumlahgurukompetensi"><span class="fa fa-address-card-o"></span> Laporan Jumlah Guru per Kompetensi</a></li>
                                 <li><a href="/lap_hasil"><span class="fa fa-file-text-o"></span>   Laporan Hasil TNA</a></li>

                                 <li role="separator" class="divider"></li>
                                 <li><a href="/guru/grafik"><span class="fa fa-bar-chart"></span> Grafik Jumlah Guru per Jenjang</a></li>
                                 <li><a href="/lap_hasil/mapel"><span class="fa fa-bar-chart"></span> Grafik Jumlah Guru per Mapel yang diampu</a></li>
                                <li><a href="/lap_hasil/mapel_ikut"><span class="fa fa-bar-chart"></span> Grafik Jumlah Mapel Diklat yang Pernah Diikuti Guru</a></li>
                                 <li><a href="/lap_hasil/mapel_butuh"><span class="fa fa-bar-chart"></span> Grafik Jumlah Mapel Diklat yang Dibutuhkan Guru</a></li>
                               </ul>
                             </li>
                           </ul>
                        </div><!-- /.navbar-collapse -->
                      @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                      {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> Kelola Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="/register">Tambah</a></li>
                          <li><a href="#">Edit</a></li>
                        </ul>
                      </li> --}}
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-user"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


    </div>
      @yield('content')
    @yield('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script> --}}
    <script type="text/javascript">
      $(function() {
        $( "#tanggal_lahir" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: "yy/mm/dd"
        });
      });
      </script>
      <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright © 2017 Rusfansyah - P4TK Seni dan Budaya Yogyakarta</p>
      </div>
    </footer>

</body>
</html>
