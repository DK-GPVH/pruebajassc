<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidop') }}
            {{ Form::text('apellidop', $cliente->apellidop, ['class' => 'form-control' . ($errors->has('apellidop') ? ' is-invalid' : ''), 'placeholder' => 'Apellidop']) }}
            {!! $errors->first('apellidop', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidom') }}
            {{ Form::text('apellidom', $cliente->apellidom, ['class' => 'form-control' . ($errors->has('apellidom') ? ' is-invalid' : ''), 'placeholder' => 'Apellidom']) }}
            {!! $errors->first('apellidom', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechanac') }}
            {{ Form::date('fechanac', $cliente->fechanac, ['class' => 'form-control' . ($errors->has('fechanac') ? ' is-invalid' : ''), 'placeholder' => 'Fechanac']) }}
            {!! $errors->first('fechanac', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('tipo_documento_id') }}
            {{ Form::select('tipo_documento_id',$tipo_documentos, $cliente->tipo_documento_id, ['class' => 'form-control' . ($errors->has('tipo_documento_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Documento Id']) }}
            {!! $errors->first('tipo_documento_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nrodocumento') }}
            {{ Form::text('nrodocumento', $cliente->nrodocumento, ['class' => 'form-control' . ($errors->has('nrodocumento') ? ' is-invalid' : ''), 'placeholder' => 'Nrodocumento']) }}
            {!! $errors->first('nrodocumento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>