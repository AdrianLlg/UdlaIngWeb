@extends('layouts.app')

@section('content')

    <div class="container"> 
        <br>
            <h2>Editar Usuario</h2>
            <br>
            <form id="formulario" action="{{url('/users/'.$user->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="control-label" for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" required value="{{$user->name}}" pattern="[Aa-Zz]">
                </div>
                <div class="form-group">
                    <label class="control-label" for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" required pattern="[Aa-Zz]" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required pattern="[Aa-Zz]" value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="role_id">Rol</label>
                        <select name="role_id" class="form-control" required>
                            <option value=""> -- Seleccionar un Rol --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->description }}
                                </option>
                            @endforeach
                        </select>
                </div>
                    <a href="{{route('users.index')}}" class="btn btn-danger" role="button">Cancel</a>
                    <input class="btn btn-success" type="submit" value="Edit">
             </form>
    </div>
@endsection
