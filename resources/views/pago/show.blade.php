@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1></h1>
@stop
@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">DETALLES PAGO</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pagos.index') }}"> REGRESAR</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Propiedad:</strong>
                            @if($pago->propiedad_id== null)
                            PROPIEDAD ELIMINADA
                            @else
                            {{$pago->propiedade->nrodesuministro}}
                            MANZANA : {{$pago->propiedade->manzana}}
                            LOTE : {{$pago->propiedade->lote}}
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Fecha Pago:</strong>
                            {{ $pago->fecha_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $pago->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Pago:</strong>
                            @if($pago->tipo_pago==1)
                            EFECTIVO
                            @elseif($pago->tipo_pago==2)
                            TRANSFERENCIA
                            @else
                            NO-DEFINIDO
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($pago->estado==0)
                            PAGO_ERROR
                            @elseif($pago->estado==1)
                            PAGO_REALIZADO
                            @else
                            NO-DEFINIDO
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $pago->monto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
    
