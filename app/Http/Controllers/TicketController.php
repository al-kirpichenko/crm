<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Worker;
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
                'worker' => $ticket->worker?->name,
            ];
        });

        return view('tickets.index')->with(['tickets' => $tickets]);
    }


    public function ticket($id) {

        $ticket =  Ticket::where('id', $id)->get()->map(function (Ticket $ticket) {
            return [
                'id' => $ticket->id,
                'object' => $ticket->object->name,
                'client_name' => $ticket->client->name,
                'date_open' => $ticket->date_open,
                'date_closed' => $ticket->date_closed,
                'description' => $ticket->description,
                'status_name' => $ticket->status->name,
                'status_id' => $ticket->status->id,
                'worker_name' => $ticket->worker?->name,
                'worker_id' => $ticket->worker?->id,
                'client_id' => $ticket->client->id,
                'object_id' => $ticket->object->id,
            ];
        });

        $workers = Worker::get()->map(function (Worker $worker) {

            return [
                'id' => $worker->id,
                'name' => $worker->name,
            ];
        });

        return view('tickets.ticket')->with([
            'data' => $ticket,
            'workers' => $workers,
        ]);
    }

    public function delete(Request $request, $id) {
        Ticket::destroy($id);
        return redirect()->route('tickets')->with('success','Заявка успешно удалена!');
    }

    public function update(Request $request) {

        $request->validate([
            'id' => 'required',
            'object_id' => 'required',
            'client_id' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'worker_id' => 'nullable',
        ]);

        $ticket = Ticket::find($request->id);
        $ticket->description = $request->description;
        $ticket->status_id = $request->status_id;
        $ticket->worker_id = $request->worker_id;
        $ticket->date_closed = $request->date_closed;
        $ticket->save();

        return redirect()->route('ticket', [$ticket->id])->with('success','Заявка успешно обновлена!');
    }
}
