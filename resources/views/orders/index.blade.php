@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Отчеты</h2>
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">Сформировать отчет</h5>
                <form name="orderForm" action="{{ route('order.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date_open">Начало периода:</label>
                        <input type="date" class="form-control" name="start">
                    </div>
                    <div class="form-group">
                        <label for="date_closed">Конец периода:</label>
                        <input type="date" class="form-control" name="end">
                    </div>
                    <button type="submit" class="btn btn-success m-1">Сформировать</button>
                </form>
            </div>
        </div>



    </div>
@endsection
