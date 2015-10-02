<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-info-circle"></i> <strong>Datos del Local - Servicio</strong></h3>
    </div>
    <div class="panel-body">
    	{{--*/
    			$id_empresa = \App\UserEmpresa::where('id_user', \Auth::user()->id)->first()->id_empresa;
    	/*--}}
    	<div class="row">
    		<div class="form-group col-sm-4">
				{!! Form::label('fecha', 'Fecha:', array('class' => 'control-label')) !!}
				{!! Form::text('fecha', null, array('class'=>'form-control input-sm datetimepicker', 'placeholder' => 'AAAA-MM-DD') ) !!}   
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('id_local', 'Local:', array('class' => 'control-label')) !!}
				{!! Form::select('id_local',  App\Local::where('id_empresa', $id_empresa)->lists('no_identificacion', 'id')->toArray(), null, array('class'=>'form-control input-sm')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('id_servicio', 'Servicio:', array('class' => 'control-label')) !!}
				{!! Form::select('id_servicio',  App\Servicio::where('id_empresa', $id_empresa)->lists('servicio', 'id')->toArray(), null, array('class'=>'form-control input-sm')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('costo', 'Costo:', array('class' => 'control-label')) !!}
				{!! Form::text('costo', null, array('class'=>'form-control input-sm', 'placeholder' => 'Costo')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('realizado_por', 'Realizado por:', array('class' => 'control-label')) !!}
				{!! Form::textarea('realizado_por', null, array('placeholder' => 'Realizado por', 'class' => 'form-control input-sm', 'size' => '3x1')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('observaciones', 'Observaciones:', array('class' => 'control-label')) !!}
				{!! Form::textarea('observaciones', null, array('placeholder' => 'Observaciones', 'class' => 'form-control input-sm', 'size' => '3x1')) !!}
			</div>
      	</div>
    </div>
</div>