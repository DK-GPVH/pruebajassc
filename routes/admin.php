<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropiedadeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PagoController;



Route::get('',[HomeController::class,'index'])->middleware('correo');

Route::resource('pagos', PagoController::class)->middleware('correo');
Route::resource('tipo-documentos', TipoDocumentoController::class)->middleware('correo');
Route::resource('categorias', CategoriaController::class)->middleware('correo');
Route::resource('clientes', ClienteController::class)->middleware('correo');
Route::resource('propiedades', PropiedadeController::class)->middleware('correo');
Route::post('pagos/propiedad', [PagoController::class,'propiedad'])->middleware('correo');
Route::post('pagos/obtenercliente', [PagoController::class,'obtenercliente'])->middleware('correo');
Route::post('pagos/obtenercategoria', [PagoController::class,'obtenercategoria'])->middleware('correo');
Route::post('pagos/obtenerfecha', [PagoController::class,'obtenerfecha'])->middleware('correo');
Route::put('pagos/{id}/actualizarfecha',[PagoController::class,'actualizarfecha'])->middleware('correo');


