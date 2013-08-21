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
  
}