<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerPrincipal;
use App\Http\Controllers\ControllerUsers;
use App\Http\Controllers\ControllerJugadores;
use App\Http\Controllers\ControllerPets;
use App\Http\Controllers\ControllerAdoption;
use App\Http\Controllers\ControllerMascota;

Route::get('', function () {
    return view('home');
});
//navbar
Route::get('home', function () {
    return view('home');
});
Route::get('nokill', function () {
    return view('/layouts.nokill');
})->name('nokill');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

//auth
Route::get('logout', [ControllerLogin::class, 'logout']);
Route::get('ingreso', [ControllerLogin::class, 'clogin']);
Route::get('registro',[ControllerLogin::class,'cregistro']);
Route::post('validarlogin',[ControllerLogin::class,'validarUsuario']);
//user
Route::post('newUser', [ControllerUsers::class, 'addUser']);

//admin
Route::get('principal', [ControllerPrincipal::class, 'principal']);
//dashboard 
Route::get('ruserlist',[ControllerUsers::class, 'cListUsers']); //jsUserList
Route::get('listarJugadores', [ControllerJugadores::class, 'cListJugadores']);//jugadoreslist
Route::get('listarMascotas', [ControllerMascota::class, 'vlistarmascota']);//jsListarMascota



//adopciones
Route::get('rShowAdoptionList', [ControllerPets::class, 'cShowAdoptionList']); 

Route::get('/adoptions',[ControllerPets::class, 'index'])->name('adoptions.index');
Route::get('/adoption-form/{pet_id}',[ControllerAdoption::class, 'showForm'])->name('adoption.form');

Route::post('/adoption-form/{id}',[ControllerAdoption::class, 'form'])->name('adoption.submit');
//pets
Route::get('/pet/{id}',  [ControllerPets::class, 'show'])->name('pet.show');
//adopcion
Route::get('adoptionForm',  [ControllerAdoption::class, 'cAdoptionForm']);
Route::get('saveAdopt', [ControllerAdoption::class, 'saveAdopt']);

Route::get('profile-pet',[ControllerPets::class, 'cProfilePet']);
//pdf
Route::get('pdfpets',  [ControllerPets::class, 'cexportlistpdf']);

//mascota
Route::get('agregarmascota', [ControllerMascota::class, 'cNuevaMascota']);
Route::post('newMascota',[ControllerMascota::class, 'agregarMascota']);
Route::get('filtrarMascotas', [ControllerMascota::class, 'filtrarMascotas']);
Route::get('rEditarMascota', [ControllerMascota::class, 'cEditarMascota']);

Route::post('updateEditPet', [ControllerMascota::class, 'updateEditPet']);
Route::post('rDesactivarMascota', [ControllerMascota::class, 'cDesactivarMascota']);
