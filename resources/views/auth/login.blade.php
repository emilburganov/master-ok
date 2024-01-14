@extends('index')

@section('content')
    <div class="centered-container">
        <form method="POST" action="{{ route('login.post') }}" class="flex col g-40 card w-600 m-40-0">
            @csrf
            <h3 class="title">Форма авторизации</h3>
            <div class="flex col g-20">
                <div class="input-group">
                    <label>Логин:</label>
                    <input
                        name="login"
                        placeholder="Username"
                        type="text"
                        class="input"
                    />
                </div>
                <div class="input-group">
                    <label>Пароль:</label>
                    <input
                        name="password"
                        placeholder="********"
                        type="password"
                        class="input"
                    />
                </div>
                <button class="button">Войти в аккаунт</button>
                @foreach($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            </div>
        </form>
    </div>
@endsection
