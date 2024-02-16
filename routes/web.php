<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerPrincipal;
use App\Http\Controllers\ControllerUsers;

Route::get('/', function () {
    return view('home');
});
Route::get('home', function () {
    return view('home');
});
Route::get('login', function () {
    return view('auth.login');
})->name('login');


//user
Route::get('logout', [ControllerLogin::class, 'logout']);
Route::get('ingreso', [ControllerLogin::class, 'clogin']);
Route::get('registro',[ControllerLogin::class,'cregistro']);
Route::post('validarlogin',[ControllerLogin::class,'validarUsuario']);
Route::get('principal',[ControllerPrincipal::class,'principal']);
Route::get('/userslist', [ControllerUsers::class, 'listaUsuarios']);
Route::post('newUser', [ControllerUsers::class, 'addUser']);

//adopciones
Route::get('adopciones', function () {
    return view('layouts.adopciones');
})->name('adopciones');


