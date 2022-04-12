<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pago;
use Carbon\Carbon;

class pagoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function estadistica()
    {
        
        $activo = Pago::whereestado(1)->count();
        $inactivo =Pago::whereestado(0)->count();
        $suma=Pago::count();
        return response()->json(
            [
                'pago_realizado' => $activo,
                'pago_error'=>$inactivo,
                'total'=>$suma
            ]
            );
    }

    public function balancemensual(){
        $hoy= Carbon::now();
        $mes=$hoy->month;
        $año=$hoy->year;
        $mesname=$hoy->locale('es')->monthName;
        $fecha_total=Pago::whereYear('fecha_pago',$año)->whereMonth('fecha_pago',$mes)->sum('monto');
        $fecha_realizado=Pago::whereYear('fecha_pago',$año)->whereMonth('fecha_pago',$mes)->whereestado(1)->sum('monto');
        $fecha_error=Pago::whereYear('fecha_pago',$año)->whereMonth('fecha_pago',$mes)->whereestado(0)->sum('monto');

        return response()->json(
            [
                'fecha_realizado'=>$fecha_realizado,
                'fecha_error'=>$fecha_error,
                'fecha_total'=> $fecha_total,
                'nombre del mes'=>$mesname,
            ]
            );
    }



    public function balancetrimestral(){
        $hoy1= Carbon::now();
        $hoy2= Carbon::now();
        $hoy3= Carbon::now();
        $mes=$hoy1->month;
        $año=$hoy1->year;
        $mesanterior=$hoy2->subMonth()->month;
        $mestrasanterior=$hoy3->subMonths(2)->month;
        $mesname1=$hoy1->locale('es')->monthName;
        $mesname2=$hoy2->locale('es')->monthName;
        $mesname3=$hoy3->locale('es')->monthName;
        
        $fecha_realizado1=Pago::whereYear('fecha_pago',$año)->whereMonth('fecha_pago',$mes)->whereestado(1)->sum('monto');
        $fecha_realizado2=Pago::whereYear('fecha_pago',$año)->whereMonth('fecha_pago',$mesanterior)->whereestado(1)->sum('monto');
        $fecha_realizado3=Pago::whereYear('fecha_pago',$año)->whereMonth('fecha_pago',$mestrasanterior)->whereestado(1)->sum('monto');

        return response()->json(
            [
                'fecha_realizado_actual'=>$fecha_realizado1,
                'fecha_realizado_anterior'=>$fecha_realizado2,
                'fecha_realizado_trasanterior'=>$fecha_realizado3,
                'mes_actual'=>$mesname1,
                'mes_anterior'=>$mesname2,
                'mes_trasanterior'=>$mesname3
                
            ]
            );
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
    public function show($id)
    {
        //
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
