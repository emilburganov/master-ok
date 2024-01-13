@extends('index')

@section('content')
    <form method="POST" action="{{route('registration.post')}}" class="flex col g-40 card w-600 m-40-0">
        @csrf
        <h3 class="title">Форма регистрации</h3>
        <div class="flex col g-20">
            <div class="input-group">
                <label>ФИО:</label>
                <input value="{{ old('full_name') }}" name="full_name" placeholder="Иванов Иван Иванович" type="text" class="input">
            </div>
            <div class="input-group">
                <label>Email:</label>
                <input value="{{ old('email') }}" name="email" placeholder="example@gmail.com" type="text" class="input">
            </div>
            <div class="input-group">
                <label>Логин:</label>
                <input value="{{ old('login') }}" name="login" placeholder="Username" type="text" class="input">
            </div>
            <div class="input-group">
                <label>Пароль:</label>
                <input name="password" placeholder="********" type="text" class="input">
            </div>
            <div class="input-group">
                <label>Повторение пароля:</label>
                <input name="password_confirmation" placeholder="********" type="text" class="input">
            </div>
            <div class="flex ac g-10">
                <input name="agreement" type="checkbox" class="checkbox">
                <span>Согласие на обработку персональных данных</span>
            </div>
            <button class="button">Зарегистрировать аккаунт</button>
            <div class="flex g-16 col">
                @foreach($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </form>
@endsection
