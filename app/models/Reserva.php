<?php

class Reserva extends Eloquent
{


	protected $table = 'tbl_reservas';

	protected $primaryKey = 'id_reserva';	 

	public $timestamps = false;

}