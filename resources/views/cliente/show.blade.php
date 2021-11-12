@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>{{ $cliente->nombre ?? 'Show Cliente' }}</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Cliente</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $cliente->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Apellido Paterno:</strong>
                        {{ $cliente->apellidop }}
                    </div>
                    <div class="form-group">
                        <strong>Apellido Materno:</strong>
                        {{ $cliente->apellidom }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha de nacimiento:</strong>
                        {{ $cliente->fechanac }}
                    </div>
                    <div class="form-group">
                        <strong>Tipo Documento:</strong>
                        {{ $cliente->tipoDocumento->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Numero de documento:</strong>
                        {{ $cliente->nrodocumento }}
                    </div>
                    <div class="form-group">
                        <strong>Telefono/Celular:</strong>
                        {{ $cliente->telefono }}
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