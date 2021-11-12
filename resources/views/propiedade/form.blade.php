<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('manzana') }}
            {{ Form::text('manzana', $propiedade->manzana, ['class' => 'form-control' . ($errors->has('manzana') ? ' is-invalid' : ''), 'placeholder' => 'Manzana']) }}
            {!! $errors->first('manzana', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lote') }}
            {{ Form::text('lote', $propiedade->lote, ['class' => 'form-control' . ($errors->has('lote') ? ' is-invalid' : ''), 'placeholder' => 'Lote']) }}
            {!! $errors->first('lote', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('zona') }}
            {{ Form::text('zona', $propiedade->zona, ['class' => 'form-control' . ($errors->has('zona') ? ' is-invalid' : ''), 'placeholder' => 'Zona']) }}
            {!! $errors->first('zona', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nrodesuministro') }}
            {{ Form::text('nrodesuministro', $propiedade->nrodesuministro, ['class' => 'form-control' . ($errors->has('nrodesuministro') ? ' is-invalid' : ''), 'placeholder' => 'Nrodesuministro']) }}
            {!! $errors->first('nrodesuministro', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::text('cliente_id', $propiedade->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::text('categoria_id', $propiedade->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $propiedade->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_inscripcion') }}
            {{ Form::text('fecha_inscripcion', $propiedade->fecha_inscripcion, ['class' => 'form-control' . ($errors->has('fecha_inscripcion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inscripcion']) }}
            {!! $errors->first('fecha_inscripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_adeudo') }}
            {{ Form::text('fecha_adeudo', $propiedade->fecha_adeudo, ['class' => 'form-control' . ($errors->has('fecha_adeudo') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Adeudo']) }}
            {!! $errors->first('fecha_adeudo', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>