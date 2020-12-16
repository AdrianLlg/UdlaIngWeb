
@extends('layouts.app')

@section('content')
    
    <div class="container">
        <br>
        <h2>Añadir Rol</h2>
        <br>
        <form action="{{url('/roles')}}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="name">Nombre Rol</label>
                    <input class="form-control" type="text" name="name" id="name" required value="" pattern="[Aa-Zz]">
                </div>
                <div class="form-group">
                    <label class="control-label" for="description">Descripcion</label>
                    <input class="form-control" type="text" name="description" id="description" required pattern="[Aa-Zz]" value="">
                </div>
                
                <a class="btn btn-danger" role="button" href="./">Cancel</a>
                <input class="btn btn-success" type="submit" value="Add"> 
        </form>
    </div>
@endsection