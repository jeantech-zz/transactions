@extends('layouts.app')

@section('template_title')
    {{ $registration->name ?? 'Show Registration' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Registration</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registrations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Client Id:</strong>
                            {{ $registration->client_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $registration->type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Number Accounts:</strong>
                            {{ $registration->number_accounts }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
