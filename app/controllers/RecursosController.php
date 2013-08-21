<?php

class RecursosController extends \BaseController {

   public function __construct() // no deja acceder a nada de UserController sin estar autentificado
   {  
    $this->beforeFilter('auth'); 
   }

	public function getIndex() 
    {
       $recursos = Recurso::all(); 
       return View::make('recurso.index')->with('recursos',$recursos); // ruta de la vista , ->with ... nombre de la variable en la view y el valor de la variable
    }

    public function getFormulario()
    {
    	return View::make('recurso.formulario'); // directorio de la vista
    }

    public function postFormulario()
  {
     // Validación  

     $id        = Input::get('id');
     $encargado = Input::get('encargado');

    $rules = array(  
      'nombre'         => 'Required|Min:3|Max:50',
      'id'             => 'Required|Unique:tbl_recurso,id_recursos',
      'tipo'           => 'Required|Integer|Between:1,4',
      'descripcion'    => 'Required',
      'encargado'      => 'Required|exists:tbl_usuarios,id_usuario',
      'estado'         => 'Required|Integer|Between:0,1', 
      );

     function esID($id)
    {
          if(is_numeric($id))   // verifica si el campo id es entero
                return 1;
          else              
                return 0;
    }

      $esId = esID($id);

      if($esId != 1)
         return Redirect::back()->with('mensaje','ID inválido')->withInput();

      function esEncargado($encargado)
    {
          if(is_numeric($encargado))   // verifica si el campo encargado es entero
                return 1;
          else              
                return 0;
    }

      $Encargado = esEncargado($encargado);

            if($Encargado != 1)
         return Redirect::back()->with('mensaje','encargado inválido')->withInput();
 
    $validator = Validator::make(Input::all(),$rules); 
   
    if($validator->passes())
  { 
      $recurso = new Recurso;

      $recurso->nombre_recurso = Input::get('nombre'); // falta en el formulario   
      $recurso->id_recursos = Input::get('id');
      $recurso->tipo = Input::get('tipo');
      $recurso->descripcion = Input::get('descripcion');
      $recurso->id_encargado = Input::get('encargado');
      $recurso->estado = Input::get('estado');

      $recurso->save();

      $ingresa = New Ingresa;
      //$ingresa->id_ini = serial
      date_default_timezone_set("America/Santiago");
      $currentDate = date("Y-m-d");
      $ingresa->nombre_recurso = $recurso->nombre_recurso;
      $ingresa->id_recurso = $recurso->id_recursos;
      $ingresa->fecha_ini = $currentDate;

      $ingresa->save();


      return Redirect::to('recursos');
     
  }else{   
      return Redirect::back()->withErrors($validator)->withInput();
       }   
  }



    public function getDelete($recurso_id)
    {  
      $recurso= Recurso::find($recurso_id);

      $reserva = DB::table('tbl_reservas')->where('id_recurso', $recurso_id)->first();

      if(is_null($reserva))
      {
          if(is_null($recurso))
          {
          	return Redirect::to('recursos'); // nombre de la ruta
          } 

          $eliminar = New Elimina;
          date_default_timezone_set("America/Santiago");
          $currentDate = date("Y-m-d");
          $eliminar->id_recurso = $recurso->id_recursos;
          $eliminar->fecha_elim = $currentDate;  	
          $eliminar->nombre_recurso = $recurso->nombre_recurso;
          $eliminar->save();
      
          $recurso->delete();

          return Redirect::to('recursos')->with('mensaje','Recurso Eliminado'); 

      }else

          return Redirect::to('recursos')->with('mensaje','El recurso está reservado');

     }

    public function getUpdate($recurso_id)
    {
      $recurso = Recurso::find($recurso_id);

      if (is_null($recurso))
      {
       	return Redirect::to('recursos');
      }
    
     return View::make('recurso.update')->with('recurso',$recurso);

    }

	public function postUpdate($recurso_id)
	{
                    
    $rules = array(
      'tipo'           => 'Min:1|Max:4',      
      'estado'         => 'Integer|Between:0,1', 
      'encargado'      => 'Exists:tbl_usuarios,id_usuario'
      );

    $validator = Validator::make(Input::all(),$rules); 
   
    if($validator->passes())
  {  

		$recurso = Recurso::find($recurso_id);

		if(is_null($recurso))
		{
		  return Redirect::to('recursos');
		}

    if (Input::has('tipo'))
    {
		  $recurso->tipo = Input::get('tipo');
    }

    if (Input::has('descripcion'))
    {
		  $recurso->descripcion  = Input::get('descripcion');
    }

    if (Input::has('encargado'))
    {
      $recurso->id_encargado = Input::get('encargado');
    }

		if (Input::has('estado'))
		{
			$recurso->estado = Input::get('estado');
		}

		  $recurso->save();

		return Redirect::to('recursos');  
    }else{
   
     return Redirect::back()
    ->withErrors($validator)
    ->withInput();              
      
         }   
	   }



     
}