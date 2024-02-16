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

class ControllerLogin extends BaseController
{
    public function clogin()
    {
        $email = 'email';
        Session::forget('usuariologin');
        return view::make('auth.login')->with('email', $email);
    }

    public function cregistro()
    {

        return view::make('auth.register');
    }

    public function validarUsuario(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $conexiondb = 'amor_con_patas';

        $listau = DB::connection($conexiondb)
            ->select('select id, name, email, password from users where email=? and password=?', [$email, $password]);

        if (count($listau) > 0) {
            $tk = Str::random(50);
            $dataUsers = ['token' => $tk, 'name' => $listau[0]->name];
            $id = $listau[0]->id;

            $modficaru = DB::connection($conexiondb)->update('update users set token=? where id=?', [$tk, $id]);

            $resultado = ['mensaje' => 'exito'];
            Session::put(['usuariologin' => $dataUsers]);
        } else {
            $resultado = ['mensaje' => 'error'];
        }

        return response()->json($resultado);
    }
    public function logout(Request $request)
    {
        // Limpiar información de sesión personalizada
        Session::forget('usuariologin');

        // Redirige al usuario a la página de inicio
        return redirect('/');
    }

    
    public function addUser(Request $request){

        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $estado='activo';

        $conexiondb = 'amor_con_patas';

        $newuser = DB::connection( $conexiondb)->insert('insert into users (name, email, password, estado)
         values(?,?,?,?)', [$name, $email, $password, $estado]);

         $resultado=array('mensaje'=>'exito');

         return response()->json($resultado);

     }

}
