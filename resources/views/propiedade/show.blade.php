@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>{{ $propiedade->Nrodesuministro ?? 'Show Propiedade' }}</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Propiedade</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('propiedades.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Manzana:</strong>
                        {{ $propiedade->manzana }}
                    </div>
                    <div class="form-group">
                        <strong>Lote:</strong>
                        {{ $propiedade->lote }}
                    </div>
                    <div class="form-group">
                        <strong>Zona:</strong>
                        {{ $propiedade->zona }}
                    </div>
                    <div class="form-group">
                        <strong>Nrodesuministro:</strong>
                        {{ $propiedade->nrodesuministro }}
                    </div>
                    <div class="form-group">
                        <strong>Cliente Id:</strong>
                        {{ $propiedade->cliente_id }}
                    </div>
                    <div class="form-group">
                        <strong>Categoria Id:</strong>
                        {{ $propiedade->categoria_id }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $propiedade->estado }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Inscripcion:</strong>
                        {{ $propiedade->fecha_inscripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Adeudo:</strong>
                        {{ $propiedade->fecha_adeudo }}
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