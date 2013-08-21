<?php

class HistorialRecursosController extends BaseController 
{  

public function getIndex()
	{ 
		$eliminados = Elimina::all();
		$ingresados = Ingresa::all(); 
		
        return View::make('recurso.historial')->with('eliminados',$eliminados)->with('ingresados',$ingresados);
	}

}