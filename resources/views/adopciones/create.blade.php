
@extends('layouts.app')

@section('content')
    
    <div class="container">
        <br>
        <h2>Añadir Adopcion</h2>
        <br>

        <label class="control-label">Tipo de mascota</label>
                        <br>
                        <input type="radio" id="perro" name="mascota" value="" onclick="FuncDog()">
                        <label for="mascota">Perro</label><br>
                        <input type="radio" id="gato" name="mascota" value="" onclick="FuncCat()">
                        <label for="mascota">Gato</label><br>
                        <input type="radio" id="loro" name="mascota" value="" onclick="FuncLoro()">
                        <label for="mascota">Loro</label>

        <form action="{{url('/adopciones')}}" method="post" enctype="multipart/form-data" onsubmit="return valida(this)">
            {{csrf_field() }}
            
            <div id="radio1" class="form-group" style="display: none">
                <label class="control-label" for="radioPr">Perros</label>
                    <select id="radioPr" name="id_mascota" class="form-control">
                        <option value=""> -- Seleccionar Perro --</option>
                        @foreach($mascotas as $mascota)
                            @if ($mascota->clasificacion_especie == 'Perro' && $mascota->estado == 'noAdoptado')
                                <option value="{{ $mascota->id_mascota}}">
                                    {{ $mascota->nombre }}, {{ $mascota->tipo }}, {{ $mascota->genero }}, {{ $mascota->edad }} {{'meses'}}
                                </option>
                            @endif
                        @endforeach
                    </select>
            </div>

            <div id="radio2" class="form-group" style="display: none">
                <label class="control-label" for="radioGat">Gatos</label>
                    <select id="radioGat" name="id_mascota" class="form-control">
                        <option value=""> -- Seleccionar Gato --</option>
                        @foreach($mascotas as $mascota)
                            @if ($mascota->clasificacion_especie == 'Gato' && $mascota->estado == 'noAdoptado')
                                <option value="{{ $mascota->id_mascota}}">
                                    {{ $mascota->nombre }}, {{ $mascota->tipo }}, {{ $mascota->genero }}, {{ $mascota->edad }} {{'meses'}}
                                </option>
                            @endif
                        @endforeach
                    </select>
            </div>
            <div id="radio3" class="form-group" style="display: none">
                <label class="control-label" for="radioLor">Loros</label>
                    <select id="radioLor" name="id_mascota" class="form-control">
                        <option value=""> -- Seleccionar Loro --</option>
                        @foreach($mascotas as $mascota)
                            @if ($mascota->clasificacion_especie == 'Loro' && $mascota->estado == 'noAdoptado')
                                <option value="{{ $mascota->id_mascota}}">
                                    {{ $mascota->nombre }}, {{ $mascota->tipo }}, {{ $mascota->genero }}, {{ $mascota->edad }} {{'meses'}}
                                </option>
                            @endif
                        @endforeach
                    </select>
            </div>
                <div class="form-group">
                    <label class="control-label" for="id_cliente">Cliente</label>
                        <select name="id_cliente" class="form-control" required>
                            <option value=""> -- Seleccionar un Cliente --</option>
                            @foreach($clientes as $cliente)
                                @if ($cliente->nombres != null || $cliente->apellidos != null || $cliente->cedula != null
                                || $cliente->telefono != null || $cliente->id_postalcode != null)
                                    <option value="{{ $cliente->id_cliente}}">
                                        {{ $cliente->nombres }} {{$cliente->apellidos}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="fecha_adop">Fecha de Adopcion</label>
                    <input class="form-control" type="date" name="fecha_adop" id="fecha_adop" required value="">
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
                
                <a class="btn btn-danger" role="button" href="./">Cancel</a>
                <input class="btn btn-success" id="botonsubmit" disabled="disabled" type="submit" value="Add"> 
        </form>
    </div>
@endsection
@section('script')
    <script>
            function FuncDog()
                {
                    check();
                    habilitPerro();
                }
            function FuncCat()
            {
                check();
                habilitGato();
            }

            function FuncLoro()
            {
                check();
                habilitLoro();
            }

            function habilitPerro()
                {            
                document.getElementById('radio1').style.display = 'block';
                $("#radio1").find('select').attr("disabled", false);
                document.getElementById('radio2').style.display = 'none';
                $("#radio2").find('select').attr("disabled", true);
                document.getElementById('radio3').style.display = 'none';
                $("#radio3").find('select').attr("disabled", true);
                }
            function habilitGato()
                {            
                document.getElementById('radio2').style.display = 'block';
                $("#radio2").find('select').attr("disabled", false);
                document.getElementById('radio1').style.display = 'none';
                $("#radio1").find('select').attr("disabled", true);
                document.getElementById('radio3').style.display = 'none';
                $("#radio3").find('select').attr("disabled", true);
                }
            function habilitLoro()
                {            
                document.getElementById('radio3').style.display = 'block';
                $("#radio3").find('select').attr("disabled", false);
                document.getElementById('radio2').style.display = 'none';
                $("#radio2").find('select').attr("disabled", true);
                document.getElementById('radio1').style.display = 'none';
                $("#radio1").find('select').attr("disabled", true);
                }

            // function valida(f){

            //     var ok = true;
            //     var fechaAct = new Date();
            //     var dd = fechaAct.getDate();
            //     var mm = fechaAct.getMonth();
            //     var yyyy = fechaAct.getFullYear();

            //         if(dd < 10){
            //             dd = '0' + dd;
            //         }

            //         if(mm < 10){
            //             mm = '0' + mm;
            //         }

            //             fechaAct = yyyy + '-' + mm + '-' + dd;
            
            //     if(f.fecha_adop.value > fechaAct ){
            //         ok = false;
            //     }

            //     if(f.fecha_adop.value < fechaAct ){
            //         ok = true;
            //     }

            //     if(ok == false)
            //         alert("Ingresa una fecha valida");
                
            //     return ok;
                
            // }             
            function check()
                {            
                var ele = document.getElementsByName('mascota');
                var ele2 = document.getElementsByName('estadoadopcion');
                var flag=0;
                var flag2=0;

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