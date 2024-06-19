@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($data as $ticket)
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $ticket['object'] }}</h5>
                    <form name="ticketForm" action="{{ route('ticket.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="client">Клиент:</label>
                            <input type="text" class="form-control" id="client" readonly
                                   value="{{ $ticket['client_name'] }}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id"
                                   value="{{ $ticket['id'] }}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="object_id" readonly
                                   value="{{ $ticket['object_id'] }}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="client_id" readonly
                                   value="{{ $ticket['client_id'] }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <textarea class="form-control" rows="5"
                                      name="description" @if(auth()->user()->role_id === 3) readonly @endif>{{$ticket['description']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_id">Статус</label>
                            <select class="form-control" name="status_id">
                                <option selected value="{{$ticket['status_id']}}">{{$ticket['status_name']}}</option>
                                <option value="1">Открыта</option>
                                <option value="2">В работе</option>
                                <option value="3">Закрыта</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="worker_id">Исполнитель:</label>
                            @if(auth()->user()->role_id == 3)
                                <select class="form-control" name="worker_id">
                                    <option selected value="{{$ticket['worker_id']}}">{{$ticket['worker_name']}}</option>
                                </select>
                            @else
                            <select class="form-control" name="worker_id">
                                <option selected value="{{$ticket['worker_id']}}">{{$ticket['worker_name']}}</option>
                                @foreach($workers as $worker)
                                    @if ($worker['id'] != $ticket['worker_id'])
                                        <option value="{{$worker['id']}}">{{$worker['name']}}</option>
                                    @endif

                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="date_open">Дата открытия:</label>
                            <input type="datetime-local" class="form-control" name="date_open" readonly
                                   value="{{ $ticket['created_at'] }}">
                        </div>
                        <div class="form-group">
                            <label for="date_closed">Дата закрытия:</label>
                            <input type="datetime-local" class="form-control" name="date_closed"
                                   value="{{ $ticket['date_closed'] }}">
                        </div>
                        <button type="submit" class="btn btn-success m-1">Сохранить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
