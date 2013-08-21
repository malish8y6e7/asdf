<?php

class AuthController extends BaseController
{ 
   public function getIndex() 
	{ 
		return View::make('auth.login');
	}
    
   public function postIndex() 
 {       
      $rules = array(
      'rut'                   => 'Required|Integer',
      'password'              => 'Required'
      );

      $userdata= array(
      'id_usuario' => Input::get('rut'),   
      'password' => Input::get('password'));  

      $validator = Validator::make(Input::all(),$rules); 
    
        if($validator->passes())
       {              
              if(Auth::attempt($userdata)) 
            { 
                  if (Auth::check())
                { 
                  $user_RUT = Auth::user()->id_usuario;  

                  $user = DB::table('tbl_usuarios') 
                   ->where('id_usuario','=',$user_RUT) 
                   ->first(array('perfil'));        

                     if($user->perfil == 1) // si es de tipo 1 (administrador) 
                   {   
                        return View::make('admin.layout');
                   }else
                        {                     
                          return Redirect::to('logout');
                        } 
                } 
              }else{    
   	               return Redirect::to('login')->with('login_errors',true);
                   }
         }else{
   	            return Redirect::to('login')->withErrors($validator)->withInput(); 
              }                                                                          
   } 


        public function getLogout()
     {
      Auth::logout(); 

      return Redirect::to('login');
     }  

 } 
