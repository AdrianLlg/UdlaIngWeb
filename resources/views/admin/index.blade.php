{{-- @include('layouts.partials.head') --}}

@extends('layouts.app')

@section('content')

<div class="top-content">
    <br>
    <h2>Admin Panel</h2>

    <nav class="navbar navbar-light float-right">
        <a class="btn btn-outline-success my-2 my-sm-0 btn-index-custom" href="{{url('/admin/comparation')}}">Comparation</a>
    </nav>
    <div class="row row-content">
        <div class="col-4 col-sm-4">
            <div class="card mb-3" style="max-width: 20rem;">
                {{-- <div class="card-header">Header</div> --}}
                    <div class="card-body">
                        <h3 class="card-title">Mascotas</h3>
                        <p class="card-text">Para previsualizar / editar la informacion de las mascotas
                            clickear en el boton.</p>
                            <p>
                                <a class="btn btn-success" href="./mascotas">CRUD Mascotas</a>
                            </p>
                    </div>
            </div>
        </div>
        <div class="col-4 col-sm-4">
            <div class="card mb-3" style="max-width: 20rem;">
                {{-- <div class="card-header">Header</div> --}}
                    <div class="card-body">
                        <h3 class="card-title">Codigos Postales</h3>
                        <p class="card-text">Para previsualizar / editar la informacion de los codigos postales
                            clickear en el boton.</p>
                            <p>
                                <a class="btn btn-success" href="./postalcode">CRUD C.Postal</a>
                            </p>

                    </div>
            </div>
        </div>
        <div class="col-4 col-sm-4">
            <div class="card mb-3" style="max-width: 20rem;">
                {{-- <div class="card-header">Header</div> --}}
                    <div class="card-body">
                        <h3 class="card-title">Usuarios</h3>
                        <p class="card-text">Para previsualizar / editar la informacion de los usuarios
                            clickear en el boton.</p>
                            <p>
                                <a class="btn btn-success" href="./users">CRUD Users</a>
                            </p>

                    </div>
            </div>
        </div>
        <div class="col-4 col-sm-4">
            <div class="card mb-3" style="max-width: 20rem;">
                {{-- <div class="card-header">Header</div> --}}
                    <div class="card-body">
                        <h3 class="card-title">Adopciones</h3>
                        <p class="card-text">Para previsualizar / editar la informacion de las 
                            adopciones en el boton.</p>
                            <p>
                                <a class="btn btn-success" href="./adopciones">CRUD Adopciones</a>
                            </p>
                    </div>
            </div>
        </div>
        <div class="col-4 col-sm-4">
            <div class="card mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h3 class="card-title">Clientes</h3>
                        <p class="card-text">Para previsualizar / editar la informacion de los clientes
                            clickear en el boton.</p>
                            <p>
                                <a class="btn btn-success" href="./clientes">CRUD Clientes</a>
                            </p>

                    </div>
            </div>
        </div>
        <div class="col-4 col-sm-4">
            <div class="card mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h3 class="card-title">Roles</h3>
                        <p class="card-text">Para previsualizar / editar la informacion de roles
                            clickear en el boton.</p>
                            <p>
                                <a class="btn btn-success" href="./roles">CRUD Roles</a>
                            </p>
                    </div>
            </div>
        </div>
    </div>
</div>
      
@endsection