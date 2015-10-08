<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       return view('empresas.create');
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
        $image = $request->file('logo_empresa');
        
        $emp = new \App\Empresa;
        $v = $emp->validar($request->all());
        if($v){
            return redirect()->back()->withInput()->withErrors($v);
        }

        //Almacenar Empresas        
        $Empresa = new \App\Empresa;
        $Empresa->nombre_empresa = $request->input('nombre_empresa');
        $Empresa->ruc = $request->input('ruc');
        $Empresa->ubicacion = $request->input('ubicacion');
        $Empresa->detalle = $request->input('detalle');        
        $Empresa->save();
        //Obtiene el ID de la empresa recien ingresada
        $id = $Empresa->id;
        //Almacenar nombre de imagen en BD        
        $imageName = 'empresa_'.$id.'.'.$image->getClientOriginalExtension();
        $Empresa = \App\Empresa::find($id);
        $Empresa->logo_empresa = $imageName;
        $Empresa->save();
        
        \Storage::disk('local')->put($imageName, \File::get($image));

        \Session::flash('mensaje', 'Se ha registrado exitosamente la empresa: '.$request->input('nombre_empresa'));
        return redirect()->route('empresas.index');
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
        $Empresa = \App\Empresa::find($id);
        return view('empresas.edit')->with('datos', $Empresa);
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
        $image = $request->file('logo_empresa');

        $emp = new \App\Empresa;
        $v = $emp->validar($request->all(), 'update');
        if($v){
            return redirect()->back()->withInput()->withErrors($v);
        }

        $imageName = 'empresa_'.$id.'.'.$image->getClientOriginalExtension();

        $Empresa = \App\Empresa::find($id);
        $Empresa->nombre_empresa = $request->input('nombre_empresa');
        $Empresa->ruc = $request->input('ruc');
        $Empresa->ubicacion = $request->input('ubicacion');
        $Empresa->detalle = $request->input('detalle');
        $Empresa->logo_empresa = $imageName;
        $Empresa->save();

        \Storage::disk('local')->put($imageName, \File::get($image));

        \Session::flash('mensaje', 'Se ha actualizado correctamente la empresa: '.$request->input('nombre_empresa'));
        return redirect()->route('empresas.index');
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
