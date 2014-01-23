@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8"/> 
<title>  Formulario Reservas </title>  
</head>

<body>
{{ HTML::style('css/style.css') }}
@section('content')

<h1>Crear Reserva</h1>

{{Form::open()}}
<table>
<tr class="login">
  <td class="login">{{Form::label('codigo_reserva','Código Reserva:') }}   </td>
  <td class="login">{{Form::text('codigo_reserva')}}                       </td>
</tr>

<tr class="login">
  <td class="login">{{Form::label('codigo','ID Recurso:') }}               </td>
  <td class="login">{{Form::text('codigo')}}                               </td>
</tr>

<tr class="login">
  <td class="login">{{Form::label('id','ID Usuario:') }}                   </td>
  <td class="login">{{Form::text('id')}}                                   </td>
</tr>

<tr class="login">
  <td class="login">{{Form::label('fecha','Fecha:') }}                     </td>
  <td class="login">{{Form::text('fecha') }}                               </td>
</tr>

<tr class="login"> 
  <td class="login"> {{ Form::submit('Crear Reserva') }}                   </td>    
</tr>
</table>
{{Form::close()}}

</body>
</html>
