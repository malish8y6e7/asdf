
<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

	protected $table = 'roles'; 

	protected $primaryKey = 'id';	 

	//public $timestamps = false;
}