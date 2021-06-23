@extends('layouts.app')

@section('template_title')
    Registration
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registration') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registrations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Client Id</th>
										<th>Type Id</th>
										<th>Number Accounts</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $registration)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $registration->client_name }}</td>
											<td>{{ $registration->type_name }}</td>
											<td>{{ $registration->number_accounts }}</td>

                                            <td>
                                                <form action="{{ route('registrations.destroy',$registration->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registrations.show',$registration->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registrations.edit',$registration->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $registrations->links() !!}
            </div>
        </div>
    </div>
@endsection
