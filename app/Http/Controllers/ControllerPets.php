<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ControllerUsers extends Controller
{
    public function vListPets(Request $request){

        $opcion=$request->opcion;

        if(Session()->has("usuariologin"))
        {
            
            $conexiondb='amor_con_patas';
            $listarUsa=DB::connection($conexiondb)->select('select name,user,email, estado from users  '); 
 
            $view = view::make('usuarios')->with('listausa',$listarUsa) ;

            $sections = $view->renderSections();
               
            return Response::json($sections['Cargadato']);
                     

            
         } //sin session 
        else{
          $data= array( ['mensaje' => 'sinusuario']);
          return response()->json($data);
        }

    }

    public function vAddPet(Request $request){
        $namep=$request->namep;

        if(Session()->has("usuariologin"))
        {
            
            $conexiondb='amor_con_patas';
            $listarUsa=DB::connection($conexiondb)->select(' ');

    }

    

}
