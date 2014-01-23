<?php

class ReservasController extends \BaseController {

   public function __construct() // no deja acceder a nada de UserController sin estar autentificado
   {  
    $this->beforeFilter('auth'); 
   }

	public function getIndex() 
    {
       $reservas = Reserva::all(); // crear variable users, User::all -> pedimos que devuelva todos los usuarios de la tabla users

       return View::make('reserva.index')->with('reservas',$reservas); // ruta de la vista , ->with ... nombre de la variable en la view y el valor de la variable
    }
  
    public function getFormulario()
    {
    	return View::make('reserva.formulario'); // directorio de la vista
    }

public function postFormulario()
  {
     // Validación  

    $rules = array(  
      'codigo_reserva'    => 'Required',
      'codigo'            => 'Required',
      'id'                => 'Required',
      'fecha'             => 'Required',
      );
    $validator = Validator::make(Input::all(),$rules); 
   
    if($validator->passes())
  { 
      $reserva = new Reserva;

     // $reserva->nombre = Input::get('nombre'); // falta en el formulario   
      $reserva->codigo_reserva = Input::get('codigo_reserva');
      $reserva->id             = Input::get('id');
      $reserva->codigo_recurso = Input::get('codigo');
      $reserva->fecha          = Input::get('fecha');

      $reserva->save();

      return Redirect::to('reservas');
     
  }else{   
      return Redirect::back()->withErrors($validator)->withInput();
       }   
  }

/// BORRAR RESERVA ///

   public function getDelete($recurso_id)
    {  

      $reserva= Reserva::find($recurso_id);

      if(is_null($reserva))
      {
          return Redirect::to('reservas'); // nombre de la ruta
          
      }
       else
      {   
      	  $reserva->delete();
          return Redirect::to('reservas')->with('mensaje','Recurso Eliminado'); 	  
      }
    }
}