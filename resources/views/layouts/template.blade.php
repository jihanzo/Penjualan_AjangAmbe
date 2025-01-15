<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset(path: 'plugins/fontawesome-free/css/all.min.css') }}">
    @yield('tambahanCSS')
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset(path: 'dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user mr-2"></i>{{ Auth::user()->nama }}
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">User Menu</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> {{ Auth::user()->nama }}
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                
                <span class="brand-text font-weight-light"><b>Ajang Ambe</b></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-2 mb-0 d-flex">
                    <div class="image">
                    <a href="#" class="d-white">
                    <i class="nav-icon fas fa-user"></i></a>
                    </div>
                    <div class="info">
                        <a href="#" class="d-white">{{ Auth::user()->nama }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ ($title === 'Dashboard') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{($title === 'Users') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('penitipan.index')}}"
                                class="nav-link {{ ($title === 'Penitipan') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Penitipan
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}"
                                class="nav-link {{ ($title === 'Produk') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-folder"></i>                                
                                <p>
                                    Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ route('hutang.index') }}"
                                class="nav-link {{ ($title === 'Hutang') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-bookmark"></i>
                                <p>
                                    Hutang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="penjualan" target="_blank" class="nav-link {{ ($title === 'Penjualan') ? 'active' : ''}}"> 
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Penjualan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route(name: 'laporan.index')}}"
                                class="nav-link {{ ($title === 'Laporan') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>

                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">@yield('judulh1')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('konten')
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    @yield('tambahanJS')
    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
    @yield('tambahScript')


</body>

</html>