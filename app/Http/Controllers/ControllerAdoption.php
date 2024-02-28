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
        return view('pets.adoption', ['id' => $id]);
    }

    public function submit(Request $request)
    {
        // Lógica para procesar y almacenar la solicitud de adopción
        // Puedes acceder a los datos del formulario a través de $request->input('nombre_del_campo')

        // Después de procesar la solicitud, redirige según sea necesario
        return redirect()->route('home')->with('success', 'Solicitud de adopción enviada correctamente.');
    }
    public function form(Request $request){
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
    public function saveAdopt(Request $request){
        
    }
}