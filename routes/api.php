<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\propiedadesController;
use App\Http\Controllers\API\clientesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('propiedades',[propiedadesController::class,'index']);
Route::get('propiedades/{id}',[propiedadesController::class,'show']);
Route::get('clientes',[clientesController::class,'index']);
Route::get('clientes/{id}',[clientesController::class,'show']);
Route::get('propiedades/{manzana}/{lote}/{nrodesuministro}',[propiedadesController::class,'llamarpropiedad']);


