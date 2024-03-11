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
            $listama = DB::connection($conexiondb)->select('SELECT mascota.cod_mt,
             mascota.nombre_mt, mascota.raza_mt, tipo.nombre_tipo, tipo.id, raza.nombre_rz, raza.cod_rz, mascota.estado_mt, users.name, users.id 
            FROM mascota 
            INNER JOIN users ON mascota.fcod_pe = users.id
            INNER JOIN tipo ON mascota.tipo_mt = tipo.id
            LEFT JOIN raza ON mascota.raza_mt = raza.cod_rz'); 
            $raza=DB::connection($conexiondb)->select('select * from raza ');
            $tipo=DB::connection($conexiondb)->select('SELECT * from tipo ');
            $view = view::make('mascota.listamascota')->with('lmascotas',$listama)->with('lraza',$raza)->with('ltipo',$tipo); ;
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
            $tipo=DB::connection($conexiondb)->select('SELECT * from tipo ');
            $raza=DB::connection($conexiondb)->select('select nombre_rz from raza where estado_rz = "activo"');
            $persona=DB::connection($conexiondb)->select('SELECT name,id from users where estado = "activo"');
            $view = view::make('mascota.nuevamascota')->with('lraza',$raza)->with('lpersona',$persona)->with('ltipo',$tipo); ;
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
           $tipo=DB::connection($conexiondb)->select('SELECT * from tipo ');
           $persona=DB::connection($conexiondb)->select('SELECT name,id from users where estado = "activo"');
           $dataMascota=DB::connection($conexiondb)->select('select * from mascota where cod_mt=?',[$cod_mt]);
           $propietarioActualId = $dataMascota[0]->fcod_pe;
           $razaActualNombre = $dataMascota[0]->raza_mt;
           $tipoActualNombre= $dataMascota[0]->tipo_mt;
           $view = view::make('mascota.editarmascota')->with('datosmascota',$dataMascota)
           ->with('lraza',$raza)->with('lpersona',$persona)->with('ltipo',$tipo)
           ->with('propietarioActualId', $propietarioActualId)
           ->with('razaActualNombre', $razaActualNombre)
           ->with('tipoActualNombre', $tipoActualNombre);
           $sections = $view->renderSections();
           return Response::json($sections['Cargadato']);
       }
     }
     public function updateEditPet(Request $request){

       // var formData={
        //'nombre_mt': nombre_mt, 'tipo_mt': tipo_mt, 'raza_mt': raza_mt,'fcod_pe':fcod_pe, 'detalle_mt': detalle_mt
      //}
      $nombre_mt=$request->nombre_mt;
      $tipo_mt=$request->tipo_mt;
      $raza_mt=$request->raza_mt;
      $fcod_pe=$request->fcod_pe;
      $detalle_mt=$request->detalle_mt;
      $cod_mt=$request->cod_mt;
      if(Session()->has("usuariologin")){
        $conexiondb = 'amor_con_patas';
        $updatePet = DB::connection($conexiondb)->update('update mascota set nombre_mt=?, tipo_mt=?, raza_mt=?, fcod_pe=?, detalle_mt=? where cod_mt=?',
        [$nombre_mt, $tipo_mt, $raza_mt,$fcod_pe, $detalle_mt,$cod_mt]);

        $data = array('mensaje' => 'exito');

        return response()->json($data);
      }else{
        $data= array( ['mensaje' => 'sinusuario']);
        return response()->json($data);
      }
     }
     public function cDesactivarMascota(Request $request){
      $cod_mt = $request->cod_mt;
      $estado_mt = $request->estado_mt;
       if(Session()->has("usuariologin"))
       {
          $conexiondb = 'amor_con_patas';
        $estadoMascota = DB::connection($conexiondb)->update('update mascota set estado_mt=? where cod_mt=?',[$estado_mt, $cod_mt]);
        $data = array('mensaje' => 'exito');
        return response()->json($data);
       }
       else{
         $data= array( ['mensaje' => 'sinusuario']);
         return response()->json($data);
       }
     }
     public function filtrarMascotas(Request $request){
      //  var formData = {'estado_mt': estado_mt, 'ftipo': ftipo, 'fraza': fraza, 'fpropietario': fpropietario};
      $estado_mt  = $request->estado_mt ;
      $ftipo = $request->ftipo;
      $fraza = $request->fraza;
      $fpropietario = $request->fpropietario;

      $filtroEstado = '';
      $filtroTipo = '';
      $filtroRaza = '';
      $filtroPropietario = '';
      
      if(Session()->has("usuariologin")){
          $conexiondb='amor_con_patas'; 

          if($estado_mt =='todos'){
            $filtroEstado='';
          }else{
            $filtroEstado=' where estado_mt = "'.$estado_mt.'" ';
          }
          if(strlen($fpropietario)<2){
            $filtroPropietario=' where fcod_pe = "'.$fpropietario.'" ';
          }else{
            $filtroPropietario=' where fcod_pe = "'.$fpropietario.'" ';
          }
          if($ftipo =='todos'){
            $filtroTipo='';
          }else{
            $filtroTipo=' where tipo_mt = "'.$ftipo.'" ';
          }
          if($fraza =='todos'){
            $filtroRaza='';
          }else{
            $filtroRaza=' where raza_mt = "'.$fraza.'" ';
          }
          
            $listama = DB::connection($conexiondb)->select('SELECT cod_mt, nombre_mt, tipo_mt, raza_mt, estado_mt,
             name, id FROM mascota INNER JOIN users ON mascota.fcod_pe= users.id'.$filtroEstado); 
            $raza=DB::connection($conexiondb)->select('select * from raza ');
            $view = view::make('mascota.filtromascota')->with('lmascotas',$listama)->with('lraza',$raza) ;
            $sections = $view->renderSections();

            return Response::json($sections['Cargadato']);
          
      }
   }
}