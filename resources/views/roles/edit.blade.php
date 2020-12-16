@extends('layouts.app')

@section('content')

    <div class="container"> 
        <br>
            <h2>Editar Usuario</h2>
            <br>
            <form action="{{url('/roles/'.$rol->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="control-label" for="name">Nombre Rol</label>
                    <input class="form-control" type="text" name="name" id="name" required value="{{$rol->name}}" pattern="[Aa-Zz]">
                </div>
                <div class="form-group">
                    <label class="control-label" for="description">Descripcion</label>
                    <input class="form-control" type="text" name="description" id="description" required pattern="[Aa-Zz]" value="{{$rol->description}}">
                </div>
                    <a href="{{route('roles.index')}}" class="btn btn-danger" role="button">Cancel</a>
                    <input class="btn btn-success" type="submit" value="Edit">
             </form>
    </div>
@endsection
