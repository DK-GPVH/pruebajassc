@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1><strong>MANZANA:</strong>{{ $propiedade->manzana ?? 'Show Propiedade' }}<br><strong>LOTE :</strong>{{ $propiedade->lote ?? 'Show Propiedade' }}</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">DETALLES PROPIEDAD</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('propiedades.index') }}"> Regresar</a>
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
                    @if($propiedade->cliente_id==null)
                    <div class="form-group">
                        <strong>Cliente :</strong>
                        <a class="text-danger">No tiene propietario</a></div>
                    @else
                    <div class="form-group">
                        <strong>Cliente:</strong>
                        {{ $propiedade->cliente->nombre }}
                        {{ $propiedade->cliente->apellidop }}
                        {{ $propiedade->cliente->apellidom }}
                    </div>
                    @endif
                    @if($propiedade->categoria_id==null)
                    <div class="form-group">
                    <strong>Categoria :</strong>
                     <a class="text-danger">No tiene una categoria asignada</a> 
                    </div>
                    @else
                    <div class="form-group">
                        <strong>Categoria :</strong>
                        {{ $propiedade->categoria->descripcion }}
                    </div>
                    @endif
                    <div class="form-group">
                        <strong>Estado:</strong>
                        @if($propiedade->estado==1)
                        <a class="text-success">ACTIVO</a>
                        @else
                        <a class="text-danger">INACTIVO</a>
                        @endif
                        
                        
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
                <strong>DEUDAS : </strong>
                @for($fechadeuda=\Carbon\Carbon::parse($propiedade->fecha_adeudo);$fechaactual>$fechadeuda;$fechadeuda)
                     <div  class="card bg-secondary">
                        <div style="margin:0.5em;">
                            <strong>MES CORRESPONDIENTE:</strong>
                            <div>{{strtoupper($fechadeuda->locale('es')->monthName)}}</div>   
                            <strong> FECHA A PAGAR: </strong>
                            <div>{{$fechadeuda->addMonths(1)->format('Y-m-d')}}</div>   
                        </div>
                     </div>     
                @endfor 
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