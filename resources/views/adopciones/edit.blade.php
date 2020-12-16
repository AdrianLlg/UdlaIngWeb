@extends('layouts.app')

@section('content')

    <div class="container"> 
        <br>
            <h2>Editar Adopcion</h2>
            <br>
            <form id="formulario" action="{{url('/adopciones/'.$adopcion->id_adopciones)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="control-label" for="id_mascota">Mascota</label>
                        <select name="id_mascota" class="form-control" disabled>
                            @foreach ($mascotas as $mascota) 
                                @if( $adopcion->id_adopciones == $mascota->id_mascota)
                                    <option value="{{$mascota->id_mascota}}">  {{$mascota->nombre}}, {{$mascota->clasificacion_especie}}, {{$mascota->tipo}}</option>
                                @endif
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="id_cliente">Cliente</label>
                        <select name="id_cliente" class="form-control" disabled>
                            @foreach ($clientes as $cliente) 
                                @if( $adopcion->id_cliente == $cliente->id_cliente)
                                    <option value="{{$cliente->id_cliente}}"> {{$cliente->nombres}} {{$cliente->apellidos}}</option>
                                @endif
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="fecha_adop">Fecha de Adopcion</label>
                <input class="form-control" type="date" name="fecha_adop" id="fecha_adop" required value="{{$adopcion->fecha_adop}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="estadoadopcion">Estado de Adopcion</label>
                        <br>
                        <input type="radio" id="adoptado" name="estadoadopcion" value="adoptado" onclick="check()">
                        <label for="estadoadopcion">Adoptado</label><br>
                        <input type="radio" id="espera" name="estadoadopcion" value="enEspera" onclick="check()">
                        <label for="estadoadopcion">En Espera</label><br>
                        <input type="radio" id="noAdoptado" name="estadoadopcion" value="noAdoptado" onclick="check()">
                        <label for="estadoadopcion">No Adoptado</label><br>
                </div>

                    <a href="{{route('adopciones.index')}}" class="btn btn-danger" role="button">Cancel</a>
                    <input class="btn btn-success" id="botonsubmit" disabled="disabled" type="submit" value="Edit">
             </form>
    </div>
@endsection
@section('script')
    <script>
            function check()
                {            
                var ele = document.getElementsByName('estadoadopcion');
                var flag=0;

                for(var i=0;i<ele.length;i++)
                {
                    if(ele[i].checked)
                    flag = 1;
                } 
                if(flag == 1)
                document.getElementById('botonsubmit').disabled=false;
                }


    </script>
@endsection
