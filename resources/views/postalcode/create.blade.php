
@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h2>Añadir Codigo Postal</h2>
        <br>
        <form action="{{url('/postalcode')}}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="codigo">Codigo</label>
                    <input class="form-control" type="text" name="codigo" id="codigo" required value="" pattern="[Aa-Zz]">
                </div>
                <div class="form-group">
                    <label class="control-label" for="lugar">Lugar</label>
                    <input class="form-control" type="text" name="lugar" id="lugar" required pattern="[Aa-Zz]" value="">
                </div>
                
                <a class="btn btn-danger" role="button" href="./">Cancel</a>
                <input class="btn btn-success" type="submit" value="Add"> 
        </form>
    </div>
@endsection