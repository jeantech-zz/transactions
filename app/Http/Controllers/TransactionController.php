<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Client;
use App\Models\Registration;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaction;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::table('transactions')
        ->join('types', 'types.id', '=', 'transactions.type_id')
        ->join('clients', 'clients.id', '=', 'transactions.client_id')
        ->join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->join('registrations', 'registrations.id', '=', 'transactions.accounts_registry_id')
        ->select('transactions.*','types.name As type_name','clients.names As client_name','registrations.number_accounts  As number_account_registration','accounts.number_accounts As number_account')
        ->where('type_info', 'transaction')
        ->paginate(15);


        return view('transaction.index', compact('transactions'))
            ->with('i', (request()->input('page', 1) - 1) * $transactions->perPage());
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showstatus(Request $request)
    {
        $account_id=$request->account_id;

        $transactions = DB::table('transactions')
        ->join('types', 'types.id', '=', 'transactions.type_id')
        ->join('clients', 'clients.id', '=', 'transactions.client_id')
        ->join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->join('registrations', 'registrations.id', '=', 'transactions.accounts_registry_id')
        ->select('transactions.*','types.name As type_name','clients.names As client_name','registrations.number_accounts  As number_account_registration','accounts.number_accounts As number_account')
        ->where('type_info', 'transaction')
        ->where('transactions.account_id', $account_id)
        ->paginate(15);


        return view('transaction.showstatus', compact('transactions'))
            ->with('i', (request()->input('page', 1) - 1) * $transactions->perPage());
    }

/**
     *Display a listing of the resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function status()
    {
        $transaction = new Transaction();
        
        
        $userId=auth()->id();
        $clients = Client::select('clients.names','clients.id')->where('user_id', $userId)->get()[0];
        $clients_name=$clients->names;
        $clients_id=$clients->id;

        $accounts = DB::table('accounts')->where('client_id', $clients_id)->pluck('number_accounts','id');
       
        return view('transaction.status', compact('transaction','clients','accounts','clients_name','clients_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction = new Transaction();
        
        $types = DB::table('types')->where('type_info', 'transaction')->pluck('name','id');
        $userId=auth()->id();
        $clients = Client::select('clients.names','clients.id')->where('user_id', $userId)->get()[0];
        $clients_name=$clients->names;
        $clients_id=$clients->id;

        $accounts = DB::table('accounts')->where('client_id', $clients_id)->pluck('number_accounts','id');
        $registrations = DB::table('registrations')->where('client_id', $clients_id)->pluck('number_accounts','id');
       

        return view('transaction.create', compact('transaction','clients','registrations','types','accounts','userId','clients_name','clients_id'));
    }

    
     /**
     * Show the form for creating a new resource account own.
     *
     * @return \Illuminate\Http\Response
     */
    public function createthird()
    {
        $transaction = new Transaction();
        
        $types = DB::table('types')->where('type_info', 'transaction')->pluck('name','id');
        $userId=auth()->id();
        $clients = Client::select('clients.names','clients.id')->where('user_id', $userId)->get()[0];
        $clients_name=$clients->names;
        $clients_id=$clients->id;

        $accounts = DB::table('accounts')->where('client_id', $clients_id)->pluck('number_accounts','id');
        $registrations = DB::table('registrations')
        ->join('accounts', 'accounts.number_accounts', '!=', 'registrations.number_accounts')
        ->where('registrations.client_id', $clients_id)
        ->where('accounts.client_id', $clients_id)
        ->pluck('registrations.number_accounts','registrations.id');
       

        return view('transaction.createthird', compact('transaction','clients','registrations','types','accounts','userId','clients_name','clients_id'));
   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Transaction::$rules);

        $transaction = Transaction::create($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$transaction = Transaction::find($id);

        $transaction = DB::table('transactions')
        ->join('types', 'types.id', '=', 'transactions.type_id')
        ->join('clients', 'clients.id', '=', 'transactions.client_id')
        ->join('accounts', 'accounts.id', '=', 'transactions.account_id')
        ->join('registrations', 'registrations.id', '=', 'transactions.accounts_registry_id')
        ->select('transactions.*','types.name As type_name','clients.names As client_name','registrations.number_accounts  As number_account_registration','accounts.number_accounts As number_account')
        ->where('type_info', 'transaction')
        ->where('transactions.id',$id)
        ->get()[0];


        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $types = DB::table('types')->where('type_info', 'transaction')->pluck('name','id');
        $userId=auth()->id();
        $clients = Client::select('clients.names','clients.id')->where('user_id', $userId)->get()[0];
        $clients_name=$clients->names;
        $clients_id=$clients->id;

        $accounts = DB::table('accounts')->where('client_id', $clients_id)->pluck('number_accounts','id');
        $registrations = DB::table('registrations')->where('client_id', $clients_id)->pluck('number_accounts','id');
       
        return view('transaction.edit', compact('transaction','clients','registrations','types','accounts','userId','clients_name','clients_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        request()->validate(Transaction::$rules);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id)->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully');
    }
}
