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
}
