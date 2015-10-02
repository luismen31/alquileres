<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-info-circle"></i> <strong>Datos del Servicio</strong></h3>
    </div>
    <div class="panel-body">
    	<div class="row">
			<div class="form-group col-sm-4">
				{!! Form::label('servicio', 'Servicio:', array('class' => 'control-label')) !!}
				{!! Form::text('servicio', null, array('class'=>'form-control input-sm', 'placeholder' => 'Servicio')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('costo', 'Costo:', array('class' => 'control-label')) !!}
				{!! Form::text('costo', null, array('class'=>'form-control input-sm', 'placeholder' => 'Costo')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('detalle', 'Detalle:', array('class' => 'control-label')) !!}
				{!! Form::textarea('detalle', null, array('placeholder' => 'Detalle', 'class' => 'form-control input-sm', 'size' => '3x1')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('id_empresa', 'Empresa:', array('class' => 'control-label')) !!}
				{!! Form::select('id_empresa', App\Empresa::lists('nombre_empresa', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
			</div>
      	</div>
    </div>
</div>