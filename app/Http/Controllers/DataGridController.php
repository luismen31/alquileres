<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DataGridController extends Controller
{
    public function getEmpresa(){
    	if(!\Request::ajax()){
    		abort(403);
    	}
    	$data = array();

    	$empresas = \App\Empresa::all();
    	$n = 1;
    	$comilla = "'";

    	foreach ($empresas as $empresa) {

    		$url = '<a href="'.route('empresas.edit', $empresa->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Editar</a>';

    		$data[] = array(
    			'num' 		=> $n,
    			'nombre' 	=> $empresa->nombre_empresa,
    			'ubicacion' => $empresa->ubicacion,
    			'detalle' 	=> $empresa->detalle,
    			'options'	=> $url,
    		);
    		$n++;
    	}

    	return response()->json(['total' => $n-1, 'rows' => $data]);
    }
}
