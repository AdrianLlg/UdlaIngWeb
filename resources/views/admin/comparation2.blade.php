@extends('layouts.app2')

@section('content')

<body>
    <div class="wrapper ">
      <div class="sidebar" data-color="green">
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
            <li>
                <a href="../dashboard">
                  <i class="now-ui-icons design_app"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li>
                <a href="{{url('/users')}}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            <li>
              <a href="{{url('/adopciones')}}">
                <i class="now-ui-icons education_atom"></i>
                <p>Adopciones</p>
              </a>
            </li>
            <li>
              <a href="{{url('/postalcode')}}">
                <i class="now-ui-icons location_map-big"></i>
                <p>Codigos Postales</p>
              </a>
            </li>
            <li>
              <a href="{{url('/mascotas')}}">
                <i class="now-ui-icons ui-1_bell-53"></i>
                <p>Mascotas</p>
              </a>
            </li>
            <li>
              <a href="{{url('/clientes')}}">
                <i class="now-ui-icons users_single-02"></i>
                <p>Clientes</p>
              </a>
            </li>
            <li>
              <a href="{{url('/roles')}}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="active">
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

            <form class="form-inline">
                <select name="tipo" class="form-control mr-sm-2" id="buscarpor">
                    <option value=""> -- Selecciona una Opcion --</option>
                    <option value="compararZonas">Reporte por zonas</option>
                    <option value="compararTipo">Reporte Tipo de Mascota</option>
                    <option value="compararZonasTipo">Reporte por Zona y Mascota</option>
    
                </select>
                {{-- <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por" aria-label="Search"> --}}
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

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
      <div class="panel-header panel-header-sm">
      <h2>Statistics</h2>
      </div>
      <div class="content content-custom">
        <div class="row">
          <div class="col-md-12">
              @if($flag == 1)
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Adopciones por Sectores</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-comparation">
                        <thead class="text-primary">
                          <th>Sectores</th>
                          <th>Mascotas Adoptadas</th>
                          <th>Mascotas No Adoptadas</th>
                          <th>Mascotas En Espera</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Norte</td>    
                              <td>{{$datos['A_norte']}}</td>
                              <td>{{$datos['No_norte']}}</td>
                              <td>{{$datos['E_norte']}}</td>
                          </tr>
                          <tr>
                            <td>Centro</td>
                              <td>{{$datos['A_centro']}}</td>
                              <td>{{$datos['No_centro']}}</td>
                              <td>{{$datos['E_centro']}}</td>
                          </tr>
                          <tr>
                            <td>Sur</td>
                              <td>{{$datos['A_sur']}}</td>
                              <td>{{$datos['No_sur']}}</td>
                              <td>{{$datos['E_sur']}}</td>
                          </tr>
                          <tr>
                            <td>Valles</td>
                              <td>{{$datos['A_valles']}}</td>
                              <td>{{$datos['No_valles']}}</td>
                              <td>{{$datos['E_valles']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                      <h6>Detalles: </h6>
                      @if($datos['A_norte'] > $datos['A_centro'] && $datos['A_norte'] > $datos['A_sur'] && $datos['A_norte'] > $datos['A_valles'])
                          <p>Sector con mas adopciones: {{$datos['varTop'] = 'Norte'}}</p>
                      @endif
                      @if($datos['A_centro'] > $datos['A_norte'] && $datos['A_centro'] > $datos['A_sur'] && $datos['A_centro'] > $datos['A_valles'])
                          <p>Sector con mas adopciones: {{$datos['varTop'] = 'Centro'}}</p>
                      @endif
                      @if($datos['A_sur'] > $datos['A_norte'] && $datos['A_sur'] > $datos['A_centro'] && $datos['A_sur'] > $datos['A_valles'])
                          <p>Sector con mas adopciones: {{$datos['varTop'] = 'Sur'}}</p>
                      @endif
                      @if($datos['A_valles'] > $datos['A_norte'] && $datos['A_valles'] > $datos['A_sur'] && $datos['A_valles'] > $datos['A_sur'])
                          <p>Sector con mas adopciones: {{$datos['varTop'] = 'Valles'}}</p>
                      @endif

                      {{-- Variable que instancia el selector de zonas y permite desplegar
                          las zonas y sus adopciones >>>>  {{$datos['varTop'] = 'Sur'}} --}}

                    {{-- @php
                      Variable para observar todos los elementos de un array >>>  var_dump($arrayCombine);
                    @endphp --}}

                      @if($datos['varTop'] == 'Sur')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>Zona</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombineS as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif
                      @if($datos['varTop'] == 'Centro')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>Zona</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombineC as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif
                      @if($datos['varTop'] == 'Norte')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>Zona</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombineN as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif
                      @if($datos['varTop'] == 'Valles')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>Zona</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombineV as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif

                  </div>
                </div>
              @endif

              {{-- Segundo Reporte --}}
              @if($flag == 2)
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Adopciones por Tipo de Mascota</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-comparation">
                        <thead class="text-primary">
                          <th>Tipo Mascota</th>
                          <th>Adoptados</th>
                          <th>No Adoptados</th>
                          <th>En Espera</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Perros</td>    
                              <td>{{$datos2['A_Perro']}}</td>
                              <td>{{$datos2['No_Perro']}}</td>
                              <td>{{$datos2['E_Perro']}}</td>
                          </tr>
                          <tr>
                            <td>Gatos</td>
                              <td>{{$datos2['A_Gato']}}</td>
                              <td>{{$datos2['No_Gato']}}</td>
                              <td>{{$datos2['E_Gato']}}</td>
                          </tr>
                          <tr>
                            <td>Loros</td>
                              <td>{{$datos2['A_Loro']}}</td>
                              <td>{{$datos2['No_Loro']}}</td>
                              <td>{{$datos2['E_Loro']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                      <h6>Detalles: </h6>
                      @if($datos2['A_Perro'] > $datos2['A_Gato'] && $datos2['A_Perro'] > $datos2['A_Loro'])
                          <p>Tipo de mascota con mas adopciones: {{$datos['varTop2'] = 'Perros'}}</p>
                      @endif
                      @if($datos2['A_Gato'] > $datos2['A_Perro'] && $datos2['A_Gato'] > $datos2['A_Loro'])
                          <p>Tipo de mascota con mas adopciones: {{$datos['varTop2'] = 'Gatos'}}</p>
                      @endif
                      @if($datos2['A_Loro'] > $datos2['A_Perro'] && $datos2['A_Loro'] > $datos2['A_Gato'])
                          <p>Tipo de mascota con mas adopciones: {{$datos['varTop2'] = 'Loros'}}</p>
                      @endif              



                    @if($datos['varTop2'] == 'Perros')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>{{$datos['varTop2']}}</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombinePer as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif
                      @if($datos['varTop2'] == 'Gatos')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>{{$datos['varTop2']}}</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombineGa as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif
                      @if($datos['varTop2'] == 'Loros')
                        <div class="table-responsive">
                          <table class="table table-comparation">
                            <thead class="text-primary">
                              <th>{{$datos['varTop2']}}</th>
                              <th># de Adopciones</th>
                            </thead>
                            <tbody>
                                @foreach ($arrayCombineLo as $key => $value) 
                                    <tr>
                                        <td>{{$key}} </td> 
                                        <td>{{$value}}</td>
                                    </tr> 
                              @endforeach
                          </tbody>
                          </table>
                        </div>
                      @endif
                    </div>
                </div>
              @endif
            {{-- Reporte 3 --}}

              @if($flag == 3)
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Adopciones por Mascotas y Sectores</h4>
                  <p>Adicional: La informacion proporcionada es solo de ADOPCIONES (No contabilizaque e si aun no se ha adoptado una mascota)</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-comparation">
                      <thead class="text-primary">
                        <th>Tipo Mascota</th>
                        <th>Norte</th>
                        <th>Centro</th>
                        <th>Sur</th>
                        <th>Valles</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Perros</td>    
                            <td>{{$datos3['Adop_Pe_Norte']}}</td>
                            <td>{{$datos3['Adop_Pe_Centr']}}</td>
                            <td>{{$datos3['Adop_Pe_Sur']}}</td>
                            <td>{{$datos3['Adop_Pe_Vall']}}</td>
                        </tr>
                        <tr>
                          <td>Gatos</td>
                            <td>{{$datos3['Adop_Ga_Norte']}}</td>
                            <td>{{$datos3['Adop_Ga_Centr']}}</td>
                            <td>{{$datos3['Adop_Ga_Sur']}}</td>
                            <td>{{$datos3['Adop_Ga_Vall']}}</td>
                        </tr>
                        <tr>
                          <td>Loros</td>
                            <td>{{$datos3['Adop_Lo_Norte']}}</td>
                            <td>{{$datos3['Adop_Lo_Centr']}}</td>
                            <td>{{$datos3['Adop_Lo_Sur']}}</td>
                            <td>{{$datos3['Adop_Lo_Vall']}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                    
                  </div>
              </div>
            @endif

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
        demo.initDashboardPageCharts();
  
      });
    </script>
  @endsection