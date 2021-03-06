@extends('app')

@section('title')
	Editar Empresas
@stop

@section('content')	
	
	<h2 class="page-header">Empresas</h2>

	{{-- Mostrar mensaje exitoso --}}
	@if(Session::has('mensaje'))
		@include('mensajes.notify', ['mensaje' => Session::get('mensaje'), 'tipo' => 'success'])
	@endif

	@include('mensajes.errors')

	@include('empresas.partials.data-grid')

	<div class="tabbable-panel">
		{!! Form::model($datos, array('route' => array('empresas.update', $datos->id), 'method' => 'PUT', 'files' => 'true')) !!}

			@include('empresas.partials.forms')

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