<div class="row">
	<div class="col-sm-8 col-sm-offset-2">		
		<div class="panel panel-info">
		    <div class="panel-heading">
		      <h3 class="panel-title"><i class="fa fa-user"></i> <strong>Datos del Usuario</strong></h3>
		    </div>
		    <div class="panel-body">
		    	<div class="row">
					<div class="form-group col-sm-6">
						{!! Form::label('usuario', 'Usuario:', array('class' => 'control-label')) !!}
						{!! Form::text('usuario', null, array('class'=>'form-control input-sm', 'placeholder' => 'Usuario')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('password', 'Contraseña:', array('class' => 'control-label')) !!}
						{!! Form::password('password', array('class'=>'form-control input-sm', 'placeholder' => 'Contraseña')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('id_empresa', 'Empresa:', array('class' => 'control-label')) !!}
						{!! Form::select('id_empresa', App\Empresa::lists('nombre_empresa', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('id_rol', 'Rol:', array('class' => 'control-label')) !!}
						{!! Form::select('id_rol', App\Rol::lists('rol', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
					</div>
		      	</div>
		    </div>
		</div>
	</div>
</div>