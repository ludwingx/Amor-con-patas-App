<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota; // Asegúrate de importar el modelo Mascota

use Illuminate\Support\Facades\Response;


use View;
use DB;
use Session;


class ControllerAdoption extends Controller
{
    public function showForm($id)
    {   
        Session::forget('usuariologin');
        // Lógica para mostrar el formulario con la información de la mascota ($pet_id)
        return view('pets.adoption');

    }

    public function submit(Request $request)
    {

        return redirect()->route('home')->with('success', 'Solicitud de adopción enviada correctamente.');
    }
    public function cAdoptionForm(Request $request){
        $id = $request->id;
        $conexiondb='amor_con_patas';
        if (session()->has("usuariologin")) {

            $mascota  = DB::connection($conexiondb)->select('select * from pets where id=?', [$id]);
            $view = View::make('pets.pet')
                ->with('mascota', $mascota );
            $sections = $view->renderSections();
            return Response::json($sections['Cargadato']);
        }
    }
    public function cProfilePet(Request $request) {

       
        
       
    }
    public function saveAdopt(Request $request){
        
    }
    public function vSubirImagen(Request $request){
        
        $file = $request->file('file');
        $id = $request->id;

        $nombreFile = $file ->getClientOriginalName();
        $imgenR= Image::make($file->getRealParh());

        $imagenR ->resize(800, null, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $imagenR->orientate();
        $imagenR->save("imagenes/usuarios/".$nombreFile);

        $conexiondb = 'amor_con_patas';
        $listaper=DB::connection($conexiondb)->update('update persona set img_pe=? where cod_pet=?',[$nombreFile,$cod_pe]);
        $data ['mensaje'] = 'exito';

        return $data;

    }
}