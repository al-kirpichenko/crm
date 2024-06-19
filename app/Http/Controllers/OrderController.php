<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {

        return view('orders.index');
    }

    public function create(Request $request) {

        $start = $request->input('start'); // Предполагается, что это строка в формате datetime
        $end = $request->input('end');     // Предполагается, что это строка в формате datetime

        // Преобразуем строки в объекты Carbon
        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);

        $ticketsAll = Ticket::whereBetween('created_at', [$startDate, $endDate])->count();
        $ticketsOpen = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('status_id',"=", 1)->count();
        $ticketsClosed = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('status_id',"=", 3)->count();
        $ticketsWork = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('status_id',"=", 2)->count();


        $tickets = [
            'all' => $ticketsAll,
            'open' => $ticketsOpen,
            'closed' => $ticketsClosed,
            'work' => $ticketsWork,
        ];

        $clients = Client::all();
        $workers = Worker::all();
        $clientsResult = [];
        $workersResult = [];


        foreach ($clients as $client) {

            $countAll = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('client_id',"=", $client->id)->count();
            $countOpen = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('client_id',"=", $client->id)->where('status_id',"=", 1)->count();
            $countClosed = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('client_id',"=", $client->id)->where('status_id',"=", 3)->count();
            $countWork = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('client_id',"=", $client->id)->where('status_id',"=", 2)->count();
            $clientsResult[] = [
                'name' => $client->name,
                'all' => $countAll,
                'open' => $countOpen,
                'closed' => $countClosed,
                'work' => $countWork,
            ];
        }

        foreach ($workers as $worker) {

            $countAll = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('worker_id',"=", $worker->id)->count();
            $countOpen = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('worker_id',"=", $worker->id)->where('status_id',"=", 1)->count();
            $countClosed = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('worker_id',"=", $worker->id)->where('status_id',"=", 3)->count();
            $countWork = Ticket::whereBetween('created_at', [$startDate, $endDate])->where('worker_id',"=", $worker->id)->where('status_id',"=", 2)->count();
            $workersResult[] = [
                'name' => $worker->name,
                'all' => $countAll,
                'open' => $countOpen,
                'closed' => $countClosed,
                'work' => $countWork,
            ];
        }

        $date = [
            'start' => $start,
            'end' => $end,
        ];

        return view('orders.order')->with([
            'tickets' => $tickets,
            'clients_result' => $clientsResult,
            'workers_result' => $workersResult,
            'date' => $date
        ]);
    }
}
