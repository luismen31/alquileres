<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="" type="image/x-icon">    
    <title>@yield('title', 'Gestión de Bienes Alquilables')</title>
   
    <!-- Bootstrap core CSS -->
     {!! Html::style('assets/css/bootstrap.css') !!}
    
    <!-- Custom styles for this template -->
    {!! Html::style('assets/css/alquileres.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('assets/css/bootstrap-table.css') !!}

 	@yield('new_css')
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="../../assets/js/ie-emulation-modes-warning.js"></script-->
     <!-- Fonts -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{!! Html::script('assets/js/html5shiv.min.js') !!}"></script>
      <script src="{!! Html::script('assets/js/respond.min.js') !!}"></script>
    <![endif]-->
  </head>

  <body>
  	<div id="wrap">
        <div id="main" class="clearf">
        	<div id="noty-holder"></div><!-- HERE IS WHERE THE NOTY WILL APPEAR-->
        	<nav class="navbar navbar-default navbar-fixed-top alquiler-nav">
		      <div class="container-fluid border-nav">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed" data-toggle="offcanvas">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Menu</span>
				  </button>		          
		          <a href="{{ url('/') }}" class="navbar-brand navbar-brand-centered">Gestión de Bienes Alquilables</a>   
		        </div>		        
		      </div>
		    </nav>
		    {{--*/ 
		    	//recibe la ruta actual para mantener activo el menu lateral
		    	$url = Request::path(); 
		    /*--}}
		   
		    <div class="container-fluid">
				<div class="row row-offcanvas row-offcanvas-left">
			        <div class="col-xs-6 col-sm-3 col-md-2 sidebar-offcanvas sidebar side-menu" id="sidebar">
		        		<div class="side-menu-container">
							<ul class="nav navbar-nav">
								<li class="panel panel-default {{ ($url == 'empresas' or $url == 'usuarios' or $url == 'servicios' or $url == 'locales') ? 'active' : '' }}" id="dropdown">
									<a data-toggle="collapse" href="#drop_1">
										<span class="fa fa-users"></span> Administración <span class="caret"></span>
									</a>

									<!-- Dropdown level 1 -->
									<div id="drop_1" class="panel-collapse collapse {{ ($url == 'empresas' or $url == 'usuarios' or $url == 'servicios' or $url == 'locales') ? 'in' : '' }}">
										<div class="panel-body">
											<ul class="nav navbar-nav">
											@if( \App\UserEmpresa::where('id_user', \Auth::user()->id)->first()->id_empresa == 1 )
												<li><a href="{{route('empresas.index')}}"><span class="fa fa-building"></span> Empresas</a></li>
											@endif
											@if( \App\UserEmpresa::where('id_user', \Auth::user()->id)->first()->id_rol == 1)
												<li><a href="{{route('usuarios.index')}}"><span class="fa fa-user"></span> Usuarios</a></li>
											@endif
												<li><a href="{{route('servicios.index')}}"><span class="fa fa-briefcase"></span> Servicios</a></li>
												<li><a href="{{route('locales.index')}}"><span class="fa fa-building-o"></span> Locales</a></li>
											</ul>
										</div>
									</div>
								</li>

								<!-- Dropdown-->
								<li class="panel panel-default" id="dropdown">
									<a data-toggle="collapse" href="#drop_2">
										<span class="fa fa-user"></span> Servicios - Locales <span class="caret"></span>
									</a>

									<!-- Dropdown level 1 -->
									<div id="drop_2" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li><a href="{{route('serviciolocal.index')}}">Asignar Servicio - Local</a></li>
												<li><a href="#">Consultar Local</a></li>
												<!-- Dropdown level 2 -->
												<li class="panel panel-default" id="dropdown">
													<a data-toggle="collapse" href="#drop_2-1">
														<span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
													</a>
													<div id="drop_2-1" class="panel-collapse collapse">
														<div class="panel-body">
															<ul class="nav navbar-nav">
																<li><a href="#">Link</a></li>
																<li><a href="#">Link</a></li>
																<li><a href="#">Link</a></li>
															</ul>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>

								<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>
								<li><a href="#"><span class="fa fa-link"></span> Link</a></li>

							</ul>
						</div>
			      	</div>


			        <div class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<div class="row sub-nav">
							<div class="col-md-6 col-sm-8 pull-left">
								<ul class="list-inline">
									<li class="welcome">Bienvenido, {{ Auth::user()->usuario }}</li>
								</ul>								
							</div>
							<div class="col-md-6 col-sm-4">
								<a href="{{url('auth/logout')}}" class="btn btn-default btn-outline pull-right">Cerrar Sesión <i class="fa fa-sign-out"></i></a>
							</div>
						</div>			          

				        {{-- Contenido --}}
                        @yield('content')
						
			        </div>
			        
			    </div>

		    </div><!-- end container-fluid -->
		</div>
	</div>

    <div id="footer">
    	<div class="row footer">
    		<div class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
       			Place sticky footer content here.
    		</div>
    	</div>
    </div>    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {!! Html::script('assets/js/jquery-2.1.4.min.js') !!}
    {!! Html::script('assets/js/moment.js') !!}
    {!! Html::script('assets/js/moment-es.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('assets/js/bootstrap-table.min.js') !!}
    {!! Html::script('assets/js/locale/bootstrap-table-es-MX.min.js') !!}
    {!! Html::script('assets/js/dataGrid.js') !!}
    <script type="text/javascript">
    	var baseurl = '{!! url() !!}';
    </script>
    {!! Html::script('assets/js/script.js') !!}
    <script type="text/javascript">
    	$(document).ready(function () {
		  $('[data-toggle="offcanvas"]').click(function () {		    
		    $('.row-offcanvas').toggleClass('active');
		    $('#footer').toggleClass('footer-left');
		  });
		});
    </script>
    <script type="text/javascript">
	    $(function () {
	        $('.datetimepicker').datetimepicker({
	        	format: 'YYYY/MM/DD'
	        });
	    });
    </script>
    @yield('scripts')
  </body>
</html>
