@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">Создать заявку</h5>
                    <form name="ticketForm" action="{{ route('ticket.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Клиент:</label>
                            <select class="form-control" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Объект:</label>
                            <select class="form-control" name="object_id">
                                @foreach($objects as $object)
                                    <option value="{{$object['id']}}">{{$object['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Описание:</label>
                            <textarea class="form-control" rows="5" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Исполнитель:</label>
                            <select class="form-control" name="worker_id">
                                @foreach($workers as $worker)
                                    <option value="{{$worker['id']}}">{{$worker['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success m-1">
                    </form>
                </div>
            </div>
    </div>
@endsection

