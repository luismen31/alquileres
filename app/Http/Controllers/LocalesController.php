<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LocalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('locales.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $Locales = new \App\Local;
        $Locales->no_identificacion = $request->input('no_identificacion');
        $Locales->ubicacion = $request->input('ubicacion');
        $Locales->tamaño = $request->input('tamaño');
        $Locales->baños = $request->input('baños');
        $Locales->aire = $request->input('aire');
        $Locales->precio_alquiler = $request->input('precio_alquiler');
        $Locales->id_empresa = $request->input('id_empresa');
        $Locales->save();

        return redirect()->route('locales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Locales = \App\Local::find($id);

        return view('locales.edit')->with('datos', $Locales);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $Locales = \App\Local::find($id);        
        $Locales->no_identificacion = $request->input('no_identificacion');
        $Locales->tamaño = $request->input('tamaño');
        $Locales->baños = $request->input('baños');
        $Locales->aire = $request->input('aire');
        $Locales->ubicacion = $request->input('ubicacion');
        $Locales->precio_alquiler = $request->input('precio_alquiler');
        $Locales->id_empresa = $request->input('id_empresa');
        $Locales->save();

        return redirect()->route('locales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
