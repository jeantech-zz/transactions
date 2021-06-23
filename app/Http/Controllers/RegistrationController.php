<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Client;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

/**
 * Class RegistrationController
 * @package App\Http\Controllers
 */
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $registrations = Registration::paginate();

       $registrations = DB::table('registrations')
       ->join('types', 'types.id', '=', 'registrations.type_id')
       ->join('clients', 'clients.id', '=', 'registrations.client_id')
       ->select('registrations.*','types.name As type_name','clients.names As client_name')
       ->where('type_info', 'account')
       ->paginate(15);

        return view('registration.index', compact('registrations'))
            ->with('i', (request()->input('page', 1) - 1) * $registrations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registration = new Registration();
        $clients = Client::pluck('names', 'id');
        $types = DB::table('types')->where('type_info', 'account')->pluck('name','id');

        return view('registration.create', compact('registration','types','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Registration::$rules);

        $registration = Registration::create($request->all());

        return redirect()->route('registrations.index')
            ->with('success', 'Registration created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$registration = Registration::find($id);
        $registration = DB::table('registrations')
        ->join('types', 'types.id', '=', 'registrations.type_id')
        ->join('clients', 'clients.id', '=', 'registrations.client_id')
        ->select('registrations.*','types.name As type_name','clients.names As client_name')
        ->where('type_info', 'account')
        ->where('registrations.id',$id)
        ->get()[0];
 

        return view('registration.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = Registration::find($id);
        $clients = Client::pluck('names', 'id');
        $types = DB::table('types')->where('type_info', 'account')->pluck('name','id');

        return view('registration.edit', compact('registration','clients', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        request()->validate(Registration::$rules);

        $registration->update($request->all());

        return redirect()->route('registrations.index')
            ->with('success', 'Registration updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registration = Registration::find($id)->delete();

        return redirect()->route('registrations.index')
            ->with('success', 'Registration deleted successfully');
    }
}
