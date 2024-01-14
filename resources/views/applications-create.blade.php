@extends('index')

@section('content')
    <div class="centered-container">
        <form method="POST" enctype="multipart/form-data" action="{{ route('applications.store') }}" class="flex col g-40 card w-600 m-40-0">
            @csrf
            <h3 class="title">Форма добавления заявки</h3>
            <div class="flex col g-20">
                <div class="input-group">
                    <label>Адрес помещения:</label>
                    <input
                        value="{{ old('room_address') }}"
                        name="room_address"
                        placeholder="г.Казань, ул.Бари Галеева, 3а"
                        type="text"
                        class="input"
                    />
                </div>
                <div class="input-group">
                    <label>Описание:</label>
                    <textarea
                        name="description"
                        placeholder="Легендарное место в казани..."
                        class="input"
                    >{{old('description')}}</textarea>
                </div>
                <div class="input-group">
                    <label>Категория:</label>
                    <select
                        name="category_id"
                        class="input"
                    >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label>Максимальная цена:</label>
                    <input
                        value="{{old('max_price') ?? 10000}}"
                        name="max_price"
                        min="0"
                        type="number"
                        class="input"
                    />
                </div>
                 <div class="input-group">
                    <label>Фото помещения:</label>
                    <input
                        name="image"
                        type="file"
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
@endsection('content')

