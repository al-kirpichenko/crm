@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>
            Отчет за период: с {{$date['start']}} по {{$date['end']}}
        </h5>
            <p>Всего заявок: {{$tickets['all']}}</p>
            <p>Открытых заявок: {{$tickets['open']}}</p>
            <p>Закрытых заявок: {{$tickets['closed']}}</p>
            <p>Заявок в работе: {{$tickets['work']}}</p>

        <table class="table">
            <thead>
            <tr>
                <th>Клиент</th>
                <th>Всего заявок</th>
                <th>Заявок открыто</th>
                <th>Заявок закрыто</th>
                <th>Заявок в работе</th>

            </tr>
            </thead>
            <tbody>
            <tr> @foreach($clients_result as $client)
                    <td>{{$client['name']}}</td>
                    <td>{{$client['all']}}</td>
                    <td>{{$client['open']}}</td>
                    <td>{{$client['closed']}}</td>
                    <td>{{$client['work']}}</td>

            </tr>
            @endforeach
            </tbody>
        </table>

        <table class="table">
            <thead>
            <tr>
                <th>Сотрудник</th>
                <th>Всего заявок</th>
                <th>Заявок открыто</th>
                <th>Заявок закрыто</th>
                <th>Заявок в работе</th>

            </tr>
            </thead>
            <tbody>
            <tr> @foreach($workers_result as $worker)
                    <td>{{$worker['name']}}</td>
                    <td>{{$worker['all']}}</td>
                    <td>{{$worker['open']}}</td>
                    <td>{{$worker['closed']}}</td>
                    <td>{{$worker['work']}}</td>

            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
