@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>{{ $tipoDocumento->descripcion ?? 'Show Tipo Documento' }}</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Detalles del Tipo de Documento</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('tipo-documentos.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $tipoDocumento->descripcion }}
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