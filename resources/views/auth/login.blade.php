<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="" type="image/x-icon">    
    <title>@yield('title', 'Iniciar Cuidados Paliativos')</title>
   
    <!-- Bootstrap core CSS -->
    {!! Html::style('assets/css/bootstrap.css') !!}
    
    <!-- Custom styles for this template -->
    {!! Html::style('assets/css/alquileres.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="../../assets/js/ie-emulation-modes-warning.min"></script-->
     <!-- Fonts -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{!! Html::script('assets/js/html5shiv.min.js') !!}"></script>
      <script src="{!! Html::script('assets/js/respond.min.js') !!}"></script>
    <![endif]-->
  </head>

<body class="login">
	<div class="container">

	    <div class="row">
	        <div class="col-md-12">
	            <div class="well login-box">
	        	<div class="row">
	        		
	        			@include('mensajes.errors')
	        		
	        	</div>
	            	{!! Form::open(['url' => 'auth/login', 'method' => 'POST', 'role' => 'form']) !!}
	                    <legend>Iniciar Sesión</legend>	                    
	                    <div class="form-group input-group {{ $errors->has('usuario') ? 'has-error' : ''}}">
	                    	<span class="input-group-addon" id="usuario"><i class="fa fa-user"></i></span>
	                        {!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Usuario', 'aria-describedby' => 'usuario']) !!}
	                    </div>
	                    <div class="form-group input-group {{ $errors->has('password') ? 'has-error' : '' }}">
	                    	<span class="input-group-addon" id="password"><i class="fa fa-lock"></i></span>
	                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'aria-describedby' => 'password']) !!}
	                    </div>
	                    <div class="form-group text-center">
	                        <button type="submit" class="btn btn-success btn-block">Iniciar</button>
	                    </div>
	                {!! Form::close() !!}
	            </div>	          
	        </div>
	    </div>
	
	</div>
</body>
	{!! Html::script('assets/js/jquery-2.1.4.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
</html>