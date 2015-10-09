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
        $Empresa->footer_print = $request->input('footer_print');
        $Empresa->head_print = $request->input('head_print');
        $Empresa->save();
        //Obtiene el ID de la empresa recien ingresada
        $id = $Empresa->id;
        //Almacenar nombre de imagen en BD        
        $imageName = 'empresa_'.$id.'.'.$image->getClientOriginalExtension();
        $Empresa = \App\Empresa::find($id);
        $Empresa->logo_empresa = $imageName;
        $Empresa->save();

        $Usuario = new \App\Usuario;
        $Usuario->usuario = $request->input('usuario');
        $Usuario->password = \Hash::make($request->input('password'));
        $Usuario->save();

        $id_usuario = $Usuario->id;

        $UserEmpresa = new \App\UserEmpresa;
        $UserEmpresa->id_user = $id_usuario;
        $UserEmpresa->id_empresa = $id;
        $UserEmpresa->id_rol = 1;
        $UserEmpresa->save();
        
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
        $Usuario = \App\Usuario::find(\App\UserEmpresa::where('id_empresa', $id)->where('id_rol', 1)->first()->id_user);
        $Empresa->usuario = $Usuario->usuario;
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

        $emp = new \App\Empresa;
        $v = $emp->validar($request->all(), 'update', $id);
        if($v){
            return redirect()->back()->withInput()->withErrors($v);
        }

        $Empresa = \App\Empresa::find($id);
        $Empresa->nombre_empresa = $request->input('nombre_empresa');
        $Empresa->ruc = $request->input('ruc');
        $Empresa->ubicacion = $request->input('ubicacion');
        $Empresa->detalle = $request->input('detalle');
        $Empresa->footer_print = $request->input('footer_print');
        $Empresa->head_print = $request->input('head_print');
        //Si ingresa una nueva imagen se reemplazara con la anterior almacenada
        if($request->hasFile('logo_empresa')){
            
            $image = $request->file('logo_empresa');            
            $imageName = 'empresa_'.$id.'.'.$image->getClientOriginalExtension();
            $Empresa->logo_empresa = $imageName;
            
            \Storage::disk('local')->put($imageName, \File::get($image));
        }
        $Empresa->save();

        $id_empresa = $Empresa->id;

        $Usuario = \App\Usuario::find(\App\UserEmpresa::where('id_empresa', $id_empresa)->where('id_rol', 1)->first()->id_user);
        $Usuario->usuario = $request->input('usuario');
        if(!empty($request->input('password'))){
            $Usuario->password = \Hash::make($request->input('password'));
        }
        $Usuario->save();

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
