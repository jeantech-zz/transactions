@extends('layouts.app')

@section('template_title')
    {{ $transaction->name ?? 'Show Transaction' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Transaction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Client Id:</strong>
                            {{ $transaction->client_name }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $transaction->type_name }}
                        </div>
                        <div class="form-group">
                            <strong>Account:</strong>
                            {{ $transaction->number_account }}
                        </div>                     
                        
                        <div class="form-group">
                            <strong>Accounts Registry :</strong>
                            {{ $transaction->number_account_registration }}
                        </div>
                        <div class="form-group">
                            <strong>Value:</strong>
                            {{ $transaction->value }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
