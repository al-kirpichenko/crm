@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Заявки</h2>
        <div><a class="btn btn-success" href="/ticket/new" role="button">Создать заявку</a></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Объект</th>
                        <th>Клиент</th>
                        <th>Описание</th>
                        <th>Статус</th>
                        <th>Дата открытия</th>
                        <th>Дата закрытия</th>
                        <th>Исполнитель</th>
                        <th class="text-center">Действия</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr> @foreach($tickets as $ticket)
                        <td>{{$ticket['object']}}</td>
                        <td>{{$ticket['client']}}</td>
                        <td>{{$ticket['description']}}</td>
                        <td>{{$ticket['status']}}</td>
                        <td>{{$ticket['created_at']}}</td>
                        <td>{{$ticket['date_closed']}}</td>
                        <td>{{$ticket['worker']}}</td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="/ticket/show/{{$ticket['id']}}" role="button">Изменить</a>
                            <a class="btn btn-danger" href="/ticket/delete/{{$ticket['id']}}" role="button">Удалить</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
@endsection
