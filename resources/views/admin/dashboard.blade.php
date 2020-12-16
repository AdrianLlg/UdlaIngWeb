{{-- <head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>
 --}}
@extends('layouts.app2')

@section('content')

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-mini">
          AL |
        </a>
        <a class="simple-text logo-normal">
          Laravel Project
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="../dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="../users">
              <i class="now-ui-icons users_single-02"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li>
            <a href="../adopciones">
              <i class="now-ui-icons education_atom"></i>
              <p>Adopciones</p>
            </a>
          </li>
          <li>
            <a href="../postalcode">
              <i class="now-ui-icons location_map-big"></i>
              <p>Codigos Postales</p>
            </a>
          </li>
          <li>
            <a href="../mascotas">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Mascotas</p>
            </a>
          </li>
          <li>
            <a href="../clientes">
              <i class="now-ui-icons users_single-02"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li>
            <a href="../roles">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Roles</p>
            </a>
          </li>
          <li>
            <a href="{{url('/admin/dashboard/comparation2')}}">
              <i class="now-ui-icons education_atom"></i>
              <p>Reportes</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <a class="navbar-brand">Admin Panel</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="now-ui-icons users_single-02"></i>{{ Auth::user()->name }}
          </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="panel-header panel-header-lg custom-bground">
  
</div>
<div class="panel-header panel-header-lg content">
  <div class="row">
    <div class="col-lg-4">
      <div class="card card-chart card-custom">
        <div class="card-header">
          <h5 class="card-category">Users</h5>
          <h4 class="card-title">Users Panel</h4>
          <div class="dropdown">
            <button onclick="location.href='{{url('/./users/')}}';" type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Agregar / Visualizar / Modificar / Eliminar usuarios
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-chart card-custom">
        <div class="card-header">
          <h5 class="card-category">Clientes</h5>
          <h4 class="card-title">Customer Panel</h4>
          <div class="dropdown">
            <button onclick="location.href='{{url('/./clientes/')}}';" type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Agregar / Visualizar / Modificar / Eliminar clientes
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-chart card-custom">
        <div class="card-header">
          <h5 class="card-category">Roles</h5>
          <h4 class="card-title">Role Panel</h4>
          <div class="dropdown">
            <button onclick="location.href='{{url('/./roles/')}}';" type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Agregar / Visualizar / Modificar / Eliminar Roles disponibles
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart card-custom">
        <div class="card-header">
          <h5 class="card-category">Mascotas</h5>
          <h4 class="card-title">Pet Panel</h4>
          <div class="dropdown">
            <button onclick="location.href='{{url('/./mascotas/')}}';" type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Agregar / Visualizar / Modificar / Eliminar Mascotas
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-chart card-custom">
        <div class="card-header">
          <h5 class="card-category">Adopciones</h5>
          <h4 class="card-title">Adoptions Panel</h4>
          <div class="dropdown">
            <button onclick="location.href='{{url('/./adopciones/')}}';" type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Agregar / Visualizar / Modificar / Eliminar Adopciones
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-chart card-custom">
        <div class="card-header">
          <h5 class="card-category">Codigos Postales</h5>
          <h4 class="card-title">Postal Codes Panel</h4>
          <div class="dropdown">
            <button onclick="location.href='{{url('/./postalcode/')}}';" type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Agregar / Visualizar / Modificar / Eliminar Codigos Postales
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
@endsection
@section('script')
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endsection