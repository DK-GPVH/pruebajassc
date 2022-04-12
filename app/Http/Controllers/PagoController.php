<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Propiedade;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\Categoria;

/**
 * Class PagoController
 * @package App\Http\Controllers
 */
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     
    public function index()
    {
        $pagos = Pago::paginate();

        return view('pago.index', compact('pagos'))
            ->with('i', (request()->input('page', 1) - 1) * $pagos->perPage());
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pago();
        $casas= Propiedade::pluck('nrodesuministro','id');
        $fechaactual=Carbon::now();
        $display="none";
        return view('pago.create', compact('pago','casas','fechaactual','display'));
    }

    /*FUNCTION FOR GET PROPIEDAD DATES*/
    
    public function propiedad(Request $request){
        if(isset($request->texto)){
            $propiedad=Propiedade::whereid($request->texto)->get();
            return response()->json(
                [
                    'lista' =>$propiedad,
                    'success' =>true
                ]
                );
        }else{
            return response()->json([
                'success' =>false
            ]);
        }
    }


    public function obtenercliente(Request $request){
        if(isset($request->texto)){
            $cliente=Cliente::whereid($request->texto)->get();
            return response()->json(
                [
                    'lista' =>$cliente,
                    'success' =>true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' =>false
                ]
                );
        }
    }

    public function obtenercategoria(Request $request){
        if(isset($request->texto)){
            $categoria= Categoria::whereid($request->texto)->get();
            return response()->json(
                [
                    'lista' =>$categoria,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success'=>false
                ]
                );
        }
    }
    
    public function obtenerfecha(Request $request){
        if(isset($request->texto)){
            $propiedad=Propiedade::find($request->texto);
            $fechapro=Carbon::parse($propiedad->fecha_adeudo);
            $mespago=strtoupper($fechapro->locale('es')->monthName);
            $fecha=$fechapro->addMonths(1)->format('Y-m-d');
        
            return response()->json(
                [
                    'fecha'=>[
                        'fecha'=>$fecha
                    ],
                    'nombre'=>[
                        'nombre'=>$mespago
                    ],
                    'success' =>true
                ]
                );
        }else{
            return response()->json(
                [
                    'success'=> false
                ]
                );
        }
    }

    public function actualizarfecha($id,Request $request){
        
        $propiedad = Propiedade::where("id",$id)->update([
            "fecha_adeudo"=>$request->fecha_adeudo
        ]);
        return response()->json([
            "success"=>"Actualizacion con exito",
        ]);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pago::$rules);
    
        $pago = Pago::create($request->all());
        

        return redirect()->back()
            ->with('success',$pago);

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pago::find($id);

        return view('pago.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);

        return view('pago.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pago $pago
     * @return \Illuminate\Http\Response
     */

     
    public function update(Request $request, Pago $pago)
    {
        request()->validate(Pago::$rules);

        $pago->update($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);
        if($pago->estado==0){
            return redirect()->route('pagos.index')
            ->with('success', 'El pago ya fue cancelado no se podra realizar esta operacion nuevamente');
        }else{
        $estado=0;
        $fecha = Carbon::parse($pago->propiedade->fecha_adeudo);
        $fechaactualizada=$fecha->subMonths(1);
        $fechaactualizada2=$fechaactualizada->format('Y-m-d');
        Propiedade::where("id",$pago->propiedad_id)->update([
            "fecha_adeudo"=> $fechaactualizada2
        ]);
        Pago::where("id",$id)->update([
            "estado"=>$estado
        ]);
        return redirect()->route('pagos.index')
            ->with('success', 'El pago ha sido cancelado con exito');
        }
             
    }
}
