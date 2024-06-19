@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Объекты</h2>
        <div><a class="btn btn-success" href="/object/new" role="button">Добавить объект</a></div>
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Адрес</th>
                <th>Клиент</th>
                <th class="text-center">Действия</th>

            </tr>
            </thead>
            <tbody>
            <tr> @foreach($objs as $obj)
                    <td>{{$obj['name']}}</td>
                    <td>{{$obj['address']}}</td>
                    <td>{{$obj['client_name']}}</td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="/object/show/{{$obj['id']}}" role="button">Изменить</a>
                        <a class="btn btn-danger" href="/object/delete/{{$obj['id']}}" role="button">Удалить</a>
                    </td>

            </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
