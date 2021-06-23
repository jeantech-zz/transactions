@extends('layouts.app')

@section('template_title')
    {{ $client->name ?? 'Show Client' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Client</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Names:</strong>
                            {{ $client->names }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $client->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $client->type_name }}
                        </div>
                        <div class="form-group">
                            <strong>Number Id:</strong>
                            {{ $client->number_ID }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $client->user_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
