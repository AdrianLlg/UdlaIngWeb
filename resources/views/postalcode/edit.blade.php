@extends('layouts.app')

@section('content')

    <div class="container"> 
            <h2>Editar Codigo postal</h2>
            <br>
            <form id="formulario" action="{{url('/postalcode/'.$pcode->id_codigopostal)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="control-label" for="codigo">Codigo</label>
                    <input class="form-control" type="number" name="codigo" id="codigo" required pattern="[0-9]" value="{{$pcode->codigo}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="lugar">Lugar</label>
                    <input class="form-control" type="text" name="lugar" id="lugar" required pattern="[Aa-Zz]" value="{{$pcode->lugar}}">
                </div>
                    <a href="{{route('postalcode.index')}}" class="btn btn-danger" role="button">Cancel</a>
                    <input class="btn btn-success" type="submit" value="Edit">
             </form>
    </div>
@endsection

{{-- @section('script')
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
@endsection --}}