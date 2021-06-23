<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('client_id') }}
            {{ Form::select('client_id', $clients ,$account->client_id,['class' => 'form-control' . ($errors->has('client_id') ? ' is-invalid' : ''), 'id' => 'client_id'])}}
          
            {!! $errors->first('client_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('type_id') }}
            {{ Form::select('type_id', $types ,$account->type_id,['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'id' => 'type_id'])}}
          
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('number_accounts') }}
            {{ Form::text('number_accounts', $account->number_accounts, ['class' => 'form-control' . ($errors->has('number_accounts') ? ' is-invalid' : ''), 'placeholder' => 'Number Accounts']) }}
            {!! $errors->first('number_accounts', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>