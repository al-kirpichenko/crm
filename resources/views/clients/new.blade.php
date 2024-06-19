@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">Создать клиента</h5>
                    <form name="clientForm" action="{{ route('client.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Имя:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Адрес:</label>
                            <input type="text" class="form-control" name="address">
                        </div>

                        <button type="submit" class="btn btn-success m-1">Сохранить</button>
                    </form>
                </div>
            </div>
    </div>
@endsection


