<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminaet\Support\Str;
use DB;
use Session;
use View;
use Response;

class ControllerUsers extends Controller
{

    public function cListUsers(Request $request){
        $opcion=$request->opcion;
        //proteger la vista con la session
        if(Session()->has("usuariologin"))
        {      
            //seleccionar la base de datos
            $conexiondb='amor_con_patas'; //nombre de la base de datos
            //seleccionar la tabla de la base de datos y la consulta a realizar 
            $listusers=DB::connection($conexiondb)->select('select * from users'); 
            // mostrar la vista con los datos de la base de datos 
            $view = view::make('enclases.userlista')->with('listusers',$listusers) ;
            // mostrar la vista con los datos de la base de datos renderizando las secciones de la vista
            $sections = $view->renderSections();

            Log::info('Antes de renderizar la vista'); 
            // retornar la vista con los datos de la base de datos renderizando las secciones de la vista
            //con un json de las secciones de la vista renderizadas 
            return Response::json($sections['cargadato']);
         } //sin session 
        else{
          $data= array( ['mensaje' => 'sinusuario']);
          return response()->json($data);
        }
     }
     public function addUser(Request $request){
      $name = $request -> name;
      $email = $request -> email;
      $password = $request -> password;
      $estado = 'activo';
      $conexiondb='amor_con_patas';

      $newUser=DB::connection($conexiondb)->insert('insert into users (name, email, password, estado)
      values(?,?,?,?)', [$name, $email, $password, $estado]);
      $resultado=array('mensaje' => 'exito');
      return response()->json($resultado);
     }
     public function filtrarUsers(Request $request){
        $opcion=$request->opcion;
        $estado=$request->estado;
        $buscar=$request->buscar;
        $pais=$request->pais;
        $filtroEstado='';
        $filtrobuscar='';
        $filtropais='';
        $filtrador='';
        if(Session()->has("usuariologin")){
            $conexiondb='amor_con_patas'; //nombre de la base de datos
            if($estado='todos'){
              
            }else{
              $filtrador=$filtrador.'and estado = "'.$estado.'"';
            }
            if(strlen ($buscar)<2){
              
            }else{
              $filtrobuscar='and name like "%'.$buscar.'%"';
            }
            if($pais=='todos'){

            }else{
              $filtropais='and id_pais="'.$pais.'"';
            }

            $listaper=DB::connection($conexiondb)->select('select * from users where id>1 '.$filtroEstado.$filtrobuscar.$filtropais);
        }
     }
   
}
