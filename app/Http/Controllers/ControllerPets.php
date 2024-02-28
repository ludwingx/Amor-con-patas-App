<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota; // Asegúrate de importar el modelo Mascota
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class ControllerPets extends Controller
{
    public function index()
    {
        $mascotas = DB::table('pets')->get();
        $mascotas = $mascotas->map(function ($mascota) { 
        return $mascota;}); 
        return view('pets.adoptions', ['mascotas' => $mascotas]); 

    }
    public function cShowAdoptionList(Request $request)
    {
        $opcion=$request->opcion;
        if(Session()->has("usuariologin")){

            $conexiondb ='amor_con_patas';

            $adoptionList=DB::connection($conexiondb)->select('select * from pets'); 

            $view = view::make('pets.adoptions')->with('vadoptionlist',$adoptionList);

            $sections = $view->renderSections();

        
            return Response::json($sections['content']);

        }else{
            $data= array( ['mensaje' => 'sinusuario']);
            return response()->json($data);
        }
       
    }

    public function cexportlistpdf(){
        $titulo = "Listado de mascotas";
        $pdf = PDF::loadView('enclases.pdfpets',['titulo'=>$titulo])->setpaper('letter', 'landscape');
        $pdf ->getDomPDF()->set_option("isPhpEnable", true);
        return $pdf->download('pdfPets.pdf');

    }
    
}