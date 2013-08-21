<?php

// GET POST PUT DELETE


class UserController extends BaseController 
{    
    public function __construct() // no deja acceder a nada de UserController sin estar autentificado
   {  
        $this->beforeFilter('auth');
   }  

    public function getIndex() 
  {
       $users = User::all(); 
       return View::make('users.index')->with('users',$users); 
  }

    public function getFormulario()
  {
    	return View::make('users.formulario');
  }

    public function postFormulario()
  {
         $r= Input::get('rut');  // rut ingresado por el usuario.
         $dv = Input::get('digito_verificador'); // digito verificador ingresado por el usuario.
         $telefono = Input::get('telefono');

         function esRut($r)
    {
       if(is_numeric($r))   // verifica si el Rut es entero
               return 1;
         else
               return 0;
    }

      $esRut = esRut($r);
      
       function esTelefono($telefono)
    {
          if(is_numeric($telefono))   // verifica si el telefono es entero
                return 1;
          else
              
                return 0;
    }

      $esTelefono = esTelefono($telefono);

        if($esTelefono !=1 || $esRut !=1)
          return Redirect::back()->withInput()->with('mensaje','Datos inválidos');

        function dv($r) // con el rut obtiene el digito verificador.
      {
          $s=1;

          for($m=0;$r!=0;$r/=10)

          $s=($s+$r%10*(9-$m++%6))%11;

          return chr($s?$s+47:75);
      }
          $dv2= dv($r); // obtengo el digito verificador del rut ingresado

          if($dv != $dv2 )  // compara el digito verificador ingresado con el obtenido.
               return Redirect::back()->with('mensaje','El digito verificador no corresponde al RUT')->withInput(); 

    $rules = array(  
      'nombre'                => 'Required|Min:3|Max:50',
      'rut'                   => 'Required|Integer|unique:tbl_usuarios,id_usuario', 
      'digito_verificador'    => 'Required|Integer',
      'password'              => 'Required|min:4|max:20|Confirmed',
      'password_confirmation' => 'Required',
      'perfil'                => 'Required|Integer|Between:1,4', 
      'email'                 => 'Required|Email|unique:tbl_usuarios,email',
      'telefono'              => 'Required|min:7|max:9|Unique:tbl_usuarios,fono'
    );
           
    $validator = Validator::make(Input::all(),$rules);  //Input::all()
   
              if($validator->passes())
          {
                                   
              $user = new User;

              $user->nombre_user = Input::get('nombre');
              $user->id_usuario  = Input::get('rut');
              $user->password    = Input::get('password');
              $user->perfil      = Input::get('perfil');
              $user->email       = Input::get('email');
              $user->fono        = Input::get('telefono'); 
              
              $user->save();

              return Redirect::to('usuarios');

            }else{
                    return Redirect::back()->withErrors($validator)->withInput();
                  }        
  } 
         //////////////////////////

    public function getDelete($user_id)
 {     
      $user= User::find($user_id);

      $recurso = DB::table('tbl_recurso')->where('id_encargado', $user_id)->first();

            if(is_null($recurso)){

              $user->delete();
              return Redirect::to('usuarios')->with('mensaje','usuario eliminado');
            }
        
      else
        
         return Redirect::to('usuarios')->with('mensaje','El usuario es encargado de algún recurso');

 }

    public function getUpdate($user_id)
 {
      $user = User::find($user_id);

      if (is_null($user))
      {
       	return Redirect::to('usuarios');
      }
    
     return View::make('users.update')->with('user',$user); 
  }

	public function postUpdate($user_id)
	{
  
    $rules = array(   
      'nombre'                => 'Min:3|Max:50',
      'password'              => 'Between:4,8',
      'perfil'                => 'Integer|Between:1,4', 
      'email'                 => 'Between:6,30|Email|Unique:tbl_usuarios,email',
      'fono'                  => 'Integer|Unique:tbl_usuarios,fono'
      );

    $validator = Validator::make(Input::all(),$rules); 
   
    if($validator->passes())
  { 

		$user = User::find($user_id);

		if(is_null($user))
		{
		  return Redirect::to('usuarios');
		}
    if (Input::has('nombre'))
    {
     $user->nombre_user = Input::get('nombre');
    }

    if (Input::has('email'))
    {
     $user->email = Input::get('email');
    }

    if (Input::has('perfil'))
    {
     $user->perfil = Input::get('perfil');
    }
		if (Input::has('password'))
		{

      $user->password = Input::get('password');
		}
    if (Input::has('fono'))
    {
       $user->fono = Input::get('fono');
    }

		$user->save();

		return Redirect::to('usuarios');
  }else{
   
     return Redirect::back()
    ->withErrors($validator)
    ->withInput();          
          }  
	}

}