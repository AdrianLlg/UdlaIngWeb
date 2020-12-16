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
            <h2>Roles Registrados</h2>
            <p>
                <a class="btn customAddBtn btn-success" href="./roles/create">Add New Entry</a>
            </p>
            <div class="table-responsive">             
                
                <table id="table-align" class="table table-striped" border="1">

                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre Rol</th>
                                <th>Descripcion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$rol->name}}</td>
                                    <td>{{$rol->description}}</td>
                                    <td>
                                            <button class="btn btn-primary btnActions" onclick="location.href='{{url('/roles/'.$rol->id.'/edit')}}';">Edit</button>
                                            <form action="{{url('/roles/'.$rol->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btnActions" type="submit" onclick="return confirm('Esta seguro de Borrar?');">Delete</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                {{$roles->links()}}
            </div>
        </div>
    </div>
</div>
@endsection