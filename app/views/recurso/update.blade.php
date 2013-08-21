@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8"/> 
<title>  Actualizar Recursos </title>  
</head>

<body>

@section('content')
{{ HTML::style('css/style.css') }}

<h1>Actualizar Recurso:{{$recurso->id_recursos}}<h1>

{{ Form::open() }}

<table>
      <tr class="login">
         <td class="login"> Tipo:                                          </td>
         <td class="login"> {{  Form::select('tipo', array(
                  1 => 'Laboratorio',
                  2 => 'Proyector',
                  3 => 'Computador',
                  4 => 'Otros'),$recurso->tipo);   }}                      </td>
      </tr>
      <tr class="login">
        <td class="login">    Descripcion:                                 </td>
       <td class="login"> {{ Form::textarea('descripcion')}}               </td>
      </tr>
      <tr class="login">
        <td class="login">    Encargado:                                   </td>
       <td class="login"> {{ Form::text('encargado',$recurso->encargado)}} </td>
      </tr> 
      <tr class="login">
        <td class="login">    Estado::                                     </td>
       <td class="login"> {{  Form::select('estado', array(
                  '0'  => 'No Activo',
                  '1'  => 'Activo'),$recurso->estado);  }}                 </td>
      </tr>  
        <tr class="login"> 
            <td class="login">   {{ Form::submit('Actualizar Recurso')}}   </td>
       </tr>
</table>        
      {{ Form::close() }}

@if($errors->has()) 	
<ul>
            {{ $errors->first('tipo','<li> :message </li>') }}
            {{ $errors->first('descripcion','<li> :message </li>') }}
            {{ $errors->first('encargado','<li> :message </li>') }}
            {{ $errors->first('estado','<li> :message </li>') }}
</ul>

@endif
@stop
@stop

</body>
</html>

