<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cliente;

class ClientesAdminController extends Controller
{
    public function crear(Request $request){
        $request->validate([
            'nombre' => 'required|min:3',
		    'apellidop' => 'required',
		    'apellidom' => 'required',
		    'fecha_nacimiento' => 'required|date|date_format:Y-m-d',
		    'tipo_documento' => 'required',
		    'numero_documento' => 'required',
		    'telefono' => 'required|min:9|max:9'
        ]);

        $client = new Cliente();
        $client->nombre = $request->nombre;
        $client->apellidop = $request->apellidop;
        $client->apellidom = $request->apellidom;
        $client->fechanac = $request->fecha_nacimiento;
        $client->tipo_documento_id = $request->tipo_documento;
        $client->nrodocumento = $request->numero_documento;
        $client->telefono = $request->telefono;
        $client->save();

        return response([
            "res" => true,
            "mensaje" => "Cliente creado correctamente",
        ],201);
    }

    public function listar_clientes(){
        $clientes = Cliente:: all();
        return response([
            "res" => true,
            "data" => $clientes
        ]);
    }

    public function show($id){
        if(Cliente::where(["id"=>$id])->exists()){
            $client = Cliente::find($id);
            return response([
                "res" => true,
                "data" => $client
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "El cliente no existe"
            ]);
        }  
    }

    public function actualizar(Request $request, $id){
        if(Cliente::where(["id" => $id])->exists()){
            
            $client = Cliente::find($id);

            $client->nombre = isset($request->nombre) ? $request->nombre : $client->nombre;
            $client->apellidop = isset($request->apellidop) ? $request->apellidop : $client->apellidop;
            $client->apellidom = isset($request->apellidom) ? $request->apellidom : $client->apellidom;
            $client->fechanac = isset($request->fecha_nacimiento) ? $request->fecha_nacimiento : $client->fechanac;
            $client->tipo_documento_id = isset($request->tipo_documento) ? $request->tipo_documento : $client->tipo_documento_id;
            $client->nrodocumento = isset($request->numero_documento) ? $request->numero_documento : $client->nrodocumento;
            $client->telefono = isset($request->telefono) ? $request->telefono : $client->telefono;
            $client->save();

            return response([
                "res" => true,
                "mensaje" => "Actualizado correctamente"
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "El cliente no existe"
            ],404);
        }
    }

    public function eliminar($id){
        if(Cliente::where(["id"=>$id])->exists()){
            $client = Cliente::where(["id" =>$id])->first();
            $client->delete();
            return response([
                "res" => true,
                "mensaje" => "El cliente a sido eliminado correctamente"
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "El cliente no existe"
            ]);
        }
    }
}
