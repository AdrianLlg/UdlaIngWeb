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
            <h2>Codigos Postales</h2>
            <br>
            <div class="table-responsive">
                <table id="table-align" class="table table-striped" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Lugar</th>
                                <th>Sector</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postalcodes as $pcode)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pcode->codigo}}</td>
                                    <td>{{$pcode->lugar}}</td>
                                    <td>{{$pcode->sector}}</td>
                                    <td>
                                            <button class="btn btn-primary btnActions" onclick="location.href='{{url('/postalcode/'.$pcode->id_codigopostal.'/edit')}}';">Edit</button>
                                            <form action="{{url('/postalcode/'.$pcode->id_codigopostal)}}" method="post">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btnActions" type="submit" onclick="return confirm('Esta seguro de Borrar?');">Delete</button>
                                            </form>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                </table>
                <br>
                <p>
                    <a class="btn btn-success" href="./postalcode/create">Add New Entry</a>
                </p>
                <br>
                {{$postalcodes->links()}}
            </div>
        </div>

    </div>
</div>
@endsection