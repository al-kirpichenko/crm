@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">Создать пользователя</h5>
                <form name="userForm" action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Имя:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Пароль:</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Роль:</label>
                        <select class="form-control" name="role_id">
                            <option value="1">Администратор</option>
                            <option value="2">Оператор</option>
                            <option value="3">Мастер</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success m-1">
                </form>
            </div>
        </div>
    </div>
@endsection
