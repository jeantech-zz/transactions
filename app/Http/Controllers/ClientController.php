<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\DB;





/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$clients = Client::paginate();

         $clients = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.user_id')
        ->join('types', 'types.id', '=', 'clients.type_id')
        ->select('clients.*', 'users.name As user_name','types.name As type_name')
        ->where('type_info', 'identification')
        ->paginate(15);

        return view('client.index', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * $clients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $users = User::pluck('name', 'id');
       // $types = Type::pluck('name', 'id');
        $types = DB::table('types')->where('type_info', 'identification')->pluck('name','id');


        $selectedID = 2;

        return view('client.create', compact('client','users','types'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Client::$rules);

        $client = Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        $client = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.user_id')
        ->join('types', 'types.id', '=', 'clients.type_id')
        ->select('clients.*', 'users.name As user_name','types.name As type_name')
        ->where('type_info', 'identification')
        ->where('clients.id',$id)
        ->limit(1)->get();
       // ->get()[0];

        return view('client.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $users = User::pluck('name', 'id');
       // $types = Type::pluck('name', 'id');
        $types = DB::table('types')->where('type_info', 'identification')->pluck('name','id');
        $selectedID = 2;

        return view('client.edit', compact('client','users', 'types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        request()->validate(Client::$rules);

        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = Client::find($id)->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
