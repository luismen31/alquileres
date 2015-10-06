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
        $data = [ 
            'nombre_empresa' => $request->input('nombre_empresa'),
            'logo_empresa' => $image,
        ];

        $rules = [
            'nombre_empresa' => 'required',
            'logo_empresa' => ['required','image'],
        ];

        $v = \Validator::make($data, $rules);
        if($v->fails()){
            return redirect()->back()->withInput()->withErrors($v);
        }

        $imageName = $request->input('nombre_empresa').'.'.$image->getClientOriginalExtension();
        \Storage::makeDirectory('empresa');
        \Storage::disk('local')->put('empresa/'.$imageName, \File::get($image));
       
        $Empresa = new \App\Empresa;
        $Empresa->nombre_empresa = $request->input('nombre_empresa');
        $Empresa->ruc = $request->input('ruc');
        $Empresa->ubicacion = $request->input('ubicacion');
        $Empresa->detalle = $request->input('detalle');
        $Empresa->save();

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
        $Empresa = \App\Empresa::find($id);
        $Empresa->nombre_empresa = $request->input('nombre_empresa');
        $Empresa->ruc = $request->input('ruc');
        $Empresa->ubicacion = $request->input('ubicacion');
        $Empresa->detalle = $request->input('detalle');
        $Empresa->save();

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
