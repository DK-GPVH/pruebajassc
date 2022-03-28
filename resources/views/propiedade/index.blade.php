@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>PROPIEDADES</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Propiedade') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('propiedades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Create New') }}
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
                                    
                                    <th>Manzana</th>
                                    <th>Lote</th>
                                    <th>Zona</th>
                                    
                                    <th>DNI Cliente</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Fecha Inscripcion</th>
                                    <th>Fecha Adeudo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($propiedades as $propiedade)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ ($propiedade->manzana) }}</td>
                                        <td>{{ $propiedade->lote }}</td>
                                        <td>{{ $propiedade->zona }}</td>
                                        
                                        @if($propiedade->cliente_id==null)
                                        <td class="text-danger">No tiene propietario</td>
                                        @else
                                        <td>{{ $propiedade->cliente->nombre}}</td>
                                        @endif

                                        @if($propiedade->categoria_id==null)
                                        <td class="text-danger">No tiene una categoria asignada</td>
                                        @else
                                        <td>{{ $propiedade->categoria->descripcion }}</td>
                                        @endif
                                        
                                            @if($propiedade->estado==1)
                                            <td class="text-success">ACTIVO</td>
                                            @else
                                            <td class="text-danger">INACTIVO</td>
                                            @endif
                                        

                                        <td>{{ $propiedade->fecha_inscripcion }}</td>
                                        <td>{{ $propiedade->fecha_adeudo }}</td>

                                        <td>
                                            <form action="{{ route('propiedades.destroy',$propiedade->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('propiedades.show',$propiedade->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('propiedades.edit',$propiedade->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $propiedades->links() !!}
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