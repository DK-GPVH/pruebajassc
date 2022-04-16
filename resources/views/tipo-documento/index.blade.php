
@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>TIPO DE DOCUMENTOS</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Tipo Documento') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('tipo-documentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('NUEVO') }}
                            </a>
                          </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    
                                    <th>Descripcion</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipoDocumentos as $tipoDocumento)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $tipoDocumento->descripcion }}</td>

                                        <td>
                                           
                                                <a class="btn btn-sm btn-primary " href="{{ route('tipo-documentos.show',$tipoDocumento->id) }}"><i class="fa fa-fw fa-eye"></i> DETALLES</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('tipo-documentos.edit',$tipoDocumento->id) }}"><i class="fa fa-fw fa-edit"></i> EDITAR</a>
                                                
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $tipoDocumentos->links() !!}
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop