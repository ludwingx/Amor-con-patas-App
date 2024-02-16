<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use View;
use DB;

class ControllerPrincipal extends BaseController
{
    public function principal(){
        

        return View::make('home');
        
    }
     


}
