<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use View;
use DB;
use Session;
use Response;
class ControllerJugadores extends Controller
{
    public function cListJugadores(Request $request){
        $opcion=$request->opcion;
        if(Session()->has("usuariologin")){

            $conexiondb ='amor_con_patas';

            $listjugadores=DB::connection($conexiondb)->select('select * from jugadores'); 

            $view = view::make('enclases.listajugadores')->with('listaJugadores',$listjugadores);

            $sections = $view->renderSections();

        
            return Response::json($sections['Cargadato']);

        }else{
            $data= array( ['mensaje' => 'sinusuario']);
            return response()->json($data);
        }
    }
}