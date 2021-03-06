@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/> 
<title>  Página de los Recursos </title>  
</head>

<body>
@section('content')
{{ HTML::style('css/style.css') }}

<h1> Recursos </h1>

<table align="center" class="links">
<tr> 
    <td> {{  HTML::link('PDF2','Crear PDF')}}                       </td>
    <td> {{  HTML::link('recursos/formulario','Crear Recurso')}} </td> 

</tr> 
</table>

            @if(Session::has('mensaje'))
 
            {{ Session::get('mensaje') }}
                     
            @endif


@if($recursos)
<table class="datos" border="1">

		<tr>
			 <td> ID </td> 
			 <td> Nombre</td>
			 <td> Descripción </td> 
			 <td> Tipo </td>
			 <td> Estado</td> 
			 <td> Encargado </td> 
		</tr>

		@foreach($recursos as $recurso)
		<tr>
			<td> {{$recurso->codigo}}    </td>
			<td> {{$recurso->nombre}} </td>
			<td> {{$recurso->descripcion}}    </td>
			<td> {{$recurso->tipo}}			  </td>
			<td> @if($recurso->estado) 
				 Activo 
				@else  					
				 No Activo  
		    	@endif	 </td>
			<td> {{$recurso->id_encargado}} </td> 
			<td> {{ HTML::link('recursos/delete/'.$recurso->codigo,'Borrar') }}   </td>
			<td>{{ HTML::link('recursos/update/'.$recurso->codigo,'Actualizar') }} </td> 
		</tr>
					@endforeach 
</table>
	
@else
 Todavia no hay ningun recurso
@endif
@stop
@stop

</body>
</html>