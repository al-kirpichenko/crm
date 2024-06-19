<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ObjectItem;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $obj = ObjectItem::get()->map(function (ObjectItem $obj) {

            return [
                'id' => $obj->id,
                'name' => $obj->name,
                'address' => $obj->address,
                'client_name' => $obj->client->name,
                'client_id' => $obj->client->id,
            ];
        });

        return view('objects.index')->with(['objs' => $obj]);
    }

    public function object($id) {

        $obj = ObjectItem::where('id', $id)->get()->map(function (ObjectItem $obj) {

            return [
                'id' => $obj->id,
                'name' => $obj->name,
                'address' => $obj->address,
                'client_name' => $obj->client->name,
                'client_id' => $obj->client->id,
            ];
        });

        $clients = Client::all();

        return view('objects.object')->with([
            'data' => $obj,
            'clients' => $clients,
        ]);
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'client_id' => 'required',
        ]);

        $obj = ObjectItem::find($request->id);
        $obj->name = $request->name;
        $obj->address = $request->address;
        $obj->client_id = $request->client_id;

        $obj->save();

        return redirect()->route('objects')->with('success','Данные объекта успешно обновлены!');
    }


}
