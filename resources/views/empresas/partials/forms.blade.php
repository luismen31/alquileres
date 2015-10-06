<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
		    <div class="panel-heading">
		      <h3 class="panel-title"><i class="fa fa-building"></i> <strong>Datos de la Empresa</strong></h3>
		    </div>
		    <div class="panel-body">
		    	<div class="row">

					<div class="form-group col-sm-6">						 
						{!! Form::label('nombre_empresa', 'Nombre de la Empresa:', array('class' => 'control-label')) !!}
						{!! Form::text('nombre_empresa', null, array('class'=>'form-control input-sm', 'placeholder' => 'Nombre')) !!}
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('logo_empresa', 'Logo de Empresa:', array('class' => 'control-label')) !!}
						<div class="input-group image-preview">
			               
			                <input type="text" class="form-control input-sm image-preview-filename" disabled="disabled">							
			                <span class="input-group-btn">
			                    <!-- image-preview-clear button -->
			                    <button type="button" class="btn btn-default btn-small image-preview-clear" style="display:none;">
			                        <span class="glyphicon glyphicon-remove"></span> <span class="sr-only">Limpiar</span>
			                    </button>
			                    <!-- image-preview-input -->
			                    <div class="btn btn-default btn-small image-preview-input">
			                        <span class="glyphicon glyphicon-folder-open"></span>
			                        <span class="image-preview-input-title"></span><span class="sr-only">Seleccionar...</span>
			                        {!! Form::file('logo_empresa', array('class' => 'input-sm', 'accept' => 'image/*')) !!}
			                    </div>
			                </span>
			            </div>
					</div>					
					<div class="form-group col-sm-6">
						{!! Form::label('ruc', 'RUC:', array('class' => 'control-label')) !!}
						{!! Form::text('ruc', null, array('class'=>'form-control input-sm', 'placeholder' => 'RUC')) !!}
					</div>
					<div class="form-group col-sm-12">
						{!! Form::label('ubicacion', 'Ubicación:', array('class' => 'control-label')) !!}
						{!! Form::textarea('ubicacion', null, array('placeholder' => 'Ubicación', 'class' => 'form-control input-sm', 'size' => '3x2')) !!}
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

@section('scripts')
	<script type="text/javascript">
		$(document).on('click', '#close-preview', function(){ 
		    $('.image-preview').popover('hide');
		    // Hover befor close the preview
		    $('.image-preview').hover(
		        function () {
		           $('.image-preview').popover('show');
		        }, 
		         function () {
		           $('.image-preview').popover('hide');
		        }
		    );    
		});

		$(function() {
		    // Create the close button
		    var closebtn = $('<button/>', {
		        type:"button",
		        text: 'x',
		        id: 'close-preview',
		        style: 'font-size: initial;',
		    });
		    closebtn.attr("class","close pull-right");
		    // Set the popover default content
		    $('.image-preview').popover({
		        trigger:'manual',
		        html:true,
		        title: "<strong>Vista Previa</strong>"+$(closebtn)[0].outerHTML,
		        content: "No hay imagen",
		        placement:'bottom'
		    });
		    // Clear event
		    $('.image-preview-clear').click(function(){
		        $('.image-preview').attr("data-content","").popover('hide');
		        $('.image-preview-filename').val("");
		        $('.image-preview-clear').hide();
		        $('.image-preview-input input:file').val("");
		    }); 
		    // Create the preview image
		    $(".image-preview-input input:file").change(function (){     
		        var img = $('<img/>', {
		            id: 'dynamic',
		            width:190,
		            //height:200
		        });      
		        var file = this.files[0];
		        var reader = new FileReader();
		        // Set preview image into the popover data-content
		        reader.onload = function (e) {
		            $(".image-preview-clear").show();
		            $(".image-preview-filename").val(file.name);            
		            img.attr('src', e.target.result);
		            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
		        }        
		        reader.readAsDataURL(file);
		    });  
		});
	</script>
@append