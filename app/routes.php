<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('auth.login');
});
 
Route::controller('usuarios','UserController');  

Route::controller('recursos','RecursosController');

Route::controller('reservas','ReservasController');

Route::controller('horario','HorarioController');

Route::controller('login','AuthController');  

Route::get('logout','AuthController@getLogout');

Route::get('admin', array('before' => 'auth', function()
{
 return View::make('admin.layout'); 
}));

Route::controller('historial','HistorialRecursosController');

Route::get('PDF', function()
{       
    $users = User::all(); 
    require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
    $html =  View::make('users.index')->with('users',$users);  
    $dompdf = new DOMPDF();
    $dompdf->load_html(utf8_decode($html));
    $dompdf->set_paper('letter','landscape');
    $dompdf->render();
    date_default_timezone_set("America/Santiago");
    $currentDate = date("d-m-Y");
    $dompdf->stream($currentDate."_usuarios.pdf");
});

Route::get('PDF2', function()
{        
	$recursos = Recurso::all();
    require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
    $html =View::make('recurso.index')->with('recursos',$recursos);
    $dompdf = new DOMPDF();
    $dompdf->load_html(utf8_decode($html));
    $dompdf->set_paper('letter','landscape');
    $dompdf->render();
    date_default_timezone_set("America/Santiago");
    $currentDate = date("d-m-Y");
    $dompdf->stream($currentDate."_recursos.pdf");
});

Route::get('PDF3', function()  // FALTA 
{        
    $reservas = Reserva::all();
    require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
    $html =  View::make('reserva.index')->with('reservas',$reservas);  
    $dompdf = new DOMPDF();
    $dompdf->load_html(utf8_decode($html));
    $dompdf->render();
    date_default_timezone_set("America/Santiago");
    $currentDate = date("d-m-Y");
    $dompdf->stream($currentDate."_reservas.pdf");;
});

Route::get('PDF4',function(){

    $eliminados = Elimina::all();
    $ingresados = Ingresa::all(); 
        
    $html = View::make('recurso.historial')->with('eliminados',$eliminados)->with('ingresados',$ingresados);
    require_once("../vendor/dompdf/dompdf/dompdf_config.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->load_html(utf8_decode($html));
    $dompdf->render();
    date_default_timezone_set("America/Santiago");
    $currentDate = date("d-m-Y");
    $dompdf->stream($currentDate."_HistorialRecursos.pdf");;
});
