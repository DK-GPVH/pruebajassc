@extends('adminlte::page')

@section('title', 'ADMIN')
@section('head')
<meta name="csrf-token" content="{{ csrf_token()}}">
@stop
@section('content_header')
    <h1>PAGOS</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pago') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pagos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Propiedad Id</th>
										<th>Fecha Pago</th>
										<th>Descripcion</th>
										<th>Tipo Pago</th>
										<th>Estado</th>
										<th>Monto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pago->propiedad_id }}</td>
											<td>{{ $pago->fecha_pago }}</td>
											<td>{{ $pago->descripcion }}</td>
											<td>{{ $pago->tipo_pago }}</td>
											<td>{{ $pago->estado }}</td>
											<td>{{ $pago->monto }}</td>

                                            <td>
                                                <form action="{{ route('pagos.destroy',$pago->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pagos.show',$pago->id) }}"><i class="fa fa-fw fa-eye"></i> Detalles</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pagos.edit',$pago->id) }}"><i class="fa fa-fw fa-edit"></i>Editar Desc.</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Cancelar pago</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pagos->links() !!}
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
