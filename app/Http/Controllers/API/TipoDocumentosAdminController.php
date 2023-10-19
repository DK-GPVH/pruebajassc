<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TipoDocumento;

class TipoDocumentosAdminController extends Controller
{
    public function listar_tipo_documentos(){
        $documents = TipoDocumento::all();
        return response([
            "res" => true,
            "data" => $documents
        ]);
    }

    public function show($id){
        if(TipoDocumento::where(["id"=>$id])->exists()){
            $document = TipoDocumento::find($id);
            return response([
                "res" => true,
                "data" => $document
            ]);
        }else{
            return response([
                "res" => false,
                "mensaje" => "El tipo de documento no existe"
            ]);
        }
    }
}
