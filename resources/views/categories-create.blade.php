@extends('index')

@section('content')
    <div class="centered-container">
        <form method="POST" action="{{ route('categories.store') }}" class="flex col g-40 card w-600 m-40-0">
            @csrf
            <h3 class="title">Форма добавления категории</h3>
            <div class="flex col g-24">
                <div class="input-group">
                    <label>Название:</label>
                    <input
                        value="{{ old('name') }}"
                        name="name"
                        placeholder="Maybe enot?"
                        type="text"
                        class="input"
                    />
                </div>
                <button class="button">Создать</button>
                @foreach($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            </div>
        </form>
    </div>
@endsection

