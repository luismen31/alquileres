@extends('app')

@section('title')
	Agregar Nuevo Usuario
@stop

@section('content')	
	
	<h2 class="page-header">Usuarios</h2>

	{{-- Mostrar mensaje exitoso --}}
	@if(Session::has('mensaje'))
		@include('mensajes.notify', ['mensaje' => Session::get('mensaje'), 'tipo' => 'success'])
	@endif

	<div class="tabbable-panel">
		
		@include('mensajes.errors')
						
		{!! Form::open(array('route' => 'usuarios.store', 'method' => 'POST')) !!}

			@include('usuarios.partials.forms')

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