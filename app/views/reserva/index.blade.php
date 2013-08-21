@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/> 
<title>  Página de las Reservas </title>  
</head>

<body>
@section('content')
{{ HTML::style('css/style.css') }}

<h1> Reservas </h1>

<table align="center" class="links">
<tr> 
	<td>  {{  HTML::link('PDF3','Crear PDF')}}                       </td>
</tr>
</table>

<br>
<br>
<table class="datos" border="1">
@if($reservas)

	<tr>
		<td align="center">ID Reserva</td>   
		<td align="center">ID Recurso</td>  
		<td align="center">ID Usuario</td>
		<td align="center">Fecha de la Reserva</td>
		<td align="center">Periodo</td>
	</tr> 

		@foreach($reservas as $reserva)

		<tr><td>{{$reserva->id_reserva}} </td>
			<td>{{$reserva->id_recurso}} </td>
			<td>{{$reserva->id_usuario}} </td>
			<td>{{$reserva->fech_ini}}   </td>
			<td>{{$reserva->horario}}    </td>		
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