@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>CLIENTES</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Clientes') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Agregar Cliente') }}
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
                                    <th>N°</th>
                                    
                                    <th>Nombre</th>
                                    <th>Apellido P.</th>
                                    <th>Apellido M.</th>
                                    <th>Fecha Nac.</th>
                                    <th>Tipo Documento</th>
                                    <th>Nro Documento</th>
                                    <th>Telefono/Celular</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->apellidop }}</td>
                                        <td>{{ $cliente->apellidom }}</td>
                                        <td>{{ $cliente->fechanac }}</td>
                                        <td>{{ $cliente->tipoDocumento->descripcion}}</td>
                                        <td>{{ $cliente->nrodocumento }}</td>
                                        <td>{{ $cliente->telefono }}</td>

                                        <td>
                                            <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> Detalles</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $clientes->links() !!}
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