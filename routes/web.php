<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;


Route::get('/logueo', [UserController::class,'showlogin'])->name('login');
Route::post('/identificacion', [UserController::class,'verificarlogin'])->name('identificacion');
Route::get('/cancelarusuario',function(){
    return redirect()->route('usuario.index')->with('datos','Acción Cancelada...!');
  })->name('usuario.cancelar');
Route::post('/salir', [UserController::class,'salir'])->name('logout');





Route::middleware(['auth'])->group(function(){  
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::get('personal/getimagen', [ProfileController::class,'getimagen'])->name('personal.getimagen');
    Route::resource('permiso', PermisoController::class);
    Route::resource('role', RoleController::class); 
    Route::resource('usuario', UserController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('vehiculo', VehiculoController::class);
});



Route::get('/', [UserController::class,'showlogin'])->name('welcome');

