@extends('layouts.app')

@section('template_title')
  Transaction Own
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"> Transaction Own</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('transactions.showstatus') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                            <div class="box-body">
                                <div class="form-group">
                                    {{ Form::label('account_id') }}
                                    {{ Form::select('account_id', $accounts ,$transaction->account_id,['class' => 'form-control' . ($errors->has('account_id') ? ' is-invalid' : ''), 'id' => 'account_id'])}}
                                
                                    {!! $errors->first('account_id', '<div class="invalid-feedback">:message</p>') !!}
                                </div>

                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">View</button>

                            </div>
                            <div class="box-footer mt20">
                            <!-- <button type="cancel" class="btn btn-primary" name="cancelar" onclick="{{ route('transactions.index') }}">Cancelar</button>-->

                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



