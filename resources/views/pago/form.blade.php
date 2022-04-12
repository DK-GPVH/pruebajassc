<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('propiedad_id') }}
            {{ Form::select('propiedad_id',$casas, $pago->propiedad_id, ['class' => 'form-control' . ($errors->has('propiedad_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad Id']) }}
            {!! $errors->first('propiedad_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    
        <div class="form-group border">
            {{Form::label('<---Datos de la propiedad--->')}}    
            <br>
               <strong>
                   Manzana : 
                   <p id="Manzana"></p>
                </strong> 
                <strong>
                    Lote : 
                    <p id="Lote"></p>
                 </strong>
                 <strong>
                    Zona : 
                    <p id="Zona"></p>
                 </strong> 
                 <strong>
                    Estado : 
                    <p id="Estado" >
                        
                    </p>
                 </strong>      
                 <strong>
                     Cliente : 
                     <button style="display:none" class="fa" type="button" id="Cliente_id">&#xf2a8; Observar</button>
                    
                     <p id="cliente"></p> 
                        
                </strong>
                <strong>
                    Categoria :
                    <button style="display:none" class="fa" type="button" id="Categoria_id">&#xf058; Verificar</button> 
                    
                   <p id="categoria"></p>    
               </strong>
               <strong>MES A PAGAR:
                   <p id="fecha_adeudo"></p>
               </strong>
               <strong>LIMITE DE FECHA A PAGAR:
                <p id="fecha"></p>
               </strong>
                            
              
        </div>
        


        <div class="form-group">
            {{ Form::label('fecha_pago') }}
            {{ Form::hidden('fecha_pago',$fechaactual, $pago->fecha_pago, ['class' => 'form-control' . ($errors->has('fecha_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Pago']) }}
            {!! $errors->first('fecha_pago', '<div class="invalid-feedback">:message</p>') !!}
                <p>
                    {{$fechaactual}}
                </p>
            </div>
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $pago->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_pago') }}
            <br>
            {{ Form::label('EFECTIVO')}}
            {{ Form::radio('tipo_pago','1',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('tipo_pago') ? ' is-invalid' : '')])}}
            {{Form::label('TRANSFERENCIA')}}
            {{ Form::radio('tipo_pago','2',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('tipo_pago') ? ' is-invalid' : '')])}}
            {!! $errors->first('tipo_pago', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::hidden('estado','1',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::hidden('monto', $pago->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="text-danger">El monto no ha sido encontrado por favor verifique la categoria</p>') !!}
                <p id="MostrarMonto"></p>
        </div>
        

        @if ($message = Session::get('success'))
        <div class="modal" tabindex="-1" style="display:block" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">OPERACION REALIZADA</h5>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success">
                        <strong>NRO DE OPERACION :
                            <p>{{$message->id}}</p>
                        </strong>
                        <strong>FECHA DE OPERACION:
                            <p>{{$message->fecha_pago}}</p>
                        </strong>
                        <strong>MONTO:
                            <p> S/. {{$message->monto}}</p>
                        </strong>
                        <strong>Tipo Pago :
                            @if($message->tipo_pago==1)
                            <p>Efectivo</p>
                            @elseif($message->tipo_pago==2)
                            <p>Transferencia</p>
                            @endif
                        </strong>
                        <strong>Proximo inicio de deuda:
                            <p id="insertarinput"></p> 
                            
                        </strong>
                        <input  type="number" id="idpropiedad" value="{{$message->propiedad_id}}" readonly  class="text-primary" style="display:none">
                        <button id="nuevafecha" value="" style="display:none"></button>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-primary" value="{{$message->propiedad_id}}" id="Continuarpago">Continuar</a>
                  <a type="button" href="./" class="btn btn-primary" id="Confirmarpago"  style="display:none" >Confirmar</a>
                </div>
              </div>
            </div>
          </div>
                        
                             
        @endif
        

    </div>
    
    <div class="box-footer mt20">
        <button type="submit"  class="btn btn-primary">Submit</button>
    </div>
    
</div>