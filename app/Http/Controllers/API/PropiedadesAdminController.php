<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Propiedade; 

class PropiedadesAdminController extends Controller
{
    public function crear(Request $request){
        $request->validate([
            'manzana' => 'required',
		    'lote' => 'required',
		    'zona' => 'required',
		    'numero_suministro' => 'required',
		    'estado' => 'required',
		    'fecha_inscripcion' => 'required|date|date_format:Y-m-d',
		    'fecha_adeudo' => 'required|date|date_format:Y-m-d',
        ]);

        $property = new Propiedade();
        $property->manzana = $request->manzana;
        $property->lote = $request->lote;
        $property->zona = $request->zona;
        $property->nrodesuministro = $request->numero_suministro;
        $property->estado = $request->estado;
        $property->fecha_inscripcion = $request->fecha_inscripcion;
        $property->fecha_adeudo = $request->fecha_adeudo;
        $property->cliente_id = $request->cliente_id;
        $property->categoria_id = $request->categoria_id;
        $property->save();

        return response([
            "res" => true,
            "mensaje" => "Propiedad creado correctamente"
        ],201);
    }

    public function listar_propiedades(){
        $property = Propiedade:: all();
        return response([
            "res" => true,
            "data" => $property
        ]);
    }

    public function show($id){
        if(Propiedade::where(["id"=>$id])->exists()){
            $property = Propiedade::find($id);
            return response([
                "res" => true,
                "data" => $property
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "La propiedad no existe"
            ]);
        }  
    }

    public function actualizar(Request $request, $id){
        if(Propiedade::where(["id" => $id])->exists()){
            
            $property = Propiedade::find($id);

            $property->manzana = isset($request->manzana) ? $request->manzana:$property->manzana;
            $property->lote = isset($request->lote) ? $request->lote : $property->lote;
            $property->zona = isset($request->zona) ? $request->zona : $property->zona;
            $property->nrodesuministro = isset($request->numero_suministro) ? $request->numero_suministro : $property->nrodesuministro;
            $property->estado = isset($request->estado) ? $request->estado : $property->estado;
            $property->fecha_inscripcion = isset($request->fecha_inscripcion) ? $request->fecha_inscripcion : $property->fecha_inscripcion;
            $property->fecha_adeudo = isset($request->fecha_adeudo) ? $request->fecha_adeudo : $property->fecha_adeudo;
            $property->cliente_id = $request->cliente_id;
            $property->categoria_id = $request->categoria_id;
            $property->save();

            return response([
                "res" => true,
                "mensaje" => "Actualizado correctamente"
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "La propiedad no existe"
            ],404);
        }
    }

    public function eliminar($id){
        if(Propiedade::where(["id"=>$id])->exists()){
            $client = Propiedade::where(["id" =>$id])->first();
            $client->delete();
            return response([
                "res" => true,
                "mensaje" => "La propiedad a sido eliminado correctamente"
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "La propiedad no existe"
            ]);
        }
    }
}
