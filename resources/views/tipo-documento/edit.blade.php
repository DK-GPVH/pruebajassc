@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>EDITAR TIPO DE DOCUMENTO</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Update Tipo Documento</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tipo-documentos.update', $tipoDocumento->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('tipo-documento.form')

                    </form>
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