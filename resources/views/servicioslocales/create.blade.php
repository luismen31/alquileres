@extends('app')

@section('title')
	Agregar Nuevo Servicio - Local
@stop

@section('content')	
	
	<h2 class="page-header">Servicios - Locales</h2>

	{{-- Mostrar mensaje exitoso --}}
	@if(Session::has('mensaje'))
		@include('mensajes.notify', ['mensaje' => Session::get('mensaje'), 'tipo' => 'success'])
	@endif

	<div class="tabbable-panel">
		
		@include('mensajes.errors')
						
		{!! Form::open(array('route' => 'serviciolocal.store', 'method' => 'POST')) !!}

			@include('servicioslocales.partials.forms')

			<div class="row">
				<div class="form-group col-sm-12">
					<center>
						{!! Form::submit('Agregar', array('class' => 'btn btn-success')) !!}
					</center>
				</div>
			</div>
		{!! Form::close() !!}

	</div>				
@stop