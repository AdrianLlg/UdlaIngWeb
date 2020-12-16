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
            <h2>Adopciones Registradas</h2>
            <p>
                <a class="btn customAddBtn btn-success" href="./adopciones/create">Add New Entry</a>
            </p>
            <div class="table-responsive">             
                
                <table id="table-align" class="table table-striped" border="1">

                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nro Adopcion</th>
                                <th>Mascota</th>
                                <th>Cliente</th>
                                <th>Fecha Adopcion</th>
                                <th>Estado</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adopciones as $adopcion)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$adopcion->id_adopciones}}</td>
                                    <td>
                                        @foreach ($mascotas as $mascota) 
                                            @if($adopcion->id_mascota == $mascota->id_mascota)
                                            {{$mascota->nombre}}, {{$mascota->clasificacion_especie}},  {{$mascota->tipo}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($clientes as $cliente) 
                                            @if($adopcion->id_cliente == $cliente->id_cliente)
                                            {{$cliente->nombres}} {{$cliente->apellidos}} 
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$adopcion->fecha_adop}}</td>
                                    <td>
                                        @if($adopcion->estadoadopcion == 'adoptado')
                                            {{'Adoptado'}} 
                                        @endif
                                        @if($adopcion->estadoadopcion == 'enEspera')
                                            {{'En Espera'}} 
                                        @endif
                                        @if($adopcion->estadoadopcion == 'noAdoptado')
                                            {{'No Adoptado'}} 
                                        @endif
                                    </td>
                                    <td>
                                            <button class="btn btn-primary btnActions" onclick="location.href='{{url('/adopciones/'.$adopcion->id_adopciones.'/edit')}}';">Edit</button>
                                            <form action="{{url('/adopciones/'.$adopcion->id_adopciones)}}" method="post">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btnActions" type="submit" onclick="return confirm('Esta seguro de Borrar?');">Delete</button>
                                            </form>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                </table>
                {{$adopciones->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
