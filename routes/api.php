<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\propiedadesController;
use App\Http\Controllers\API\clientesController;
use App\Http\Controllers\API\categoriasController;
use App\Http\Controllers\API\pagoscontroller;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ClientesAdminController;
use App\Http\Controllers\API\PropiedadesAdminController;
use App\Http\Controllers\API\CategoriasAdminController;
use App\Http\Controllers\API\TipoDocumentosAdminController; 

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
Route::get('categorias',[categoriasController::class,'index']);
Route::get('categorias/{id}',[categoriasController::class,'show']);
Route::get('estadistica',[pagoscontroller::class,'estadistica']);
Route::get('balancemensual',[pagoscontroller::class,'balancemensual']);
Route::get('balancetrimestral',[pagoscontroller::class,'balancetrimestral']);


Route::post('login',[UserController::class,'login']);

Route::group(["middleware" => ["auth:sanctum"]],function(){
    Route::get('perfil',[UserController::class,'perfil']);
    Route::get('cierre-sesion',[UserController::class,'logout']);

    Route::get('listar-clientes',[ClientesAdminController::class,'listar_clientes']);
    Route::get('listar-clientes/{id}',[ClientesAdminController::class,'show']);
    Route::post('crear-cliente',[ClientesAdminController::class,'crear']);
    Route::put('actualizar-cliente/{id}',[ClientesAdminController::class,'actualizar']);
    Route::delete('eliminar-cliente/{id}',[ClientesAdminController::class,'eliminar']);

    Route::get('listar-propiedades',[PropiedadesAdminController::class,'listar_propiedades']);
    Route::get('listar-propiedades/{id}',[PropiedadesAdminController::class,'show']);
    Route::post('crear-propiedad',[PropiedadesAdminController::class,'crear']);
    Route::put('actualizar-propiedad/{id}',[PropiedadesAdminController::class,'actualizar']);
    Route::delete('eliminar-propiedad/{id}',[PropiedadesAdminController::class,'eliminar']);

    Route::get('listar-categorias',[CategoriasAdminController::class,'listar_categorias']);
    Route::get('listar-categorias/{id}',[CategoriasAdminController::class,'show']);
    Route::post('crear-categoria',[CategoriasAdminController::class,'crear']);
    Route::put('actualizar-categoria/{id}',[CategoriasAdminController::class,'actualizar']);
    Route::delete('eliminar-categoria/{id}',[CategoriasAdminController::class,'eliminar']);

    Route::get('listar-tipo-documentos',[TipoDocumentosAdminController::class,'listar_tipo_documentos']);
    Route::get('listar-tipo-documentos/{id}',[TipoDocumentosAdminController::class,'show']);
});
