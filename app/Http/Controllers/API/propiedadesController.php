<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propiedade;

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
        if(isset($manzana) and isset($lote) and isset($nrodesuministro)){
            $propiedad=Propiedade::wheremanzana($manzana) and Propiedade::wherelote($lote) and Propiedade::wherenrodesuministro($nrodesuministro);
            $propiedadn=$propiedad->get();
            return response()->json(
                [
                    'lista' =>$propiedadn,
                    'success' =>true
                ]
                );
            }else{
                return response()->json(
                ['success' => false]
                );
        }
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
