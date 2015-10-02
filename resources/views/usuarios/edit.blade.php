@extends('app')

@section('title')
	Editar Usuario
@stop

@section('content')	
	
	<h2 class="page-header">Usuarios</h2>

	{{-- Mostrar mensaje exitoso --}}
	@if(Session::has('mensaje'))
		@include('mensajes.notify', ['mensaje' => Session::get('mensaje'), 'tipo' => 'success'])
	@endif

	<div class="tabbable-panel">
		
		@include('mensajes.errors')
						
		{!! Form::model($datos, array('route' => array('usuarios.update', $datos->id), 'method' => 'PUT')) !!}

			@include('usuarios.partials.forms')

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