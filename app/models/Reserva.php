<?php

class Reserva extends Eloquent
{


	protected $table = 'reservas';

	protected $primaryKey = 'codigo_reserva';	 

	public $timestamps = false;

}