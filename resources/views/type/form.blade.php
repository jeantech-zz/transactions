<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('type_info') }}
            {{ Form::text('type_info', $type->type_info, ['class' => 'form-control' . ($errors->has('type_info') ? ' is-invalid' : ''), 'placeholder' => 'Type Info']) }}
            {!! $errors->first('type_info', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $type->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>