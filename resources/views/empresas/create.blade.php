@extends('app')

@section('title')
	Agregar Nueva Empresa
@stop

@section('content')	
	
	<h2 class="page-header">Empresas</h2>

	{{-- Mostrar mensaje exitoso --}}
	@if(Session::has('mensaje'))
		@include('mensajes.notify', ['mensaje' => Session::get('mensaje'), 'tipo' => 'success'])
	@endif

	<div class="tabbable-panel">
		
		@include('mensajes.errors')
						
		{!! Form::open(array('route' => 'empresas.store', 'method' => 'POST')) !!}

			@include('empresas.partials.forms')

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