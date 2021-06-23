<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('names') }}
            {{ Form::text('names', $client->names, ['class' => 'form-control' . ($errors->has('names') ? ' is-invalid' : ''), 'placeholder' => 'Names']) }}
            {!! $errors->first('names', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_name') }}
            {{ Form::text('last_name', $client->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_id') }}
            {{ Form::select('type_id', $types ,$client->type_id,['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'id' => 'type_id'])}}
          
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('number_ID') }}
            {{ Form::text('number_ID', $client->number_ID, ['class' => 'form-control' . ($errors->has('number_ID') ? ' is-invalid' : ''), 'placeholder' => 'Number Id']) }}
            {!! $errors->first('number_ID', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::select('user_id', $users ,$client->user_id,['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'id' => 'user_id'])}}
          
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>