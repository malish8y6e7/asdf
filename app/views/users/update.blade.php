@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8"/> 
<title>  Actualizar Usuario </title>  
</head>

<body>

@section('content')
{{ HTML::style('css/style.css') }}
 
<h1>Actualizar Usuario: {{$user->id_usuario}}<h1>

    {{Form::open()}} 
<table>
  <tr class="login">
  	<td class="login">  Nombre:                   </td>
  	<td class="login"> {{ Form::text('nombre')}}  </td>
  </tr>
  <tr class="login">	
  	<td class="login">   Email:   				  </td>
  	<td class="login">	 {{ Form::text('email')}} </td>
  </tr>
  <tr class="login">	
	<td class="login">   Perfil de usuario:       </td>
    <td class="login">{{  Form::select('perfil', array(
                  2 => 'Usuario',
                  1 => 'Admnistrador'),$user->perfil);   }}  </td>
  </tr>
  <tr class="login">                  
    <td class="login"> Password:  					         </td>
    <td class="login">{{ Form::password('password')}}        </td>
   </tr>
   <tr class="login"> 
    <td class="login"> Telefóno:                             </td>
    <td class="login"> {{ Form::text('fono')}}               </td>
   </tr> 

<tr class="login"> <td class="login"> {{ Form::submit('Actualizar Usuario') }} </td> </tr>
</table>
{{ Form::close() }}


@if($errors->has()) 	
<ul>
            {{ $errors->first('nombre','<li> :message </li>') }}
            {{ $errors->first('password','<li> :message </li>') }}
            {{ $errors->first('perfil','<li> :message </li>') }}
            {{ $errors->first('email','<li> :message </li>') }}
</ul>
@endif	
@stop
@stop

</body>
</html>

