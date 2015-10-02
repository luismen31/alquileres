<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('usuarios.create');
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
        $Usuario = new \App\Usuario;
        $Usuario->usuario = $request->input('usuario');
        $Usuario->password = \Hash::make($request->input('password'));
        $Usuario->save();

        $id_usuario = \App\Usuario::where('id', '>', '0')->orderBy('id', 'desc')->first()->id;

        $UserEmpresa = new \App\UserEmpresa;
        $UserEmpresa->id_usuario = $id_usuario;
        $UserEmpresa->id_empresa = $request->input('id_empresa');
        $UserEmpresa->id_rol = $request->input('id_rol');
        $UserEmpresa->save();

        return redirect()->route('usuarios.index');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Usuario = \App\Usuario::find($id);
        $Usuario->id_empresa = \App\UserEmpresa::where('id_user', $id)->first()->id_empresa;
        $Usuario->id_rol = \App\UserEmpresa::where('id_user', $id)->first()->id_rol;

        return view('usuarios.edit')->with('datos', $Usuario);
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
        $Usuario = \App\Usuario::find($id);
        $Usuario->usuario = $request->input('usuario');
        if(!empty($request->input('password'))){
            $Usuario->password = \Hash::make($request->input('password'));
        }
        $Usuario->save();

        $idUserEmpresa = \App\UserEmpresa::where('id_user', $id)->first()->id;

        $UserEmpresa = \App\UserEmpresa::find($idUserEmpresa);
        $UserEmpresa->id_empresa = $request->input('id_empresa');
        $UserEmpresa->id_rol = $request->input('id_rol');
        $UserEmpresa->save();

        return redirect()->route('usuarios.index');
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
