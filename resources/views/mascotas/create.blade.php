
@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h2>Añadir nueva mascota</h2>
        <br>
        <form action="{{url('/mascotas')}}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required value="" pattern="[Aa-Zz]">
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
                    <input class="form-control" type="text" name="tipo" id="tipo" required pattern="[Aa-Zz]" value="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="edad">Edad en Meses</label>
                    <input class="form-control" type="number" name="edad" id="edad" required pattern="[0-9]{3}" value="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="peso">Peso(kg)</label>
                    <input class="form-control" type="decimal" name="peso" id="peso" required pattern="[0-9]{1,3}+([,\.][0-9]{1,2}+)?" value="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="descripcion">Descripcion</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" required pattern="[Aa-Zz]{45}" value="">
                </div>
                <a class="btn btn-danger" role="button" href="./">Cancel</a>
                <input class="btn btn-success"  id="botonsubmit" disabled="disabled" type="submit" value="Add"> 
        </form>
    </div>
@endsection
@section('script')
    <script>
            function check()
                {            
                var ele = document.getElementsByName('genero');
                var ele2 = document.getElementsByName('clasificacion_especie');
                var flag=0;
                var flag2 = 0;
                for(var i=0;i<ele.length;i++)
                {
                    if(ele[i].checked)
                    flag = 1;
                } 
                for(var i=0;i<ele2.length;i++)
                {
                    if(ele2[i].checked)
                    flag2 = 1;
                } 

                if(flag == 1 && flag2 == 1)
                document.getElementById('botonsubmit').disabled=false;
                }


    </script>
@endsection