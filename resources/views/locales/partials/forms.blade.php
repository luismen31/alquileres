<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		{{--*/$id_empresa = \App\UserEmpresa::where('id_user', \Auth::user()->id)->first()->id_empresa;/*--}}
		@if($id_empresa == 1)
			{{--*/
				$comp = '>';
				$id_empresa = 0;
			/*--}}
		@else
			{{--*/$comp = '=';/*--}}
		@endif
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
						{!! Form::label('tamaño', 'Tamaño (m2):', array('class' => 'control-label')) !!}
						{!! Form::text('tamaño', null, array('class'=>'form-control input-sm', 'placeholder' => 'Tamaño')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('baños', 'Baños:', array('class' => 'control-label')) !!}
						{!! Form::number('baños', null, array('class'=>'form-control input-sm', 'placeholder' => '0', 'max' => '5', 'min' => '0')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('aire', 'Aire Acondicionado:', array('class' => 'control-label')) !!}
						{!! Form::select('aire', Array('1' => 'SI', '2' => 'NO'), null, array('class' => 'form-control input-sm'))  !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('precio_alquiler', 'Precio de Alquiler:', array('class' => 'control-label')) !!}
						{!! Form::text('precio_alquiler', null, array('class'=>'form-control input-sm', 'placeholder' => 'Precio de Alquiler')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('ubicacion', 'Ubicación:', array('class' => 'control-label')) !!}
						{!! Form::textarea('ubicacion', null, array('placeholder' => 'Detalle', 'class' => 'form-control input-sm', 'size' => '3x1')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('id_empresa', 'Empresa:', array('class' => 'control-label')) !!}
						{!! Form::select('id_empresa', App\Empresa::where('id', $comp, $id_empresa)->lists('nombre_empresa', 'id')->toArray(), null, array('class' => 'form-control input-sm'))  !!}
					</div>
		      	</div>
		    </div>
		</div>
	</div>
</div>

