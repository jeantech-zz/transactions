@extends('layouts.app')

@section('template_title')
    Transaction
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Transaction') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('  Account Own') }}
                                </a>
                                <a href="{{ route('transactions.createthird') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('  Account third') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Client</th>
										<th>Type Transaction</th>
                                        <th>Account Id</th>
										<th>Accounts Registry</th>
										<th>Value</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $transaction->client_name}}</td>
                                            <td>{{ $transaction->type_name }}</td>
											<td>{{ $transaction->number_account }}</td>
											<td>{{ $transaction->number_account_registration }}</td>
											<td>{{ $transaction->value }}</td>

                                            <td>
                                            <a class="btn btn-sm btn-primary " href="{{ route('transactions.show',$transaction->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $transactions->links() !!}
            </div>
        </div>
    </div>
@endsection
