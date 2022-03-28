<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropiedadeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PagoController;


Route::get('',[HomeController::class,'index']);
Route::resource('pagos', PagoController::class);
Route::resource('tipo-documentos', TipoDocumentoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('propiedades', PropiedadeController::class);
Route::post('pagos/propiedad', PagoController::class,'propiedad');
Route::post('pagos/obtenercliente', [PagoController::class,'obtenercliente']);
Route::post('pagos/obtenercategoria', [PagoController::class,'obtenercategoria']);
Route::post('pagos/obtenerfecha', [PagoController::class,'obtenerfecha']);
Route::put('pagos/{id}/actualizarfecha',[PagoController::class,'actualizarfecha']);
