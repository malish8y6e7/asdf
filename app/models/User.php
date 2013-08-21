<?php

use Zizaco\Entrust\Hasrole;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface 
{
	protected $table = 'tbl_usuarios'; 
	protected $primaryKey = 'id_usuario';	 
	protected $hidden = array('password'); 
	public $timestamps = false;

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password; 
	}

	public function getReminderEmail()
	{
		return $this->email;	 
	}

    public function setPasswordAttribute($value)
    {
    	$this->attributes['password'] = Hash::make($value);
    }
         
   
}