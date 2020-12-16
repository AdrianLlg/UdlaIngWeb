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
            <h2>Usuarios Registrados</h2>
            <p>
                <a class="btn customAddBtn btn-success" href="./users/create">Add New Entry</a>
            </p>
            <div class="table-responsive">             
                
                <table id="table-align" class="table table-striped" border="1">

                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nickname</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(', ', $user->role()->get()->pluck('name')->toArray()) }}</td>
                                        {{-- @if($user->role_id == '1'){
                                                <td>Administrador</td>
                                            }
                                        @else{
                                            <td>Usuario</td>
                                        }
                                        @endif --}}
                                    <td>
                                            <button class="btn btn-primary btnActions" onclick="location.href='{{url('/users/'.$user->id.'/edit')}}';">Edit</button>
                                            <form action="{{url('/users/'.$user->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btnActions" type="submit" onclick="return confirm('Esta seguro de Borrar?');">Delete</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <button class="btn btn-success customAddBtn" onclick="location.href='{{url('/users/'.$user->id.'/create')}}';">Add</button> --}}
                        </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection