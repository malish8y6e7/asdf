<?php

class HorarioController extends \BaseController {

   public function __construct() // no deja acceder a nada de UserController sin estar autentificado
   {  
    $this->beforeFilter('auth'); 
   }

	public function getIndex() 
    {
       $horarios = Horario::all(); // crear variable users, User::all -> pedimos que devuelva todos los usuarios de la tabla users

       return View::make('horario.index')->with('horarios',$horarios); // ruta de la vista , ->with ... nombre de la variable en la view y el valor de la variable
    }
 
}