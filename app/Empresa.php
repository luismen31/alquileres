<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    public $timestamps = false;

    public function validar($request, $tipo = 'store'){
    	
    	if($tipo == 'store'){
	    	$rules = [
	            'nombre_empresa' => 'required',
                'usuario' => ['required', 'unique:users,usuario'],
                'password' => 'required',
	            'logo_empresa' => ['required','image'],
	        ];    		
    	}else{
    		$rules = [
    			'nombre_empresa' => 'required',
    		];
    	}

        $v = \Validator::make($request, $rules);
        if($v->fails()){
        	return $v;
        }else{
        	return false;
        }
    }
}
