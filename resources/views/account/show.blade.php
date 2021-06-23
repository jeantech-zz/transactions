@extends('layouts.app')

@section('template_title')
    {{ $account->name ?? 'Show Account' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Account</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('accounts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Client Id:</strong>
                            {{ $account->client_name }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $account->type_name }}
                        </div>
                        <div class="form-group">
                            <strong>Number Accounts:</strong>
                            {{ $account->number_accounts }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
