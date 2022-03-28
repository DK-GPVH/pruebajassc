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
                            <span class="card-title">Show Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Propiedad Id:</strong>
                            {{ $pago->propiedad_id }}
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
                            {{ $pago->tipo_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pago->estado }}
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
    
