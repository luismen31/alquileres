@extends('app')

@section('title')
	Editar Servicio - Local
@stop

@section('content')	
	
	<h2 class="page-header">Servicios - Locales</h2>

	{{-- Mostrar mensaje exitoso --}}
	@if(Session::has('mensaje'))
		@include('mensajes.notify', ['mensaje' => Session::get('mensaje'), 'tipo' => 'success'])
	@endif

	<div class="tabbable-panel">
		
		@include('mensajes.errors')
						
		{!! Form::model($datos, array('route' => array('serviciolocal.update', $datos->id), 'method' => 'PUT')) !!}

			@include('servicioslocales.partials.forms')

			<div class="row">
				<div class="form-group col-sm-12">
					<center>
						{!! Form::submit('Editar', array('class' => 'btn btn-success')) !!}
					</center>
				</div>
			</div>
		{!! Form::close() !!}

	</div>				
@stop