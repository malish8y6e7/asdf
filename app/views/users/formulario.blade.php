@extends('admin.layout')
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8"/> 
<title>  Crear Usuarios </title>  
</head>

<body>
@section('content')
{{ HTML::style('css/style.css') }}

<h1>Crear Usuario<h1>

    {{Form::open()}}

<table>
    <tr class="login">
	   <td class="login"> {{Form::label('nombre','Nombre:') }}                          </td>
       <td class="login"> {{Form::text('nombre')}}                                      </td>
    </tr>
    <tr class="login">  
       <td class="login"> {{Form::label('rut_label','RUT:') }}                          </td>
       <td class="login"> {{Form::text('rut')}} -  {{Form::text('digito_verificador')}} </td>
    </tr>
    <tr class="login">
        <td class="login"> {{Form::label('password','Password:') }}                      </td> 
        <td class="login"> {{Form::password('password')}}                                </td>
    </tr>
    <tr class="login">
        <td class="login">  {{Form::label('conf_password','Confirmar Password:') }}      </td>
        <td class="login">  {{Form::password('password_confirmation')}}                  </td>
    </tr>

    <tr class="login"> 
        <td class="login">  {{Form::label('perfil_usuario','Perfil de Usuario:') }}      </td> 
        <td class="login">  {{  Form::select('perfil', array(
                                             2 => 'Usuario',
                                              1 => 'Admnistrador'));   }}                </td>
    </tr>
    <tr class="login">
        <td class="login"> {{Form::label('email','Email:') }}                             </td>
        <td class="login"> {{ Form::text('email')}}                                       </td>
    </tr>   
    <tr class="login">
        <td class="login"> {{Form::label('telefono','Teléfono:') }}                       </td>
        <td class="login"> {{Form::text('telefono')}}                                     </td>

    <tr class="login">
       <td class="login"> {{Form::label('direccion','Dirección:') }}                       </td>
       <td class="login"> {{Form::text('direccion')}}                                      </td>
    </tr>

    <tr class="login">
        <td class="login">	{{Form::submit('Crear usuario')}}                             </td>
    </tr>

</table>
    {{Form::close()}}
            @if(Session::has('mensaje'))
 
            {{ Session::get('mensaje') }}
                     
            @endif

    @if($errors->has())  
    <ul>
            {{ $errors->first('nombre','<li> :message </li>') }}
            {{ $errors->first('rut','<li> :message </li>') }}
            {{ $errors->first('digito_verificador','<li> :message </li>') }}
            {{ $errors->first('password','<li> :message </li>') }}
            {{ $errors->first('password_confirmation','<li> :message </li>') }}
            {{ $errors->first('perfil','<li> :message </li>') }}
            {{ $errors->first('email','<li> :message </li>') }}
            {{ $errors->first('telefono','<li> :message </li>') }}
    </ul>	


    @endif
    @stop
    @stop
</body>
</html>
