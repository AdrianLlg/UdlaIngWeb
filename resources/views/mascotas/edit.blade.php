@extends('layouts.app')

@section('content')

    <div class="container"> 
            <h2>Edicion de mascota</h2>
            <br>
            <form id="formulario" action="{{url('/mascotas/'.$mascota->id_mascota)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="control-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required pattern="[Aa-Zz]" value="{{$mascota->nombre}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="clasificacion_especie">Clasificacion/Especie</label>   {{-- Validar la seleccion para recuperar el radio button --}}
                        <div class="radiolist">
                            <input type="radio" name="clasificacion_especie" value="Perro" onclick="check()">
                            <label for="Perro">Perro</label><br>
                            <input type="radio" name="clasificacion_especie" value="Gato" onclick="check()">
                            <label for="Gato">Gato</label><br>
                            <input type="radio" name="clasificacion_especie" value="Loro" onclick="check()">
                            <label for="Loro">Loro</label>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="genero">Genero</label>   {{-- Validar la seleccion para recuperar el radio button --}}
                        <div class="radiolist">
                            <input type="radio" class="genero" name="genero" value="Macho" onclick="check()">
                            <label for="macho">Macho</label><br>
                            <input type="radio" class="genero" name="genero" value="Hembra" onclick="check()">
                            <label for="hembra">Hembra</label><br>
                            <input type="radio" class="genero" name="genero" value="Otro" onclick="check()">
                            <label for="otro">Otro</label>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tipo">Tipo/Raza</label>
                    <input class="form-control" type="text" name="tipo" id="tipo" required pattern="[Aa-Zz]" value="{{$mascota->tipo}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="edad">Edad en Meses</label>
                    <input class="form-control" type="number" name="edad" id="edad" required pattern="[0-9]{3}" value="{{$mascota->edad}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="peso">Peso</label>
                    <input class="form-control" type="decimal" name="peso" id="peso" required pattern="[0-9]{1,3}+([,\.][0-9]{1,2}+)?" value="{{$mascota->peso}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="descripcion">Descripcion</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" required pattern="[Aa-Zz]{45}" value="{{$mascota->descripcion}}">
                </div>

                    <a href="{{route('mascotas.index')}}" class="btn btn-danger" role="button">Cancel</a>
                    <input class="btn btn-success" id="botonsubmit" type="submit" value="Edit" disabled="disabled">
             </form>
    </div>
@endsection

@section('script')
    <script>
            function check()
                {            
                var ele = document.getElementsByName('genero');
                var flag=0;
                for(var i=0;i<ele.length;i++)
                {
                    if(ele[i].checked)
                    flag=1;
                } 
                if(flag==1)
                document.getElementById('botonsubmit').disabled=false;
                }
    </script>
@endsection