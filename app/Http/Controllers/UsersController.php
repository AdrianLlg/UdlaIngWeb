<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['users']=User::paginate(10);
        return view('users.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create')->with('roles', $roles);
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

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Se encripta la contraseña usando la función bcrypt().
        $user->role_id = $request->role_id;

        $user->save();

        $cliente = new Clientes;
        $cliente->id_user = $user->id;
        $cliente->save();

        $user = request()->except('_token');

        return redirect('users')->with('Msg', 'Usuario agregado con exito');
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
        $roles = Role::all();
        $user= User::findOrFail($id);
        return view('users.edit', compact('user'))->with('roles', $roles);
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
        $datosUser=request()->except(['_token','_method']);
        User::where('id', '=', $id)->update($datosUser);
        return redirect('users')->with('Msg', 'Usuario editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users')->with('Msg', 'User eliminado con exito');
    }
}
