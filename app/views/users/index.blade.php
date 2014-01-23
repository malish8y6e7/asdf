@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/> 
<title>  {{Form::label('usuarios','Usuarios') }}  </title>  
</head>

<body>
@section('content')
{{ HTML::style('css/style.css') }}

<h1> Usuarios </h1>

<table align="center" class="links">
<tr> 
	<td>  {{  HTML::link('PDF','Crear PDF')}}                       </td>
	<td>  {{  HTML::link('usuarios/formulario','Crear un Usuario')}}</td>
</tr>
</table>

            @if(Session::has('mensaje'))
 
            {{ Session::get('mensaje') }}
                     
            @endif

<br>
<br>
<table class="datos" border="1">
@if($users)

	<tr>
		<td align="center"> {{Form::label('rut','RUT') }}  </td>   
		<td align="center"> {{Form::label('nombre','Nombre') }}  </td>  
		<td align="center"> {{Form::label('perfil_usuario','Perfil de Usuario') }}  </td>
		<td align="center"> {{Form::label('email','Email') }}  </td>
		<td align="center"> {{Form::label('telefono','Teléfono') }} </td>
		<td align="center"> {{Form::label('direccion','Dirección') }} </td>
	</tr> 

		@foreach($users as $user)

		<tr><td>{{$user->id}} </td>
			<td> {{$user->real_name	}} </td>
			<td> @if($user->perfil == 1)
			Administrador
			 @else
			Usuario
			 @endif</td>
			 <td>{{$user->email}}</td>
			 <td>{{$user->telefono}}</td>
			 <td>{{$user->direccion}}</td>
			 <td>{{ HTML::link('usuarios/delete/'.$user->id,'Borrar') }} </td>
			 <td> {{ HTML::link('usuarios/update/'.$user->id,'Actualizar') }}</td>
		</tr>
		
		@endforeach

</table>
	
@else
 Todavia no hay ningun usuario
@endif
@stop
@stop

</body>
</html>