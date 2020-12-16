<?php

namespace App\Http\Controllers;

use App\PostalCode;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['postalcodes']=PostalCode::paginate(10);
        return view('postalcode.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postalcode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCPostal=request()->except('_token');
        PostalCode::insert($datosCPostal);

        return redirect('postalcode')->with('Msg', 'Codigo Postal agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function show(PostalCode $postalCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pcode = PostalCode::findOrFail($id);
        return view('postalcode.edit', compact('pcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCPostal=request()->except(['_token','_method']);
        PostalCode::where('id_codigopostal', '=', $id)->update($datosCPostal);
        return redirect('postalcode')->with('Msg', 'Codigo Postal editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostalCode  $postalCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostalCode::destroy($id);

        return redirect('postalcode')->with('Msg', 'Codigo Postal eliminado');
    }
}
