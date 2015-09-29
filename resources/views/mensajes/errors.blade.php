@if (count($errors) > 0)
	<div class="notice notice-danger notice-sm">
        <strong>Por favor Corrige los siguientes errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <!--div class="alert alert-danger">
    	<p><strong>Por favor Corrige los siguientes errores:</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div-->
@endif