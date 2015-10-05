<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
		    <div class="panel-heading">
		      <h3 class="panel-title"><i class="fa fa-building"></i> <strong>Datos de la Empresa</strong></h3>
		    </div>
		    <div class="panel-body">
		    	<div class="row">
					<div class="form-group col-sm-6">
						{!! Form::label('nombre_empresa', 'Nombre de la Empresa:', array('class' => 'control-label')) !!}
						{!! Form::text('nombre_empresa', null, array('class'=>'form-control input-sm', 'placeholder' => 'Nombre')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('logo_empresa', 'Logo de Empresa:', array('class' => 'control-label')) !!}
						{!! Form::file('logo_empresa', null,  array('class' => 'form-control input-sm')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('ruc', 'RUC:', array('class' => 'control-label')) !!}
						{!! Form::text('ruc', null, array('class'=>'form-control input-sm', 'placeholder' => 'RUC')) !!}
					</div>
					<div class="form-group col-sm-12">
						{!! Form::label('ubicacion', 'Ubicación:', array('class' => 'control-label')) !!}
						{!! Form::textarea('ubicacion', null, array('placeholder' => 'Ubicación', 'class' => 'form-control input-sm', 'size' => '3x2')) !!}
					</div>
					<div class="form-group col-sm-12">
						{!! Form::label('detalle', 'Detalle:', array('class' => 'control-label')) !!}
						{!! Form::textarea('detalle', null, array('placeholder' => 'Detalle', 'class' => 'form-control input-sm', 'size' => '3x2')) !!}
					</div>
		      	</div>
		    </div>
		</div>
	</div>
</div>