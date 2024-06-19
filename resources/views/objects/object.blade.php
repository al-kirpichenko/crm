@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($data as $obj)
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">Информация об объекте</h5>
                    <form name="objForm" action="{{ route('object.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id"
                                   value="{{$obj['id']}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="client_id"
                                   value="{{$obj['client_id']}}">
                        </div>
                        <div class="form-group">
                            <label>Наименование:</label>
                            <input type="text" class="form-control" name="name" value="{{ $obj['name'] }}">
                        </div>
                        <div class="form-group">
                            <label>Адрес:</label>
                            <input type="text" class="form-control" name="address" value="{{ $obj['address'] }}">
                        </div>
                        <div class="form-group">
                            <label>Клиент:</label>
                            <select class="form-control" name="client_id">
                                <option selected value="{{$obj['client_id']}}">{{$obj['client_name']}}</option>
                                @foreach($clients as $client)
                                    @if ($client['id'] != $obj['client_id'])
                                        <option value="{{$client['id']}}">{{$client['name']}}</option>
                                    @endif
                                @endforeach
                            </select>

                        <button type="submit" class="btn btn-success m-1">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection



