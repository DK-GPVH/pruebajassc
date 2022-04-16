<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('propiedad_id') }}
            {{ Form::label('propiedad_id', $pago->propiedade->nrodesuministro, ['class' => 'form-control' . ($errors->has('propiedad_id') ? ' is-invalid' : ''), 'placeholder' => 'Propiedad Id']) }}
            {!! $errors->first('propiedad_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    

        <div class="form-group">
            {{ Form::label('fecha_pago') }}
            {{ Form::date('fecha_pago', $pago->fecha_pago, ['readonly','class' => 'form-control' . ($errors->has('fecha_pago') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Pago']) }}
            {!! $errors->first('fecha_pago', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $pago->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            @if($pago->tipo_pago == 1)
                {{ Form::label('EFECTIVO')}}
                {{ Form::radio('tipo_pago','1',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('tipo_pago') ? ' is-invalid' : '')])}}
            @else
            {{Form::label('TRANSFERENCIA')}}
            {{ Form::radio('tipo_pago','2',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('tipo_pago') ? ' is-invalid' : '')])}}
            {!! $errors->first('tipo_pago', '<div class="invalid-feedback">:message</p>') !!}
            @endif
        </div>

        <div class="form-group">
            @if ($pago->estado==1)
            {{Form::label('PAGO ACTIVO')}}
            {{ Form::radio('estado','1',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
            @else
            {{ Form::label('PAGO CANCELADO')}}
            {{ Form::radio('estado','0',$pago->tipo_pago, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
            @endif        
        </div>

        
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $pago->monto, ['readonly','class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </div>
</div>