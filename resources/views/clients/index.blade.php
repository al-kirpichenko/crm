@extends('layouts.app')

@section('content')
    <div class="container">
        <div><a class="btn btn-success" href="/client/new" role="button">Создать клиента</a></div>
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Адрес</th>
                <th class="text-center">Действия</th>

            </tr>
            </thead>
            <tbody>
            <tr> @foreach($clients as $client)
                    <td>{{$client['name']}}</td>
                    <td>{{$client['address']}}</td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="/client/show/{{$client['id']}}" role="button">Изменить</a>
                        <a class="btn btn-danger" href="/client/delete/{{$client['id']}}" role="button">Удалить</a>
                    </td>

            </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection


