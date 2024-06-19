@extends('layouts.app')

@section('content')
    <div class="container">
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Заявки</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if(auth()->user()->role_id == 1)--}}
{{--                            <a href="{{url('admin/routes')}}">Admin</a>--}}
{{--                        @else--}}
{{--                            <div class=”panel-heading”>Normal User</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

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
                        <td>{{$ticket['date_open']}}</td>
                        <td>{{$ticket['date_closed']}}</td>
                        <td>{{$ticket['worker']}}</td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="ticket/edit/{{$ticket['id']}}" role="button">Редактировать</a>
                            <a class="btn btn-danger" href="ticket/delete/{{$ticket['id']}}" role="button">Удалить</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
{{--        </div>--}}
{{--    </div>--}}
@endsection
