@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>{{ $categoria->descripcion ?? 'Show Categoria' }}</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Categoria</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $categoria->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Monto Correspondiente:</strong>
                        {{ $categoria->monto_correspondiente }}
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