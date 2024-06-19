@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($data as $client)
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">Информация о клиенте</h5>
                    <form name="userForm" action="{{ route('client.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id"
                                   value="{{$client['id']}}">
                        </div>
                        <div class="form-group">
                            <label>Имя:</label>
                            <input type="text" class="form-control" name="name" value="{{ $client['name'] }}">
                        </div>
                        <div class="form-group">
                            <label>Адрес:</label>
                            <input type="text" class="form-control" name="address" value="{{ $client['address'] }}">
                        </div>

                        <button type="submit" class="btn btn-success m-1">Сохранить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection


