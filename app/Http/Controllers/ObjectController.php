<?php

namespace App\Http\Controllers;

use App\Models\ObjectItem;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

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
}
