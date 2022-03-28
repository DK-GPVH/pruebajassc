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
                    <p id="Estado">
                        <p id="Advertencia"></p>
                    </p>
                 </strong>      
                 <strong>
                     Cliente : 
                     <select class="fa"  type="button" id="Cliente_id"></select>
                    <p id="cliente"></p> 
                        
                </strong>
                <strong>
                    Categoria : 
                    <select class="fa"  type="button" id="Categoria_id"></select>
                   <p id="categoria"></p>    
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
            {{ Form::text('monto', $pago->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>