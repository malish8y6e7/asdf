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
	<td> {{  HTML::link('reservas/formulario','Crear un Reserva')}} </td> 
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
		<td align="center">Fecha</td>
	</tr> 

		@foreach($reservas as $reserva)

		<tr><td>{{$reserva->codigo_reserva}} </td>
			<td>{{$reserva->codigo_recurso}} </td>
			<td>{{$reserva->id}}             </td>
			<td>{{$reserva->fecha}}           </td>
			<td> {{ HTML::link('reservas/delete/'.$reserva->codigo_reserva,'Borrar') }}   </td>
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