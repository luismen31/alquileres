@section('new_css')
	{!! Html::style('assets/css/drag-services.css') !!}
	{!! Html::style('assets/css/typicons.css') !!}
@append

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
				{!! Form::label('realizado_por', 'Realizado por:', array('class' => 'control-label')) !!}
				{!! Form::textarea('realizado_por', null, array('placeholder' => 'Realizado por', 'class' => 'form-control input-sm', 'size' => '3x1')) !!}
			</div>
			<div class="form-group col-sm-4">
				{!! Form::label('observaciones', 'Observaciones:', array('class' => 'control-label')) !!}
				{!! Form::textarea('observaciones', null, array('placeholder' => 'Observaciones', 'class' => 'form-control input-sm', 'size' => '3x1')) !!}
			</div>
      	</div>
    	{{--<i class="fa fa-flash"></i>--}}
		{{--<i class="typcn typcn-weather-snow"></i>--}}
        {{--<i class="fa fa-tint"></i>--}}
      	<div class="row">
			<div class="col-xs-12 col-sm-4 well well-sm well-services">
				<section id="service">
			        <ul class="clear list-unstyled">
			        	@foreach(\App\Servicio::where('id_empresa', \App\UserEmpresa::where('id_user', \Auth::user()->id )->first()->id_empresa)->get() as $Servicios)
				        	<li data-id="{{ $Servicios->id }}" data-precio="{{ $Servicios->costo }}">
				                <a href="#">
				                    <h4>{{ $Servicios->servicio }}</h4>		                    
				                </a>
				            </li>
			        	@endforeach
			        </ul>
			  	</section>
			</div>
			<div class="col-xs-12 col-sm-8">
			    <aside id="sidebar" class="pull -right">
			        <div class="service_local">
			            <div class="service_local_list">
			            	<div class="delete-all hide">
			                	<span class="name"><a href="#" id="delete-all">Remover Todos</a></span>
			                </div>
			                <div class="head">
			                    <span class="name">Servicio</span>
			                    <span class="count">Precio ($)</span>
			                </div>
			                <ul class="list-unstyled">
			                    <!--
									Lista de servicios seleccionados
			                	-->
			                </ul>
			               
			            </div>
			        </div>		        
			    </aside>
			</div>
		</div>
    </div>
</div>

@section('scripts')

	{!! Html::script('assets/js/jquery-ui.min.js') !!}
	{!! Html::script('assets/js/jquery.ui.touch-punch.min.js') !!}
	{!! Html::script('assets/js/jquery.notify.js') !!}

	<script>
	    $(function () {

			// jQuery UI Draggable
			$("#service li").draggable({
			
				// brings the item back to its place when dragging is over
				revert:true,
				// once the dragging starts, we decrease the opactiy of other items
				// Appending a class as we do that with CSS
				drag:function () {
					$(this).addClass("active");
					$(this).closest("#service").addClass("active");
				},
			
				// removing the CSS classes once dragging is over.
				stop:function () {
					$(this).removeClass("active").closest("#service").removeClass("active");
				}
			});

	        // jQuery Ui Droppable
			$(".service_local").droppable({
			
				// The class that will be appended to the to-be-dropped-element (service)
				activeClass:"active",
			
				// The class that will be appended once we are hovering the to-be-dropped-element (service)
				hoverClass:"hover",
			
				// The acceptance of the item once it touches the to-be-dropped-element service
				// For different values http://api.jqueryui.com/droppable/#option-tolerance
				tolerance:"touch",
				drop:function (event, ui) {
			
					var service_local = $(this),
							move = ui.draggable;
							itemId = service_local.find("ul li[data-id='" + move.attr("data-id") + "']");
					
					// To increase the value by +1 if the same item is already in the service_local
					if (itemId.html() != null) {
						var mensaje = move.find("h4").html()+' ya ha sido agregado.';
						//Enviar notificacion que ya existe el servicio
						notificacion(mensaje);

					}else {
						// Add the dragged item to the service_local
						addService(service_local, move);
					}
				}
			});

			function notificacion(mensaje){
				createNoty(""+ mensaje +"", "warning");
			    //cerrar notificacion cliqueando el boton "x"
			    $('.page-alert .close').click(function(e) {
			        e.preventDefault();
			        $(this).closest('.page-alert').slideUp();
			    });
			    //cerrar notificacion despues de 5 seg. 
			    setTimeout(function() {
			        $(".page-alert .close").closest('.page-alert').slideUp();
			    },5000);
			}
			
	        // This function runs onc ean item is added to the service
	        function addService(service_local, move) {

				service_local.find("ul").append('<li data-id="' + move.attr("data-id") + '">'
						+ '<span class="name">' + move.find("h4").html() + '</span>'
						+ '<input class="count" name="servicios['+move.attr("data-id")+'][]" value="'+ move.attr('data-precio') +'" type="text">'						
						+ '<button class="delete">&#10005;</button>');	        	
			}

	        // The function that is triggered once delete button is pressed
	        $(document).on("click",  '.service_local ul li button.delete', function () {        	
				$(this).closest("li").remove();
			});
			
	    });
	</script>

@append