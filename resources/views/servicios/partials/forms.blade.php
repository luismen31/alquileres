{{--*/$id_empresa = \App\UserEmpresa::where('id_user', \Auth::user()->id)->first()->id_empresa;/*--}}
@if($id_empresa == 1)
	{{--*/
		$comp = '>';
		$id_empresa = 0;
	/*--}}
@else
	{{--*/$comp = '=';/*--}}
@endif
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">		
		<div class="panel panel-info">
		    <div class="panel-heading">
		      <h3 class="panel-title"><i class="fa fa-briefcase"></i> <strong>Datos del Servicio</strong></h3>
		    </div>
		    <div class="panel-body">
		    	<div class="row">
					<div class="form-group col-sm-6">
						{!! Form::label('servicio', 'Servicio:', array('class' => 'control-label')) !!}
						{!! Form::text('servicio', null, array('class'=>'form-control input-sm', 'placeholder' => 'Servicio')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('id_empresa', 'Empresa:', array('class' => 'control-label')) !!}
						{!! Form::select('id_empresa', App\Empresa::where('id', $comp, $id_empresa)->lists('nombre_empresa', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('costo', 'Costo:', array('class' => 'control-label')) !!}
						{!! Form::text('costo', null, array('class'=>'form-control input-sm', 'placeholder' => 'Costo')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('id_tipo_servicio', 'Tipo Servicio:', array('class' => 'control-label')) !!}
						{!! Form::select('id_tipo_servicio', App\TipoServicio::lists('tipo_servicio', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
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