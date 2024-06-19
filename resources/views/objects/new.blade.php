@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">Добавить объект</h5>
                    <form name="objForm" action="{{ route('object.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Наименование:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Адрес:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label>Клиент:</label>
                            <select class="form-control" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success m-1">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection




