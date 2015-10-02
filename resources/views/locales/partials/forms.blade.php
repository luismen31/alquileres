<div class="row">
	<div class="col-sm-8 col-sm-offset-2">			
		<div class="panel panel-info">
		    <div class="panel-heading">
		      <h3 class="panel-title"><i class="fa fa-building-o"></i> <strong>Datos del Local</strong></h3>
		    </div>
		    <div class="panel-body">
		    	<div class="row">
					<div class="form-group col-sm-6">
						{!! Form::label('no_identificacion', 'N° de Identificación:', array('class' => 'control-label')) !!}
						{!! Form::text('no_identificacion', null, array('class'=>'form-control input-sm', 'placeholder' => 'N° Identificación')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('precio_alquiler', 'Precio de Alquiler:', array('class' => 'control-label')) !!}
						{!! Form::text('precio_alquiler', null, array('class'=>'form-control input-sm', 'placeholder' => 'Precio de Alquiler')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('id_empresa', 'Empresa:', array('class' => 'control-label')) !!}
						{!! Form::select('id_empresa', App\Empresa::lists('nombre_empresa', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
					</div>
					<div class="form-group col-sm-12">
						{!! Form::label('ubicacion', 'Ubicación:', array('class' => 'control-label')) !!}
						{!! Form::textarea('ubicacion', null, array('placeholder' => 'Detalle', 'class' => 'form-control input-sm', 'size' => '3x2')) !!}
					</div>
					
		      	</div>
		    </div>
		</div>
	</div>
</div>