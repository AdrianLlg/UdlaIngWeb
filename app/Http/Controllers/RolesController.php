<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['roles']=Role::paginate(10);
        return view('roles.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
        //     'Name' => 'required',
        //     'Email' => 'required',
        //     'Password' => 'required',
        //     'role_id' => 'required',
        //  ];

        //  $mssg = ['required'=>'Ingrese los datos correctamente'];

        //  $this->validate($request, $camposValidar, $mssg);

        $datosRol=request()->except('_token');
        Role::insert($datosRol);

        return redirect('roles')->with('Msg', 'Rol agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosRol=request()->except(['_token','_method']);
        Role::where('id', '=', $id)->update($datosRol);
        return redirect('roles')->with('Msg', 'Rol editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect('roles')->with('Msg', 'Rol eliminado con exito');
    }
}
