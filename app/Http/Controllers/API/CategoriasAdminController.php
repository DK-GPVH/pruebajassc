<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriasAdminController extends Controller
{
    public function crear(Request $request){
        $request->validate([
            'descripcion' => 'required',
            'monto_correspondiente' => 'required'
        ]);

        $category = new Categoria();
        $category->descripcion = $request->descripcion;
        $category->monto_correspondiente = $request->monto_correspondiente;
        $category->save();

        return response([
            "res" => true,
            "mensaje" => "Categoria creada correctamente",
        ],201);
    }

    public function listar_categorias(){
        $category = Categoria:: all();
        return response([
            "res" => true,
            "data" => $category
        ]);
    }

    public function show($id){
        if(Categoria::where(["id"=>$id])->exists()){
            $category = Categoria::find($id);
            return response([
                "res" => true,
                "data" => $category
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "La categoria no existe"
            ]);
        }  
    }

    public function actualizar(Request $request, $id){
        if(Categoria::where(["id" => $id])->exists()){
            
            $category = Categoria::find($id);

            $category->descripcion = isset($request->descripcion) ? $request->descripcion : $category->descripcion;
            $category->monto_correspondiente = isset($request->monto_correspondiente) ? $request->monto_correspondiente : $category->monto_correspondiente;
            $category->save();

            return response([
                "res" => true,
                "mensaje" => "Actualizado correctamente"
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "La categoria no existe"
            ],404);
        }
    }

    public function eliminar($id){
        if(Categoria::where(["id"=>$id])->exists()){
            $category = Categoria::where(["id" =>$id])->first();
            $category->delete();
            return response([
                "res" => true,
                "mensaje" => "La categoria a sido eliminado correctamente"
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "La categoria no existe"
            ]);
        }
    }
}
