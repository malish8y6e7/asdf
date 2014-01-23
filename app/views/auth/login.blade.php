<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8"/> 
<title>  F & M S.A </title>  
</head>
<body>
  		{{ HTML::style('css/style.css') }}
  	<div id="header"><br>
	</div>

	<img src="css/login.png" style="float:right;"/>
                           
	<div class="contenedor">
						<h2>Reserva de Camiones </h2>
    <div class="formulario">
    	

			  		    <h1></h1>	
						 
						 {{Form::open()}}   <table align="center">

					
	 	
					<tr class="login"><td class="login">RUT:     </td>  <td class="login">{{ Form::text('rut')}}         </td></tr>
					<tr class="login"><td class="login">Password:</td>  <td class="login">{{ Form::password('password')}}</td></tr>	 </table> 

						<div class="boton">{{Form::submit('Ingresar')}}  </div>
						 {{Form::close()}} 

					 	<div class="errores">
							@if (Session::has('login_errors'))
							Usuario o contraseña incorrectas.
							@endif

							@if($errors->has())  
							    <ul>  
							            {{ $errors->first('rut','<li> :message </li>') }}
							            {{ $errors->first('password','<li> :message </li>') }}
							   </ul>	
							 @endif
						</div>	 
					
									 

    </div>
    </div>
</body>
</html>
