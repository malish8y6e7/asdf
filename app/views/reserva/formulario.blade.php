
<h1>Crear reserva </h1>

{{ Form::open() }}

Usuario {{ Form::text('persona','agregarlo solo no se como xd')}} <br />

Recurso:  {{ Form::text('recurso',$recurso->ID_Recurso)}} <br />

Hora Inicio:  {{ Form::text('hora_inicio','no se')}} <br />

Hora Fin: {{ Form::text('hora_fin','tampoco se')}} <br />

{{ Form::submit('Crear Reserva')}}

{{ Form::close()}}

