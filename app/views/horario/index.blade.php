@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/> 
<title>  Página de los Periodos </title>  
</head>

<body>
@section('content')
{{ HTML::style('css/style.css') }}

<h1> Horarios </h1>

<br>
<br>
<table class="datos" border="1">
@if($horarios)

	<tr>
		<td align="center">Periodo  </td>   
		<td align="center">Hora Inicio </td>  
		<td align="center">Hora Fin    </td>
	</tr> 

		@foreach($horarios as $horario)

		<tr>
			<td>{{$horario->id_horario}} </td>
			<td>{{$horario->hora_inicio}} </td>
			<td>{{$horario->hora_fin }} </td>	
		</tr>
		
		@endforeach

</table>
	
@else
 Todavia no hay ningun horario
@endif
@stop
@stop

</body>
</html>