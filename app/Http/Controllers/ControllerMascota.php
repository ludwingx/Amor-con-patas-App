<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminaet\Support\Str;

use DB;
use Session;
use View;
use Response;
use PDF;

class ControllerMascota extends BaseController
{
    public function vlistarmascota(Request $request){
        $opcion=$request->opcion;
        
        if(Session()->has("usuariologin"))
        {     
            $conexiondb='amor_con_patas'; 
            $listama = DB::connection($conexiondb)->select('SELECT cod_mt, nombre_mt, tipo_mt, raza_mt, estado_mt, name, id FROM mascota INNER JOIN users ON mascota.fcod_pe= users.id'); 
            $raza=DB::connection($conexiondb)->select('select * from raza ');
            $view = view::make('mascota.listamascota')->with('lmascotas',$listama)->with('lraza',$raza) ;
            $sections = $view->renderSections();
            return Response::json($sections['Cargadato']);
         }
        else{
          $data= array( ['mensaje' => 'sinusuario']);
          return response()->json($data);
        }
     }
     public function cNuevaMascota(Request $request){
        $opcion=$request->accion;
        if(Session()->has("usuariologin"))
        {      
            $conexiondb='amor_con_patas'; 
            $raza=DB::connection($conexiondb)->select('select nombre_rz from raza where estado_rz = "activo"');
            $persona=DB::connection($conexiondb)->select('SELECT name,id from users where estado = "activo"');
            $view = view::make('mascota.nuevamascota')->with('lraza',$raza)->with('lpersona',$persona) ;
            $sections = $view->renderSections();
            return Response::json($sections['Cargadato']);
         }
        else{
          $data= array( ['mensaje' => 'sinusuario']);
          return response()->json($data);
        }
     }
     public function agregarMascota(Request $request){
      $nombre_mt=$request->nombre_mt;
      $tipo_mt=$request->tipo_mt;
      $raza_mt=$request->raza_mt;
      $fcod_pe=$request->fcod_pe;
      $estado_mt=$request->estado_mt;
      $detalle_mt=$request->detalle_mt;
        $conexiondb = 'amor_con_patas';
        $newPet = DB::connection($conexiondb)->insert('insert into mascota (nombre_mt, tipo_mt, raza_mt,fcod_pe, estado_mt, detalle_mt) values (?, ?, ?, ?, ?, ?)',
        [$nombre_mt, $tipo_mt, $raza_mt,$fcod_pe, $estado_mt, $detalle_mt]);
        $resultado = array('mensaje' => 'exito');

        return response()->json($resultado);
     }
     public function cEditarMascota(Request $request){
       $cod_mt = $request->cod_mt;
       if(Session()->has("usuariologin"))
       {
           $conexiondb = 'amor_con_patas';
           $raza=DB::connection($conexiondb)->select('select nombre_rz from raza where estado_rz = "activo"');
           $persona=DB::connection($conexiondb)->select('SELECT name,id from users where estado = "activo"');
           $dataMascota=DB::connection($conexiondb)->select('select * from mascota where cod_mt=?',[$cod_mt]);
           $view = view::make('mascota.editarmascota')->with('datosmascota',$dataMascota)->with('lraza',$raza)->with('lpersona',$persona);
           $sections = $view->renderSections();
           return Response::json($sections['Cargadato']);
       }
     }
     public function filtrarMascotas(Request $request){
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

          $listaper=DB::connection($conexiondb)->select('select * from users
           where cod_mt>1' .$filtrador);
         $view = view::make('mascota.listamascota')->with('lmascotas',$listaper);

         $sections = $view->renderSections();

         return Response::json($sections['Cargadato']);
      }
   }
}