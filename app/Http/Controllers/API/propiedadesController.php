<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propiedade;
use App\Models\Categoria;
use App\Models\Cliente;

class propiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Propiedade::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedade $id)
    {
        return response()->json([
            'res'=>true,
            'propiedades'=>$id
        ]);
    
    }


    
    public function llamarpropiedad($manzana,$lote,$nrodesuministro){
       
            
            date_default_timezone_set("America/Lima");

            if(Propiedade::wheremanzana($manzana)->wherelote($lote)->wherenrodesuministro($nrodesuministro)->exists()){
                $propiedad= Propiedade::wheremanzana($manzana)->wherelote($lote)->wherenrodesuministro($nrodesuministro)->get();

            }else{
                return response()->json([
                    "res"=> false
                ]);
            }
            
            $fecha_actual = date("Y-m-d");
            $fecha_adeudo = $propiedad[0]->{"fecha_adeudo"};
            $deudas = array();

            for($i=0;$fecha_actual>$fecha_suma=date('Y-m-d',strtotime($fecha_adeudo. ' +'.$i.' month'));++$i){
                array_push($deudas,$fecha_suma);
            }
            // return response()->json([
            //     "categoria" => $propiedad[0]->{"categoria_id"}
            // ]);
            if($propiedad[0]->{"categoria_id"} != null){
                $categoria = Categoria::whereid($propiedad[0]->{"categoria_id"})->get();
                if($propiedad[0]->{"cliente_id"} != null){
                    $cliente = Cliente::whereid($propiedad[0]->{"cliente_id"})->get();
                }else{
                    return response()->json([
                        "res" => true,    
                        "propiedad"=> [
                            "id" => $propiedad[0]->{"id"},
                            "manzana" => $propiedad[0]->{"manzana"},
                            "lote" => $propiedad[0]->{"lote"},
                            "zona" => $propiedad[0]->{"zona"},
                            "suministro" => $propiedad[0]->{"nrodesuministro"},
                            "estado" => $propiedad[0]->{"estado"},
                            "inscripcion" => $propiedad[0]->{"fecha_inscripcion"},
                            "cliente" => false,  
                            "cliente_dni" => false,
                            "categoria" => $categoria[0]->{"descripcion"},
                            "categoria_monto" => $categoria[0]->{"monto_correspondiente"},
                            "deudas" => $deudas
                        ],
                    ]);
                }
            }else{
                if($propiedad[0]->{"cliente_id"} != null){
                    $cliente = Cliente::whereid($propiedad[0]->{"cliente_id"})->get();
                }else{
                    return response()->json([
                        "res" => true,    
                        "propiedad"=> [ 
                            "id" => $propiedad[0]->{"id"},
                            "manzana" => $propiedad[0]->{"manzana"},
                            "lote" => $propiedad[0]->{"lote"},
                            "zona" => $propiedad[0]->{"zona"},
                            "suministro" => $propiedad[0]->{"nrodesuministro"},
                            "estado" => $propiedad[0]->{"estado"},
                            "inscripcion" => $propiedad[0]->{"fecha_inscripcion"},
                            "cliente" => false,  
                            "cliente_dni" => false,
                            "categoria" => false,
                            "categoria_monto" => false,
                            "deudas" => $deudas
                        ],
                    ]);
                }
                return response()->json([
                    "res" => true,    
                    "propiedad"=> [ 
                        "id" => $propiedad[0]->{"id"},
                        "manzana" => $propiedad[0]->{"manzana"},
                        "lote" => $propiedad[0]->{"lote"},
                        "zona" => $propiedad[0]->{"zona"},
                        "suministro" => $propiedad[0]->{"nrodesuministro"},
                        "estado" => $propiedad[0]->{"estado"},
                        "inscripcion" => $propiedad[0]->{"fecha_inscripcion"},
                        "cliente" => $cliente[0]->{"nombre"}." ".$cliente[0]->{"apellidop"}." ".$cliente[0]->{"apellidom"},  
                        "cliente_dni" => $cliente[0]->{"nrodocumento"},
                        "categoria" => false,
                        "categoria_monto" => false,
                        "deudas" => $deudas
                    ],
            ]);
            }

            

            
        

            return response()->json([
                    "res" => true,    
                    "propiedad"=> [
                        "id" => $propiedad[0]->{"id"}, 
                        "manzana" => $propiedad[0]->{"manzana"},
                        "lote" => $propiedad[0]->{"lote"},
                        "zona" => $propiedad[0]->{"zona"},
                        "suministro" => $propiedad[0]->{"nrodesuministro"},
                        "estado" => $propiedad[0]->{"estado"},
                        "inscripcion" => $propiedad[0]->{"fecha_inscripcion"},
                        "cliente" => $cliente[0]->{"nombre"}." ".$cliente[0]->{"apellidop"}." ".$cliente[0]->{"apellidom"},  
                        "cliente_dni" => $cliente[0]->{"nrodocumento"},
                        "categoria" => $categoria[0]->{"descripcion"},
                        "categoria_monto" => $categoria[0]->{"monto_correspondiente"},
                        "deudas" => $deudas
                    ],
            ]);
        }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
