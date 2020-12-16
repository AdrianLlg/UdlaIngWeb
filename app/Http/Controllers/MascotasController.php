<?php

namespace App\Http\Controllers;

use App\Mascotas;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['mascotas']=Mascotas::paginate(10);
        return view('mascotas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $camposValidar = [
        //     'Nombres' => 'required|string|max:60',
        //     'Apellidos' => 'required|string|max:60',
        //     'Cedula' => 'required|string|max:10',
        //     'Edad' => 'required|int',
        //     'Direccion' => 'required|string|max:80'
        //  ];

        //  $mssg = ['required'=>'Ingrese los datos correctamente'];

        //  $this->validate($request, $camposValidar, $mssg);

        $datosMasc=request()->except('_token');
        Mascotas::insert($datosMasc);
        return redirect('mascotas')->with('Msg', 'Mascota agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascotas::findOrFail($id);
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $camposValidar = [
        //     'Nombres' => 'required|string|max:60',
        //     'Apellidos' => 'required|string|max:60',
        //     'Cedula' => 'required|string|max:10',
        //     'Edad' => 'required|int',
        //     'Direccion' => 'required|string|max:80'
        //  ];

        //  $mssg = ['required'=>'Ingrese los datos correctamente'];

        //  $this->validate($request, $camposValidar, $mssg);

        $datosMasc=request()->except(['_token','_method']);
        Mascotas::where('id_mascota', '=', $id)->update($datosMasc);
        return redirect('mascotas')->with('Msg', 'Mascota editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mascotas::destroy($id);
        
        return redirect('mascotas')->with('Msg', 'Mascota eliminada con exito');
    }
}
