@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Пользователи</h2>
        <div><a class="btn btn-success" href="/user/new" role="button">Добавить пользователя</a></div>
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th class="text-center">Действия</th>

            </tr>
            </thead>
            <tbody>
            <tr> @foreach($users as $user)
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['role']}}</td>
                    <td class="text-center">
                        <a class="btn btn-primary" href="/user/show/{{$user['id']}}" role="button">Изменить</a>
                        <a class="btn btn-danger" href="/user/delete/{{$user['id']}}" role="button">Удалить</a>
                    </td>

            </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection

