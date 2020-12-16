<?php

namespace App\Http\Controllers;

use App\Adopciones;
use App\Clientes;
use App\Mascotas;
use Illuminate\Http\Request;

class AdopcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['adopciones']=Adopciones::paginate(10);
        $clientes = Clientes::all();
        $mascotas = Mascotas::all();
        return view('adopciones.index', $datos)->with('clientes', $clientes)->with('mascotas', $mascotas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        $mascotas = Mascotas::all();
        $adopciones = Adopciones::all();
        return view('adopciones.create')->with('clientes', $clientes)->with('mascotas', $mascotas)->with('adopciones', $adopciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosAdop=request()->except('_token');
        Adopciones::insert($datosAdop);
        $mascP = $request->id_mascota;
        $estadoAdop = $request->estadoadopcion;
        Mascotas::where('id_mascota', '=', $mascP)->update(array('estado' => $estadoAdop));
        return redirect('adopciones')->with('Msg', 'Adopcion en transcurso...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adopciones  $adopciones
     * @return \Illuminate\Http\Response
     */
    public function show(Adopciones $adopciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adopciones  $adopciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adopcion = Adopciones::findOrFail($id);
        $clientes = Clientes::all();
        $mascotas = Mascotas::all();
        return view('adopciones.edit', compact('adopcion'))->with('clientes', $clientes)->with('mascotas', $mascotas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adopciones  $adopciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAdop=request()->except(['_token','_method']);
        Adopciones::where('id_adopciones', '=', $id)->update($datosAdop);

        $mascP = $request->id_mascota;
        $estadoAdop = $request->estadoadopcion;
        Mascotas::where('id_mascota', '=', $mascP)->update(array('estado' => $estadoAdop));
        
        return redirect('adopciones')->with('Msg', 'Adopcion editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adopciones  $adopciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adop = Adopciones::findOrFail($id);
        
        $mascID = $adop->id_mascota;
        $estado = 'noAdoptado';
        Mascotas::where('id_mascota', '=', $mascID)->update(array('estado' => $estado));
        
        Adopciones::destroy($id);
        return redirect('adopciones')->with('Msg', 'Adopcion eliminada con exito');
    }
}
