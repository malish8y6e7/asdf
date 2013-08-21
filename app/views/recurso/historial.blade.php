@extends('admin.layout')


{{ HTML::style('css/style.css') }}	

@section('content')
<h1> Historial Recursos</h1>

<table align="center" class="links">
<tr><td>{{  HTML::link('PDF4','Crear PDF')}} </td></tr>
</table>

<h3> Agregados</h3>

<table class="datos">
@if($ingresados)
	<tr>
		<td>ID             </td>
		<td>ID Recurso     </td>
		<td>Nombre Recurso </td>
		<td>Fecha Ingreso  </td>
	</tr>	
		@foreach($ingresados as $ingresa)
	<tr>  
		    <td> {{$ingresa->id_ingreso}}         </td>
			<td> {{$ingresa->id_recurso}}         </td>
			<td> {{$ingresa->nombre_recurso}}     </td>
			<td> {{$ingresa->fecha_ini}}  		  </td>
	</tr>
		@endforeach
	</table>	

@else
 Todavia no hay ningun recurso Agregado
@endif

<h3>Eliminados </h3>

<table class="datos">
@if($eliminados)
	<tr>
		<td>ID:                </td>
		<td>ID Recurso:        </td>
		<td>Nombre Recurso:    </td>
		<td>Fecha Eliminación: </td>
	</tr>
		@foreach($eliminados as $eliminado)
	<tr>
		<td> {{$eliminado->id_elimina}}     </td>
		<td> {{$eliminado->id_recurso}}     </td>
		<td> {{$eliminado->nombre_recurso}} </td>
		<td> {{$eliminado->fecha_elim}}     </td>
	</tr>				   	
		@endforeach
</table>
@else
 Todavia no hay ningun recurso eliminado
@endif

@stop
@stop