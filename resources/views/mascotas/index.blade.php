{{-- @include('layouts.partials.head') --}}

@extends('layouts.app')

@section('content')
    
    @if (session()->has('Msg')) 
    <br>
    <div id="alert" class="col-3 col-sm-3 alert alert-style" role="alert">
        {{   session()->get('Msg')  }}    
        </div>

        <script>
            $('#alert').fadeIn();     
          setTimeout(function() {
               $("#alert").fadeOut();           
          },4000);
        </script>
    @endif

<div class="tableinfo">        
    <div class="row row-content">
        <div class="col-12 col-sm-12">
            <h2>Mascotas Registradas</h2>
            <br>
            <div class="table-responsive">
                <table id="table-align" class="table table-striped" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Clasificacion/Especie</th>
                                <th>Genero</th>
                                <th>Tipo/Raza</th>
                                <th>Edad</th>
                                <th>Peso</th>
                                <th>Descripcion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mascotas as $mascota)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$mascota->nombre}}</td>
                                    <td>{{$mascota->clasificacion_especie}}</td>
                                    <td>{{$mascota->genero}}</td>
                                    <td>{{$mascota->tipo}}</td>
                                    <td>{{$mascota->edad}}</td>
                                    <td>{{$mascota->peso}}</td>
                                    <td>{{$mascota->descripcion}}</td>
                                    <td>
                                            <button class="btn btn-primary btnActions" onclick="location.href='{{url('/mascotas/'.$mascota->id_mascota.'/edit')}}';">Edit</button>
                                            <form action="{{url('/mascotas/'.$mascota->id_mascota)}}" method="post">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btnActions" type="submit" onclick="return confirm('Esta seguro de Borrar?');">Delete</button>
                                            </form>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                </table>
                {{$mascotas->links()}}
            </div>
        </div>
        <p>
            <a class="btn btn-success" href="./mascotas/create">Add New Entry</a>
        </p>
    </div>
</div>
@endsection