<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    public $timestamps = false;

    public function validar($request, $tipo = 'store', $id = null){
    	
    	if($tipo == 'store'){
	    	$rules = [
	            'nombre_empresa' => 'required',
                'usuario' => ['required', 'unique:users,usuario'],
                'password' => 'required',
	            'logo_empresa' => ['required','image'],
	        ];    		
    	}else{
            $id_user = \App\UserEmpresa::where('id_empresa', $id)->first()->id_user;
    		$rules = [
    			'nombre_empresa' => 'required',
                'logo_empresa'  => 'image',
                'usuario' => ['required', 'unique:users,usuario,'.$id_user.',id']
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
