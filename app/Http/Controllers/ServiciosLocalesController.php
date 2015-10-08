<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiciosLocalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('servicioslocales/create');
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
        $v = \Validator::make(['servicios' => $request->input('servicios')], ['servicios' => 'required']);
        if($v->fails()){
            return back()->withInput()->withErrors($v);
        }
        foreach($request->input('servicios') as $id => $servicio){
            $ServicioLocal = new \App\ServicioLocal;
            $ServicioLocal->id_local = $request->input('id_local');
            $ServicioLocal->id_servicio = $id;
            $ServicioLocal->costo = $servicio[0];
            $ServicioLocal->fecha = $request->input('fecha');
            $ServicioLocal->realizado_por = $request->input('realizado_por');
            $ServicioLocal->observaciones = $request->input('observaciones');
            $ServicioLocal->save();
        }
        return redirect()->route('serviciolocal.index');
        
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
        $ServicioLocal = \App\ServicioLocal::find($id);

        return view('servicioslocales.edit')->with('datos', $ServicioLocal);
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
        $ServicioLocal = \App\ServicioLocal::find($id);

        $ServicioLocal->id_local = $request->input('id_local');
        $ServicioLocal->id_servicio = $request->input('id_servicio');
        $ServicioLocal->costo = $request->input('costo');
        $ServicioLocal->fecha = $request->input('fecha');
        $ServicioLocal->realizado_por = $request->input('realizado_por');
        $ServicioLocal->observaciones = $request->input('observaciones');
        $ServicioLocal->save();

        return redirect()->route('serviciolocal.index');
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
