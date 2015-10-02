<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('servicios.create');
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
        $Servicios = new \App\Servicio;
        $Servicios->servicio = $request->input('servicio');
        $Servicios->detalle = $request->input('detalle');
        $Servicios->costo = $request->input('costo');
        $Servicios->id_empresa = $request->input('id_empresa');
        $Servicios->save();

        return redirect()->route('servicios.index');
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
        $Servicios = \App\Servicio::find($id);

        return view('servicios.edit')->with('datos', $Servicios);
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
        $Servicios = \App\Servicio::find($id);
        $Servicios->servicio = $request->input('servicio');
        $Servicios->detalle = $request->input('detalle');
        $Servicios->costo = $request->input('costo');
        $Servicios->id_empresa = $request->input('id_empresa');
        $Servicios->save();

        return redirect()->route('servicios.index');
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
