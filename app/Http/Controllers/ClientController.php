<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $clients = Client::get()->map(function (Client $client) {

            return [
                'id' => $client->id,
                'name' => $client->name,
                'address' => $client->address,
            ];
        });

        return view('clients.index')->with(['clients' => $clients]);
    }

    public function client($id) {

        $client =  Client::where('id', $id)->get()->map(function (Client $client) {
            return [
                'id' => $client->id,
                'name' => $client->name,
                'address' => $client->address,
            ];
        });

        return view('clients.client')->with([
            'data' => $client,
        ]);
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $client = Client::find($request->id);
        $client->name = $request->name;
        $client->address = $request->address;

        $client->save();

        return redirect()->route('clients')->with('success','Данные клиента успешно обновлены!');
    }

}
