<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\PostalCode;
use App\User;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clientes']=Clientes::paginate(10);
        $pcodes = PostalCode::all();
        $users = User::all();
        return view('clientes.index', $datos)->with('users', $users)->with('pcodes', $pcodes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('clientes.edit')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCli=request()->except('_token');
        Clientes::insert($datosCli);
        return redirect('clientes')->with('Msg', 'Usuario agregado con exito');
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
        // $user= User::findOrFail($id);
        // return view('users.edit', compact('user'))->with('roles', $roles);
        $pcodes = PostalCode::all();
        $users = User::all();
        $cliente= Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'))->with('users', $users)->with('pcodes', $pcodes);
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
        $datosCli=request()->except(['_token','_method','id_user']);
        Clientes::where('id_cliente', '=', $id)->update($datosCli);
        return redirect('clientes')->with('Msg', 'Usuario editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);
        return redirect('clientes')->with('Msg', 'User eliminado con exito');
    }
}
