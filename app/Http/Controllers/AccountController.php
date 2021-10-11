<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Client;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts =Account::select('accounts.*','types.name As type_name','clients.names As client_name')
        ->join('types', 'types.id', '=', 'accounts.type_id')
        ->join('clients', 'clients.id', '=', 'accounts.client_id')
        ->where('type_info', 'account')
        ->paginate(15);

        return view('account.index', compact('accounts'))
            ->with('i', (request()->input('page', 1) - 1) * $accounts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = new Account();
        $clients = Client::pluck('names', 'id');
        //$types = DB::table('types')->where('type_info', 'account')->pluck('name','id');
        $types=Type::where('type_info', 'account')->pluck('name','id');


        /*$types = Type::where('type_info', '=', 'account')
        ->select('types.name','types.id')
        ->get();*/

        return view('account.create', compact('account','types','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Account::$rules);

        $account = Account::create($request->all());

        $registration=new Registration();

        $registration->client_id=$request->client_id;
        $registration->type_id=$request->type_id;
        $registration->number_accounts=$request->number_accounts;
        $registration->save();

        return redirect()->route('accounts.index')
            ->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::select('accounts.*','types.name As type_name','clients.names As client_name')
        ->join('types', 'types.id', '=', 'accounts.type_id')
        ->join('clients', 'clients.id', '=', 'accounts.client_id')
        ->where('type_info', 'account')
        ->where('accounts.id',$id)->first();
        // ->select('accounts.*','types.name As type_name','clients.names As client_name')

        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        $clients = Client::pluck('names', 'id');
        $types=Type::where('type_info', 'account')->pluck('name','id');

        return view('account.edit', compact('account','clients','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        request()->validate(Account::$rules);

        $account->update($request->all());

        return redirect()->route('accounts.index')
            ->with('success', 'Account updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transaction = Account::select('accounts.*', 'transactions.*')
        ->join('transactions', 'transactions.account_id', '=', 'accounts.id')
        ->where('accounts.id',$id)
        ->get();

        $transactionCount = $transaction->count();

        if( $transactionCount<1){
            $mensaje="No se puede eliminar tiene transaciones registradas";
        }else {
            $account = Account::find($id)->delete();
            $mensaje ='Account deleted successfully';
        }

        return redirect()->route('accounts.index')
            ->with('success', $mensaje);
    }
}
