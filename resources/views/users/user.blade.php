@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($data as $user)
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">Создать пользователя</h5>
                <form name="userForm" action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id"
                               value="{{ $user['id'] }}">
                    </div>
                    <div class="form-group">
                        <label>Имя:</label>
                        <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" value="{{ $user['email'] }}">
                    </div>
                    <div class="form-group">
                        <label>Пароль:</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Роль:</label>
                        <select class="form-control" name="role_id">
                            <option selected value="{{$user['role_id']}}">{{$user['role_name']}}</option>
                            @foreach($roles as $role)
                                @if ($role['id'] != $user['role_id'])
                                    <option value="{{$role['id']}}">{{$role['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success m-1">
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection

