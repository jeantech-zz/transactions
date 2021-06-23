<div class="box box-info padding-1">
    <div class="box-body">
        
      <!--  <div class="form-group">
            {{ Form::label('client_id') }}
            {{ Form::select('client_id', $clients ,$transaction->client_id,['class' => 'form-control' . ($errors->has('client_id') ? ' is-invalid' : ''), 'id' => 'client_id'])}}
          
            {!! $errors->first('client_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>-->
        <div class="form-group">
        {{ Form::hidden('client_id', $clients_id, array('id' => 'client_id')) }}
        </div>
        <div class="form-group">
            {{ Form::label('client_id') }}
            {{ Form::text('client_name', $clients_name, ['class' => 'form-control' . ($errors->has('client_id') ? ' is-invalid' : ''), 'placeholder' => 'client_id']) }}
            {!! $errors->first('client_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_id') }}
            {{ Form::select('type_id', $types ,$transaction->type_id,['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'id' => 'type_id'])}}
          
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('account_id') }}
            {{ Form::select('account_id', $accounts ,$transaction->account_id,['class' => 'form-control' . ($errors->has('account_id') ? ' is-invalid' : ''), 'id' => 'account_id'])}}
          
            {!! $errors->first('account_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('accounts_registry_id') }}
            {{ Form::select('accounts_registry_id', $registrations ,$transaction->accounts_registry_id,['class' => 'form-control' . ($errors->has('accounts_registry_id') ? ' is-invalid' : ''), 'id' => 'accounts_registry_id'])}}
          
            {!! $errors->first('accounts_registry_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('value') }}
            {{ Form::text('value', $transaction->value, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Value']) }}
            {!! $errors->first('value', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Transfera</button>

    </div>
    <div class="box-footer mt20">
       <!-- <button type="cancel" class="btn btn-primary" name="cancelar" onclick="{{ route('transactions.index') }}">Cancelar</button>-->

    </div>
</div>