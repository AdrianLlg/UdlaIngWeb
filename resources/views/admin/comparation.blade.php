 {{-- USAR DATA TABLES!! --}}
{{-- 
@extends('layouts.app2')

@section('content') --}}

{{-- @include('layouts.partials.head') --}}

@extends('layouts.app')

@section('content')
    

<div class="tableinfo">        
    <div class="row row-content">
        <div class="col-12 col-sm-12">
            <h2>Admin Panel</h2>
            <nav class="navbar navbar-light float-right">
                <form class="form-inline">
                    <label class="custom-lab">Zona: </label>  
                    <select name="tipo" class="form-control mr-sm-2 select-custom" id="filtrar">  
                        @foreach($arrayFiltr as $array1)    
                            <option value="{{$array1}}">{{$array1}}</option>
                        @endforeach
                    </select>
                    <label class="custom-lab">Zona: </label>  
                    <select name="tipo2" class="form-control mr-sm-2 select-custom" id="filtrar2">    
                        @foreach($arrayFiltr as $array1)    
                            <option value="{{$array1}}">{{$array1}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="validar()" type="submit">Buscar</button>
                </form>
            </nav>
                        
        </div>
    </div>
</div>

<div class="row row-content">
        <h2>Statistics</h2>
        <br>
        <div class="col-5 col-sm-5">
            @foreach($array2 as $arr) 
                <input style="width: 100px;" value="{{$arr}}">
             @endforeach
        </div>
        <div class="col-5 col-sm-5">
            @foreach($array3 as $arr2)
             <input style="width: 100px;" value="{{$arr2}}">
            @endforeach
        </div>
 
</div>
@endsection
