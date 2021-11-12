<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropiedadeController;
use App\Http\Controllers\Admin\HomeController;

Route::get('',[HomeController::class,'index']);

Route::resource('tipo-documentos', TipoDocumentoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('propiedades', PropiedadeController::class);