@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8"/> 
<title>  Formulario Recursos </title>  
</head>

<body>

@section('content')
{{ HTML::style('css/style.css') }}

<h1>Crear Recurso<h1>


{{Form::open()}}
<table>
<tr class="login">
  <td class="login">{{Form::label('nombre','Nombre Recurso:') }}                  </td>
  <td class="login">{{Form::text('nombre')}}                                      </td>
</tr>

<tr class="login">
  <td class="login">{{Form::label('id_recurso','ID Recurso:') }}                  </td>
  <td class="login">{{Form::text('id')}}                                          </td>
</tr>

<tr class="login">    
  <td class="login">{{Form::label('tipo','Tipo de Usuario:') }}                   </td>
  <td class="login"> {{  Form::select('tipo', array(
                  1 => 'Camión 1',
                  2 => 'Camión 2',
                  3 => 'Camión 3',
                  4 => 'Camión 4'));   }}                                            </td>
</tr>

<tr class="login">
  <td class="login"> {{Form::label('descripcion','Descripción:') }}               </td>
  <td class="login"> {{ Form::textarea('descripcion')}} </td>
</tr> 

<tr class="login">
  <td class="login"> {{Form::label('encargado_label','Encargado:') }}                                              </td>
  <td class="login"> {{Form::text('encargado')}}    {{Form::label('encargado_label2','Rut del Encargado') }}      </td> 
</tr>

<tr class="login">
  <td class="login"> {{Form::label('estado','Estado:') }}                          </td>
  <td class="login"> {{  Form::select('estado', array(
                  1 => 'Activo',
                  0 => 'No activo'));   }}                                         </td>
</tr>

<tr class="login"> 
  <td class="login"> {{ Form::submit('Crear Recurso') }}                           </td>    
</tr>

</table>
{{Form::close()}}

      @if(Session::has('mensaje'))
 
     {{ Session::get('mensaje') }}
                     
     @endif

    @if($errors->has())  
    <ul>
            {{ $errors->first('nombre','<li> :message </li>') }}
            {{ $errors->first('id','<li> :message </li>') }}
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
