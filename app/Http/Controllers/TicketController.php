<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $tickets = Ticket::get()->map(function (Ticket $ticket) {

            return [
                'id' => $ticket->id,
                'object' => $ticket->object->name,
                'client' => $ticket->client->name,
                'date_open' => $ticket->date_open,
                'date_closed' => $ticket->date_closed,
                'description' => $ticket->description,
                'status' => $ticket->status->name,
                'worker' => $ticket->worker->name,
            ];
        });

        return view('tickets.index')->with(['tickets' => $tickets]);
    }


    public function ticket($id) {

        return Ticket::where('id', $id)->get()->map(function (Ticket $ticket) {
            return [
                'id' => $ticket->id,
                'object' => $ticket->object->name,
                'client' => $ticket->client->name,
                'date_open' => $ticket->date_open,
                'date_closed' => $ticket->date_closed,
                'description' => $ticket->description,
                'status' => $ticket->status->name,
                'worker' => $ticket->worker->name,
            ];
        });
    }

    public function delete(Request $request, $id) {
        Ticket::destroy($id);
        return response()->json("Заявка успешно удалена", 200);
    }
}
